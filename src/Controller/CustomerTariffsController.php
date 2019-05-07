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
    public function index($type = null)
    {
        $RecordShow = 0;
        $where=array();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $where['CustomerTariffs.is_deleted']=0;
            foreach ($this->request->getData() as $key => $value) {
                if(!empty($value))
                { 
                    $where['CustomerTariffs.'.$key] = $value;
                }
            }
            $customerTariffsList = $this->CustomerTariffs->find()->where($where)->contain(['Customers', 'CarTypes', 'Services']); 
            $RecordShow=1;
        }
        if($type == 'edt'){ $displayName = 'Edit';}
        if($type == 'del'){ $displayName = 'Delete';}
        if($type == 'ser'){ $displayName = 'Search';}
        $customers = $this->CustomerTariffs->Customers->find('list', ['limit' => 200])->where(['Customers.is_deleted'=>0]);
        $carTypes = $this->CustomerTariffs->CarTypes->find('list', ['limit' => 200]);
        $this->set(compact('customers','displayName','type','RecordShow','carTypes','customerTariffsList'));
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
            //pr($customerTariff);exit;
            if ($this->CustomerTariffs->save($customerTariff)) {
                $this->Flash->success(__('The customer tariff has been saved.'));

                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('The customer tariff could not be saved. Please, try again.'));
        }
        $customers = $this->CustomerTariffs->Customers->find('list', ['limit' => 200])->where(['Customers.is_deleted'=>0]);
        $carTypes = $this->CustomerTariffs->CarTypes->find('list', ['limit' => 200]);
        $services = $this->CustomerTariffs->Services->find('list', ['limit' => 200])->where(['Services.is_deleted'=>0]);
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

                return $this->redirect(['action' => 'index','edt']);
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
        $customerTariff = $this->CustomerTariffs->get($id, [
            'contain' => []
        ]); 
        $customerTariff = $this->CustomerTariffs->patchEntity($customerTariff, $this->request->getData());
        $customerTariff->is_deleted = 1;
        if ($this->CustomerTariffs->save($customerTariff)) {
            $this->Flash->success(__('The customer tariff has been deleted.'));
        } else {
            $this->Flash->error(__('The customer tariff could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index','del']);
    }
}
