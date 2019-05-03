<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SupplierTypes Controller
 *
 * @property \App\Model\Table\SupplierTypesTable $SupplierTypes
 *
 * @method \App\Model\Entity\SupplierType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SupplierTypesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index($id=null)
    {   
        if($id){ 
            $supplierType = $this->SupplierTypes->get($id);
        }else{
            $supplierType = $this->SupplierTypes->newEntity();
        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            $supplierType = $this->SupplierTypes->patchEntity($supplierType, $this->request->data);
            if ($this->SupplierTypes->save($supplierType)) {
                $this->Flash->success(__('The Supplier has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The Supplier Type could not be saved. Please, try again.'));
            }
        }
         $this->paginate = [
            'limit' => 10
        ];
       
            
        $supplierTypeList = $this->paginate($this->SupplierTypes->find());
        
        $page_no = $this->request->getQuery('page');
        if (empty($page_no)) $page_no = 1;

        $page_no = $page_no-1;
        
        $this->set(compact('supplierType','supplierTypeList','page_no'));     

    }
    

    /**
     * View method
     *
     * @param string|null $id Supplier Type id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $supplierType = $this->SupplierTypes->get($id, [
            'contain' => []
        ]);

        $this->set('supplierType', $supplierType);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $supplierType = $this->SupplierTypes->newEntity();
        if ($this->request->is('post')) {
            $supplierType = $this->SupplierTypes->patchEntity($supplierType, $this->request->getData());
            if ($this->SupplierTypes->save($supplierType)) {
                $this->Flash->success(__('The supplier type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The supplier type could not be saved. Please, try again.'));
        }
        $this->set(compact('supplierType'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Supplier Type id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $supplierType = $this->SupplierTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $supplierType = $this->SupplierTypes->patchEntity($supplierType, $this->request->getData());
            if ($this->SupplierTypes->save($supplierType)) {
                $this->Flash->success(__('The supplier type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The supplier type could not be saved. Please, try again.'));
        }
        $this->set(compact('supplierType'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Supplier Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $supplierType = $this->SupplierTypes->get($id);
        if ($this->SupplierTypes->delete($supplierType)) {
            $this->Flash->success(__('The supplier type has been deleted.'));
        } else {
            $this->Flash->error(__('The supplier type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
