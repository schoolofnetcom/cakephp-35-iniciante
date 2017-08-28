<?php

namespace App\Controller;

use Cake\Event\Event;

class PagesController extends AppController
{
    public function beforeFilter(Event $event)
    {
        $this->Auth->allow(['index', 'view']);
    }

    public function index()
    {
        $this->paginate = [
            'limit' => 1
        ];
        $results = $this->paginate($this->Pages);
        $this->set('pages', $results);
    }

    public function view($id)
    {
        $page = $this->Pages->get($id);
        $this->set('page', $page);
    }

    public function add()
    {
        // $this->viewBuilder()->layout('doerik');
        $page = $this->Pages->newEntity();
        if ($this->request->is('post')) {
            $page = $this->Pages->patchEntity($page, $this->request->getData());
            if ($this->Pages->save($page)) {
                $this->Flash->success('Salvo com sucesso');

                return $this->redirect(['controller' => 'pages', 'action' => 'index']);
            }
            $this->Flash->warning('Falhou ao salvar, verifique os campos');
        }
        $this->set('page', $page);
    }

    public function edit($id)
    {
        $page = $this->Pages->get($id);
        if ($this->request->is(['post', 'put', 'patch'])) {
            $page = $this->Pages->patchEntity($page, $this->request->getData());
            if ($this->Pages->save($page)) {
                $this->Flash->success('Salvo com sucesso');

                return $this->redirect(['controller' => 'pages', 'action' => 'index']);
            }
            $this->Flash->warning('Falhou ao salvar, verifique os campos');
        }
        $this->set('page', $page);
    }

    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);
        $page = $this->Pages->get($id);
        $this->Pages->delete($page);
        $this->Flash->success('Removido com sucesso');
        return $this->redirect(['action' => 'index']);
    }
}
