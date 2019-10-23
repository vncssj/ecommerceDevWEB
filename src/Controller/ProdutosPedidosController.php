<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProdutosPedidos Controller
 *
 * @property \App\Model\Table\ProdutosPedidosTable $ProdutosPedidos
 *
 * @method \App\Model\Entity\ProdutosPedido[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProdutosPedidosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Pedidos', 'Produtos']
        ];
        $produtosPedidos = $this->paginate($this->ProdutosPedidos);

        $this->set(compact('produtosPedidos'));
    }

    /**
     * View method
     *
     * @param string|null $id Produtos Pedido id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $produtosPedido = $this->ProdutosPedidos->get($id, [
            'contain' => ['Pedidos', 'Produtos']
        ]);

        $this->set('produtosPedido', $produtosPedido);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $produtosPedido = $this->ProdutosPedidos->newEntity();
        if ($this->request->is('post')) {
            $produtosPedido = $this->ProdutosPedidos->patchEntity($produtosPedido, $this->request->getData());
            if ($this->ProdutosPedidos->save($produtosPedido)) {
                $this->Flash->success(__('The produtos pedido has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The produtos pedido could not be saved. Please, try again.'));
        }
        $pedidos = $this->ProdutosPedidos->Pedidos->find('list', ['limit' => 200]);
        $produtos = $this->ProdutosPedidos->Produtos->find('list', ['limit' => 200]);
        $this->set(compact('produtosPedido', 'pedidos', 'produtos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Produtos Pedido id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $produtosPedido = $this->ProdutosPedidos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $produtosPedido = $this->ProdutosPedidos->patchEntity($produtosPedido, $this->request->getData());
            if ($this->ProdutosPedidos->save($produtosPedido)) {
                $this->Flash->success(__('The produtos pedido has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The produtos pedido could not be saved. Please, try again.'));
        }
        $pedidos = $this->ProdutosPedidos->Pedidos->find('list', ['limit' => 200]);
        $produtos = $this->ProdutosPedidos->Produtos->find('list', ['limit' => 200]);
        $this->set(compact('produtosPedido', 'pedidos', 'produtos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Produtos Pedido id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $produtosPedido = $this->ProdutosPedidos->get($id);
        if ($this->ProdutosPedidos->delete($produtosPedido)) {
            $this->Flash->success(__('The produtos pedido has been deleted.'));
        } else {
            $this->Flash->error(__('The produtos pedido could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
