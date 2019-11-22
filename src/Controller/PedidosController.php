<?php

namespace App\Controller;

use App\Controller\AppController;

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
            'contain' => ['Produtos']
        ];
        $pedidos = $this->paginate($this->Pedidos);

        $this->set(compact('pedidos', 'user'));
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

                $existente = $this->Pedidos->find('list')->where(['status' => 'cart']);
                //VERIFICA SE EXISTE ALGUM CARRINHO EM ABERTO
                // CASO EXISTA CARRINHO
                if ($existente->count() > 0) {
                    $pedido = $existente->first();

                    $this->loadModel('ProdutosPedidos');
                    $produto = $this->ProdutosPedidos->find('list')->where(['produto_id' => $this->request->getData()['produto'], 'pedido_id' => $pedido]);
                    $newProduto = $this->ProdutosPedidos->newEntity();
                    // CASO HAJA ESTE PRODUTO NO CARRINHO FARÁ UPDATE DA QUANTIDADE
                    if ($produto->count() > 0) {

                        $existente = $this->ProdutosPedidos->get($produto->first());
                        $existente->quantidade += $this->request->getData()['quantidade'];

                        // SE ADD PRODUTO AO CARRINHO
                        if ($this->ProdutosPedidos->save($existente)) {
                            $this->redirect(['controller' => 'Users', 'action' => 'cart']);
                        } else {
                            $this->Flash->error(__('Erro ao Adicionar Produto ao Carrinho'));
                        }

                        // CASO NÃO HAJA ESTE PRODUTO NO CARRINHO
                    } else {
                        $newProduto = $this->ProdutosPedidos->patchEntity($newProduto, ['pedido_id' => $pedido, 'produto_id' => $this->request->getData()['produto'], 'quantidade' => $this->request->getData()['quantidade']]);
                        if ($this->ProdutosPedidos->save($newProduto)) {
                            $this->redirect(['controller' => 'Users', 'action' => 'cart']);
                        } else {
                            $this->Flash->error(__('Erro ao Adicionar Produto ao Carrinho'));
                        }
                    }

                    // CASO NÃO EXISTA CARRINHO
                } else {

                    //CRIA CARRINHO
                    $pedido = $this->Pedidos->patchEntity($pedido, $this->request->getData());
                    $pedido->user_id = $sessao['id'];

                    // SE SALVAR ADICIONA PRODUTO A CARRINHO
                    if ($this->Pedidos->save($pedido)) {
                        $this->loadModel('ProdutosPedidos');
                        $newProduto = $this->ProdutosPedidos->newEntity();
                        $newProduto = $this->ProdutosPedidos->patchEntity($newProduto, ['pedido_id' => $pedido->id, 'produto_id' => $this->request->getData()['produto'], 'quantidade' => $this->request->getData()['quantidade']]);
                        if ($this->ProdutosPedidos->save($newProduto)) {
                            $this->redirect(['controller' => 'Users', 'action' => 'cart']);
                        } else {
                            $this->Flash->error(__('Erro ao Adicionar Produto ao Carrinho'));
                        }
                    } else {
                        $this->Flash->error(__('Erro ao criar Carrinho.'));
                    }
                }
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

    public function addProduto($user, $produto)
    { }
}
