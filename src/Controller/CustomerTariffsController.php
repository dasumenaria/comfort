<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CustomerTariffs Controller
 *
 * @property \App\Model\Table\CustomerTariffsTable $CustomerTariffs
 *
 * @method \App\Model\Entity\CustomerTariff[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CustomerTariffsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Customers', 'CarTypes', 'Services']
        ];
        $customerTariffs = $this->paginate($this->CustomerTariffs);

        $this->set(compact('customerTariffs'));
    }

    /**
     * View method
     *
     * @param string|null $id Customer Tariff id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $customerTariff = $this->CustomerTariffs->get($id, [
            'contain' => ['Customers', 'CarTypes', 'Services']
        ]);

        $this->set('customerTariff', $customerTariff);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $customerTariff = $this->CustomerTariffs->newEntity();
        if ($this->request->is('post')) {
            $customerTariff = $this->CustomerTariffs->patchEntity($customerTariff, $this->request->getData());
            if ($this->CustomerTariffs->save($customerTariff)) {
                $this->Flash->success(__('The customer tariff has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The customer tariff could not be saved. Please, try again.'));
        }
        $customers = $this->CustomerTariffs->Customers->find('list', ['limit' => 200]);
        $carTypes = $this->CustomerTariffs->CarTypes->find('list', ['limit' => 200]);
        $services = $this->CustomerTariffs->Services->find('list', ['limit' => 200]);
        $this->set(compact('customerTariff', 'customers', 'carTypes', 'services'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Customer Tariff id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $customerTariff = $this->CustomerTariffs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $customerTariff = $this->CustomerTariffs->patchEntity($customerTariff, $this->request->getData());
            if ($this->CustomerTariffs->save($customerTariff)) {
                $this->Flash->success(__('The customer tariff has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The customer tariff could not be saved. Please, try again.'));
        }
        $customers = $this->CustomerTariffs->Customers->find('list', ['limit' => 200]);
        $carTypes = $this->CustomerTariffs->CarTypes->find('list', ['limit' => 200]);
        $services = $this->CustomerTariffs->Services->find('list', ['limit' => 200]);
        $this->set(compact('customerTariff', 'customers', 'carTypes', 'services'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Customer Tariff id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $customerTariff = $this->CustomerTariffs->get($id);
        if ($this->CustomerTariffs->delete($customerTariff)) {
            $this->Flash->success(__('The customer tariff has been deleted.'));
        } else {
            $this->Flash->error(__('The customer tariff could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
