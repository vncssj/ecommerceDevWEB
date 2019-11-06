<?php

namespace App\Controller;

use App\Controller\AppController;

use function Psy\debug;

/**
 * Pedidos Controller
 *
 * @property \App\Model\Table\PedidosTable $Pedidos
 *
 * @method \App\Model\Entity\Pedido[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PedidosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $session = $this->getRequest()->getSession();
        $user['id'] = $session->read('Auth.User.id');
        $user['role'] = $session->read('Auth.User.role');
        $this->paginate = [
            'condition' => ['user_id' => $user['id']],
            'contain' => ['Produtos' => ['Images']]
        ];
        $pedidos = $this->paginate($this->Pedidos);

        $this->set(compact('pedidos', 'user'));
    }


    public function carrinho()
    {
        $session = $this->getRequest()->getSession();
        $user_id = $session->read('Auth.User.id');
        $pedido = $this->Pedidos->find('all')->contain(['Produtos' => ['Images']])->where(['user_id' => $user_id, 'status' => 'cart'])->first();
        $this->set(compact('pedido'));
    }

    /**
     * View method
     *
     * @param string|null $id Pedido id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pedido = $this->Pedidos->get($id, [
            'contain' => ['Users', 'Produtos']
        ]);

        $this->set('pedido', $pedido);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pedido = $this->Pedidos->newEntity();

        if ($this->request->is('post')) {
            $session = $this->request->getSession();
            $sessao = $session->read('Auth.User');

            if (isset($sessao)) {
                $pedido_existente = $this->Pedidos->find('all')->contain('Produtos')->where(['status' => 'cart', 'user_id' => $sessao['id']]);

                if ($pedido_existente->count() > 0) {
                    $produtos_em_pedido = $pedido_existente->toArray()[0]->produtos;
                    $dados = $this->request->getData();

                    foreach ($produtos_em_pedido as $produto) {

                        if ($produto->id == $dados['produto']) {
                            $this->loadModel('ProdutosPedidos');
                            $pedido = $this->ProdutosPedidos->find('list')
                                ->where([
                                    'pedido_id' => $pedido_existente->toArray()[0]->id,
                                    'produto_id' => $produto->id
                                ]);

                            $pedido = $this->ProdutosPedidos->get($pedido->toArray());
                            $pedido->quantidade += $dados['quantidade'];
                            if ($this->ProdutosPedidos->save($pedido)) {
                                echo "AAA";
                                return $this->redirect(['action' => 'carrinho']);
                            }
                        }
                    }

                    $this->loadModel('ProdutosPedidos');
                    $pedidoProduto = $this->ProdutosPedidos->newEntity();
                    $pedidoProduto->pedido_id = $pedido_existente->toArray()[0]->id;
                    $pedidoProduto->produto_id = $this->request->getData()['produto'];
                    $pedidoProduto->quantidade = $this->request->getData()['quantidade'];
                    $pedidoProduto = $this->ProdutosPedidos->save($pedidoProduto);

                    if ($pedidoProduto) {
                        return $this->redirect(['action' => 'carrinho']);
                    }
                } else {
                    $this->loadModel('ProdutosPedidos');
                    $pedido->user_id = $sessao['id'];
                    if ($this->Pedidos->save($pedido)) {
                        $pedidoProduto = $this->ProdutosPedidos->newEntity();
                        $pedidoProduto->pedido_id = $pedido_existente->toArray()[0]->id;
                        $pedidoProduto->produto_id = $this->request->getData()['produto'];
                        $pedidoProduto->quantidade = $this->request->getData()['quantidade'];
                        $pedido = $this->Pedidos->patchEntity($pedido, $this->request->getData());
                        if ($this->ProdutosPedidos->save($pedidoProduto)) {
                            return $this->redirect(['action' => 'carrinho']);
                        }
                    }
                }
                $this->Flash->error(__('The pedido could not be saved. Please, try again.'));
            }
        }
        $users = $this->Pedidos->Users->find('list', ['limit' => 200]);
        $produtos = $this->Pedidos->Produtos->find('list', ['limit' => 200]);
        $this->set(compact('pedido', 'users', 'produtos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pedido id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pedido = $this->Pedidos->get($id, [
            'contain' => ['Produtos']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pedido = $this->Pedidos->patchEntity($pedido, $this->request->getData());
            if ($this->Pedidos->save($pedido)) {
                $this->Flash->success(__('The pedido has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pedido could not be saved. Please, try again.'));
        }
        $users = $this->Pedidos->Users->find('list', ['limit' => 200]);
        $produtos = $this->Pedidos->Produtos->find('list', ['limit' => 200]);
        $this->set(compact('pedido', 'users', 'produtos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pedido id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pedido = $this->Pedidos->get($id);
        if ($this->Pedidos->delete($pedido)) {
            $this->Flash->success(__('The pedido has been deleted.'));
        } else {
            $this->Flash->error(__('The pedido could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function addProdutoToPedido()
    { }
}
