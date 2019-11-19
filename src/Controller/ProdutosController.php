<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;
use Cake\Event\Event;

/**
 * Produtos Controller
 *
 * @property \App\Model\Table\ProdutosTable $Produtos
 *
 * @method \App\Model\Entity\Produto[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProdutosController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['view', 'all']);
    }


    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $produtos = $this->paginate($this->Produtos);

        $this->set(compact('produtos'));
    }

    /**
     * View method
     *
     * @param string|null $id Produto id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $produto = $this->Produtos->get($id, [
            'contain' => ['Images']
        ]);

        $this->set('produto', $produto);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $produto = $this->Produtos->newEntity();
        if ($this->request->is('post')) {
            $produto = $this->Produtos->patchEntity($produto, $this->request->getData());
            if ($this->Produtos->save($produto)) {
                $this->Flash->success(__('The produto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The produto could not be saved. Please, try again.'));
        }
        $categorias = $this->Produtos->Categorias->find('list', ['keyField' => 'id', 'valueField' => 'nome']);
        $this->set(compact('produto', 'categorias'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Produto id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $produto = $this->Produtos->get($id, [
            'contain' => ['Pedidos']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $produto = $this->Produtos->patchEntity($produto, $this->request->getData());
            if ($this->Produtos->save($produto)) {
                $this->Flash->success(__('The produto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The produto could not be saved. Please, try again.'));
        }
        $pedidos = $this->Produtos->Pedidos->find('list', ['limit' => 200]);
        $this->set(compact('produto', 'pedidos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Produto id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $produto = $this->Produtos->get($id);
        if ($this->Produtos->delete($produto)) {
            $this->Flash->success(__('The produto has been deleted.'));
        } else {
            $this->Flash->error(__('The produto could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function home()
    {
        $produtos = $this->Produtos->find('all')->limit(4)->orderDesc('created')->contain('Images');
        $categorias = $this->Produtos->Categorias->find('all')
            ->contain(['produtos' => 'Images']);
        $this->set(compact('produtos', 'categorias'));
    }

    public function Images($produto)
    {
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dados = $this->request->getData();
            $local = 'img/produtos/';
            foreach ($dados['Images'] as $imagem) {
                if ($imagem['type'] === 'image/jpeg' || $imagem['type'] === 'image/png') {
                    $now = Time::now()->i18nFormat('yyyy-MM-dd-HH-mm-ss');
                    $nome = $now  . $imagem['name'];
                    if (move_uploaded_file($imagem['tmp_name'], $local . $nome)) {
                        $imagem['nome'] = $nome;
                        $imagem['produto_id'] = $produto;
                        $imageEntity = $this->Produtos->Images->newEntity();
                        $imageEntity = $this->Produtos->Images->patchEntity($imageEntity, $imagem);
                        $this->Produtos->Images->save($imageEntity);
                    }
                }
            }
            $this->Flash->success('Imagens adicionadas com sucesso');
        }
        $images = $this->Produtos->Images->find('all')->where(['produto_id' => $produto]);
        $this->set(compact('images'));
    }

    public function all()
    {
        $produtos = $this->Produtos->find('all')->contain('Images');
        $categorias = $this->Produtos->Categorias->find('list', ['valueField' => 'nome']);
        $this->set(compact('produtos', 'categorias'));
        $this->viewBuilder()->setLayout('container');
    }
}
