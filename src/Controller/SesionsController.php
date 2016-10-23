<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Sesions Controller
 *
 * @property \App\Model\Table\SesionsTable $Sesions
 */
class SesionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Clients']
        ];
        $sesions = $this->paginate($this->Sesions);

        $this->set(compact('sesions'));
        $this->set('_serialize', ['sesions']);
    }

    /**
     * View method
     *
     * @param string|null $id Sesion id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sesion = $this->Sesions->get($id, [
            'contain' => ['Clients', 'Services', 'Payments', 'Schedules']
        ]);

        $this->set('sesion', $sesion);
        $this->set('_serialize', ['sesion']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sesion = $this->Sesions->newEntity();
        if ($this->request->is('post')) {
            $sesion = $this->Sesions->patchEntity($sesion, $this->request->data);
            if ($this->Sesions->save($sesion)) {
                $this->Flash->success(__('The sesion has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The sesion could not be saved. Please, try again.'));
            }
        }
        $clients = $this->Sesions->Clients->find('list', ['limit' => 200]);
        $services = $this->Sesions->Services->find('list', ['limit' => 200]);
        $this->set(compact('sesion', 'clients', 'services'));
        $this->set('_serialize', ['sesion']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Sesion id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sesion = $this->Sesions->get($id, [
            'contain' => ['Services']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sesion = $this->Sesions->patchEntity($sesion, $this->request->data);
            if ($this->Sesions->save($sesion)) {
                $this->Flash->success(__('The sesion has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The sesion could not be saved. Please, try again.'));
            }
        }
        $clients = $this->Sesions->Clients->find('list', ['limit' => 200]);
        $services = $this->Sesions->Services->find('list', ['limit' => 200]);
        $this->set(compact('sesion', 'clients', 'services'));
        $this->set('_serialize', ['sesion']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Sesion id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sesion = $this->Sesions->get($id);
        if ($this->Sesions->delete($sesion)) {
            $this->Flash->success(__('The sesion has been deleted.'));
        } else {
            $this->Flash->error(__('The sesion could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
