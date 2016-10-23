<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Specialists Controller
 *
 * @property \App\Model\Table\SpecialistsTable $Specialists
 */
class SpecialistsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $specialists = $this->paginate($this->Specialists);

        $this->set(compact('specialists'));
        $this->set('_serialize', ['specialists']);
    }

    /**
     * View method
     *
     * @param string|null $id Specialist id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $specialist = $this->Specialists->get($id, [
            'contain' => ['Schedules', 'Users']
        ]);

        $this->set('specialist', $specialist);
        $this->set('_serialize', ['specialist']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $specialist = $this->Specialists->newEntity();
        if ($this->request->is('post')) {
            $specialist = $this->Specialists->patchEntity($specialist, $this->request->data);
            if ($this->Specialists->save($specialist)) {
                $this->Flash->success(__('The specialist has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The specialist could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('specialist'));
        $this->set('_serialize', ['specialist']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Specialist id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $specialist = $this->Specialists->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $specialist = $this->Specialists->patchEntity($specialist, $this->request->data);
            if ($this->Specialists->save($specialist)) {
                $this->Flash->success(__('The specialist has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The specialist could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('specialist'));
        $this->set('_serialize', ['specialist']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Specialist id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $specialist = $this->Specialists->get($id);
        if ($this->Specialists->delete($specialist)) {
            $this->Flash->success(__('The specialist has been deleted.'));
        } else {
            $this->Flash->error(__('The specialist could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
