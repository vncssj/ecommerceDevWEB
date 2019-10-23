<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProdutosImages Controller
 *
 * @property \App\Model\Table\ProdutosImagesTable $ProdutosImages
 *
 * @method \App\Model\Entity\ProdutosImage[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProdutosImagesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Produtos']
        ];
        $produtosImages = $this->paginate($this->ProdutosImages);

        $this->set(compact('produtosImages'));
    }

    /**
     * View method
     *
     * @param string|null $id Produtos Image id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $produtosImage = $this->ProdutosImages->get($id, [
            'contain' => ['Produtos']
        ]);

        $this->set('produtosImage', $produtosImage);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $produtosImage = $this->ProdutosImages->newEntity();
        if ($this->request->is('post')) {
            $produtosImage = $this->ProdutosImages->patchEntity($produtosImage, $this->request->getData());
            if ($this->ProdutosImages->save($produtosImage)) {
                $this->Flash->success(__('The produtos image has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The produtos image could not be saved. Please, try again.'));
        }
        $produtos = $this->ProdutosImages->Produtos->find('list', ['limit' => 200]);
        $this->set(compact('produtosImage', 'produtos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Produtos Image id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $produtosImage = $this->ProdutosImages->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $produtosImage = $this->ProdutosImages->patchEntity($produtosImage, $this->request->getData());
            if ($this->ProdutosImages->save($produtosImage)) {
                $this->Flash->success(__('The produtos image has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The produtos image could not be saved. Please, try again.'));
        }
        $produtos = $this->ProdutosImages->Produtos->find('list', ['limit' => 200]);
        $this->set(compact('produtosImage', 'produtos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Produtos Image id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $produtosImage = $this->ProdutosImages->get($id);
        if ($this->ProdutosImages->delete($produtosImage)) {
            $this->Flash->success(__('The produtos image has been deleted.'));
        } else {
            $this->Flash->error(__('The produtos image could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
