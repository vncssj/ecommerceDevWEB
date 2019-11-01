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
        $user_id = $session->read('Auth.User.id');
        $this->paginate = [
            'condition' => ['user_id' => $user_id],
            'contain' => ['Produtos']
        ];
        $pedidos = $this->paginate($this->Pedidos);

        $this->set(compact('pedidos'));
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
                $pedido = $this->Pedidos->patchEntity($pedido, $this->request->getData());
                $pedido->user_id = $sessao['id'];
                if ($this->Pedidos->save($pedido)) {
                    $this->loadModel('ProdutosPedidos');
                    $pedidoProduto = $this->ProdutosPedidos->newEntity();
                    $pedidoProduto->pedido_id = $pedido->id;
                    $pedidoProduto->produto_id = $this->request->getData()['produto'];
                    if ($this->ProdutosPedidos->save($pedidoProduto)) {
                        return $this->redirect(['action' => 'index']);
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

    public function addProduto($user, $produto)
    { }
}
