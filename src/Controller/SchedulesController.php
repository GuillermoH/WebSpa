<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Schedules Controller
 *
 * @property \App\Model\Table\SchedulesTable $Schedules
 */
class SchedulesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Specialists', 'Sesions']
        ];
        $schedules = $this->paginate($this->Schedules);

        $this->set(compact('schedules'));
        $this->set('_serialize', ['schedules']);
    }

    /**
     * View method
     *
     * @param string|null $id Schedule id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $schedule = $this->Schedules->get($id, [
            'contain' => ['Specialists', 'Sesions']
        ]);

        $this->set('schedule', $schedule);
        $this->set('_serialize', ['schedule']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $schedule = $this->Schedules->newEntity();
        if ($this->request->is('post')) {
            $schedule = $this->Schedules->patchEntity($schedule, $this->request->data);
            if ($this->Schedules->save($schedule)) {
                $this->Flash->success(__('The schedule has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The schedule could not be saved. Please, try again.'));
            }
        }
        $specialists = $this->Schedules->Specialists->find('list', ['limit' => 200]);
        $sesions = $this->Schedules->Sesions->find('list', ['limit' => 200]);
        $this->set(compact('schedule', 'specialists', 'sesions'));
        $this->set('_serialize', ['schedule']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Schedule id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $schedule = $this->Schedules->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $schedule = $this->Schedules->patchEntity($schedule, $this->request->data);
            if ($this->Schedules->save($schedule)) {
                $this->Flash->success(__('The schedule has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The schedule could not be saved. Please, try again.'));
            }
        }
        $specialists = $this->Schedules->Specialists->find('list', ['limit' => 200]);
        $sesions = $this->Schedules->Sesions->find('list', ['limit' => 200]);
        $this->set(compact('schedule', 'specialists', 'sesions'));
        $this->set('_serialize', ['schedule']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Schedule id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $schedule = $this->Schedules->get($id);
        if ($this->Schedules->delete($schedule)) {
            $this->Flash->success(__('The schedule has been deleted.'));
        } else {
            $this->Flash->error(__('The schedule could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user)
    {
        if ($this->Auth->user('role') === 'ROLE_ADMIN' || $this->Auth->user('role') === 'ROLE_MAN') {
            return true;
        }else{
            return false;
        }



        return parent::isAuthorized($user);
    }
}
