<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DutySlips Controller
 *
 * @property \App\Model\Table\DutySlipsTable $DutySlips
 *
 * @method \App\Model\Entity\DutySlip[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DutySlipsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Emails', 'Photos', 'Services', 'CarTypes', 'Cars', 'Customers', 'Employees', 'Logins', 'Counters', 'MaxInvoices', 'WaveoffLogins', 'WaveoffCounters']
        ];
        $dutySlips = $this->paginate($this->DutySlips);

        $this->set(compact('dutySlips'));
    }

    /**
     * View method
     *
     * @param string|null $id Duty Slip id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $dutySlip = $this->DutySlips->get($id, [
            'contain' => ['Emails', 'Photos', 'Services', 'CarTypes', 'Cars', 'Customers', 'Employees', 'Logins', 'Counters', 'MaxInvoices', 'WaveoffLogins', 'WaveoffCounters']
        ]);

        $this->set('dutySlip', $dutySlip);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
            
         $this->Auth->User('name'); 
        $dutySlip = $this->DutySlips->newEntity();
        if ($this->request->is('post')) {
            $dutySlip = $this->DutySlips->patchEntity($dutySlip, $this->request->getData());
            if ($this->DutySlips->save($dutySlip)) {
                $this->Flash->success(__('The duty slip has been saved.'));

                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('The duty slip could not be saved. Please, try again.'));
        }
          
        $services = $this->DutySlips->Services->find('list', ['limit' => 200])->where(['is_deleted'=>0]);
        $carTypes = $this->DutySlips->CarTypes->find('list', ['limit' => 200]);
        $employees = $this->DutySlips->Employees->find('list', ['limit' => 200])->where(['is_deleted'=>0]);
        $cars = $this->DutySlips->Cars->find('list', ['limit' => 200])->where(['is_deleted'=>0]);
        $customers = $this->DutySlips->Customers->find('list', ['limit' => 200])->where(['is_deleted'=>0]); 
        $counters = $this->DutySlips->Counters->find('list', ['limit' => 200]); 
        $serviceCity = $this->DutySlips->ServiceCities->find('list', ['limit' => 200]); 
        $this->set(compact('dutySlip', 'services', 'carTypes', 'cars', 'customers', 'counters','employees','serviceCity'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Duty Slip id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $dutySlip = $this->DutySlips->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dutySlip = $this->DutySlips->patchEntity($dutySlip, $this->request->getData());
            if ($this->DutySlips->save($dutySlip)) {
                $this->Flash->success(__('The duty slip has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The duty slip could not be saved. Please, try again.'));
        }
        $emails = $this->DutySlips->Emails->find('list', ['limit' => 200]);
        $photos = $this->DutySlips->Photos->find('list', ['limit' => 200]);
        $services = $this->DutySlips->Services->find('list', ['limit' => 200]);
        $carTypes = $this->DutySlips->CarTypes->find('list', ['limit' => 200]);
        $cars = $this->DutySlips->Cars->find('list', ['limit' => 200]);
        $customers = $this->DutySlips->Customers->find('list', ['limit' => 200]);
        $employees = $this->DutySlips->Employees->find('list', ['limit' => 200]);
        $logins = $this->DutySlips->Logins->find('list', ['limit' => 200]);
        $counters = $this->DutySlips->Counters->find('list', ['limit' => 200]);
        $maxInvoices = $this->DutySlips->MaxInvoices->find('list', ['limit' => 200]);
        $waveoffLogins = $this->DutySlips->WaveoffLogins->find('list', ['limit' => 200]);
        $waveoffCounters = $this->DutySlips->WaveoffCounters->find('list', ['limit' => 200]);
        $this->set(compact('dutySlip', 'emails', 'photos', 'services', 'carTypes', 'cars', 'customers', 'employees', 'logins', 'counters', 'maxInvoices', 'waveoffLogins', 'waveoffCounters'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Duty Slip id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $dutySlip = $this->DutySlips->get($id);
        if ($this->DutySlips->delete($dutySlip)) {
            $this->Flash->success(__('The duty slip has been deleted.'));
        } else {
            $this->Flash->error(__('The duty slip could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
