<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Suppliers Controller
 *
 * @property \App\Model\Table\SuppliersTable $Suppliers
 *
 * @method \App\Model\Entity\Supplier[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SuppliersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['SupplierTypes', 'SupplierTypeSubs']
        ];
        $suppliers = $this->paginate($this->Suppliers);

        $this->set(compact('suppliers'));
    }

    /**
     * View method
     *
     * @param string|null $id Supplier id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $supplier = $this->Suppliers->get($id, [
            'contain' => ['SupplierTypes', 'SupplierTypeSubs']
        ]);

        $this->set('supplier', $supplier);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $supplier = $this->Suppliers->newEntity();
        if ($this->request->is('post')) {
            $supplier = $this->Suppliers->patchEntity($supplier, $this->request->getData());
            $supplier = $this->Suppliers->find('list');
            if ($this->Suppliers->save($supplier)) {
                $this->Flash->success(__('The supplier has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The supplier could not be saved. Please, try again.'));
        }
        $supplierTypes = $this->Suppliers->SupplierTypes->find('list', ['limit' => 200]);

        $copysupplier = $this->Suppliers->find('list');
        $supplierTypeSubs = $this->Suppliers->SupplierTypeSubs->find('list', ['limit' => 200]);
        
        $this->set(compact('supplier', 'supplierTypes', 'supplierTypeSubs','copysupplier'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Supplier id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $supplier = $this->Suppliers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $supplier = $this->Suppliers->patchEntity($supplier, $this->request->getData());
            if ($this->Suppliers->save($supplier)) {
                $this->Flash->success(__('The supplier has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The supplier could not be saved. Please, try again.'));
        }
        $supplierTypes = $this->Suppliers->SupplierTypes->find('list', ['limit' => 200]);
        $supplierTypeSubs = $this->Suppliers->SupplierTypeSubs->find('list', ['limit' => 200]);
        
        $this->set(compact('supplier', 'supplierTypes', 'supplierTypeSubs'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Supplier id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $supplier = $this->Suppliers->get($id);
        if ($this->Suppliers->delete($supplier)) {
            $this->Flash->success(__('The supplier has been deleted.'));
        } else {
            $this->Flash->error(__('The supplier could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
