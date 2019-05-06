<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SupplierTariffs Controller
 *
 * @property \App\Model\Table\SupplierTariffsTable $SupplierTariffs
 *
 * @method \App\Model\Entity\SupplierTariff[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SupplierTariffsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index($type = null)
    {
        $this->paginate = [
            'contain' => ['Suppliers', 'CarTypes', 'Services']
        ];

        $RecordShow = 0;
        $where=array();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $where['SupplierTariffs.is_deleted']=0;
            foreach ($this->request->getData() as $key => $value) {
                if(!empty($value))
                { 
                    $where['SupplierTariffs.'.$key.' LIKE '] = '%'.$value.'%';
                }
            }
            $supplierTariffList = $this->SupplierTariffs->find()->contain(['Suppliers','Services','CarTypes'])->where($where); 

            //pr($supplierTariffList->toArray());
            //die();
            $RecordShow=1;
        }
        if($type == 'edt'){ $displayName = 'Edit';}
        if($type == 'del'){ $displayName = 'Delete';}
        if($type == 'ser'){ $displayName = 'Search';}
        
        $supplierTariffs = $this->paginate($this->SupplierTariffs);
        $carTypes = $this->SupplierTariffs->CarTypes->find('list', ['limit' => 200]);
        $suppliers = $this->SupplierTariffs->Suppliers->find('list', ['limit' => 200]);
        $this->set(compact('supplierTariffs','carTypes','suppliers','supplierTariffList','displayName','RecordShow','type'));
    }

    /**
     * View method
     *
     * @param string|null $id Supplier Tariff id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $supplierTariff = $this->SupplierTariffs->get($id, [
            'contain' => ['Suppliers', 'CarTypes', 'Services']
        ]);

        $this->set('supplierTariff', $supplierTariff);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $supplierTariff = $this->SupplierTariffs->newEntity();
        if ($this->request->is('post')) {
            $supplierTariff = $this->SupplierTariffs->patchEntity($supplierTariff, $this->request->getData());
            if ($this->SupplierTariffs->save($supplierTariff)) {
                $this->Flash->success(__('The supplier tariff has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The supplier tariff could not be saved. Please, try again.'));
        }
        $suppliers = $this->SupplierTariffs->Suppliers->find('list', ['limit' => 200]);
        $carTypes = $this->SupplierTariffs->CarTypes->find('list', ['limit' => 200]);
        $services = $this->SupplierTariffs->Services->find('list', ['limit' => 200]);
        $this->set(compact('supplierTariff', 'suppliers', 'carTypes', 'services'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Supplier Tariff id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $supplierTariff = $this->SupplierTariffs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $supplierTariff = $this->SupplierTariffs->patchEntity($supplierTariff, $this->request->getData());
            if ($this->SupplierTariffs->save($supplierTariff)) {
                $this->Flash->success(__('The supplier tariff has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The supplier tariff could not be saved. Please, try again.'));
        }
        $suppliers = $this->SupplierTariffs->Suppliers->find('list', ['limit' => 200]);
        $carTypes = $this->SupplierTariffs->CarTypes->find('list', ['limit' => 200]);
        $services = $this->SupplierTariffs->Services->find('list', ['limit' => 200]);
        $this->set(compact('supplierTariff', 'suppliers', 'carTypes', 'services'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Supplier Tariff id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $supplierTariff = $this->SupplierTariffs->get($id);
        if ($this->SupplierTariffs->delete($supplierTariff)) {
            $this->Flash->success(__('The supplier tariff has been deleted.'));
        } else {
            $this->Flash->error(__('The supplier tariff could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
