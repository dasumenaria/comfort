<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\View\View;
use Cake\View\Helper\FormHelper;
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
            $accountGroup = $this->Suppliers->AccountingGroups->find()->select(['id'])->where(['supplier'=>'1'])->first();
            $accounting_group_id = $accountGroup->id;
            $supplier = $this->Suppliers->patchEntity($supplier, $this->request->getData());
            
            if ($this->Suppliers->save($supplier)) {

                //-- Copy Tariff
                $cop_custtariff=$this->request->getData('cop_custtariff');
                if(!empty($cop_custtariff))
                {

                }
                //-- Entry In ledgers
                $company_id=1;
                $ledgers = $this->Suppliers->Ledgers->newEntity();
                $this->request->data['accounting_group_id'] = $accounting_group_id;
                $this->request->data['company_id'] = $company_id;
                $this->request->data['supplier_id'] = $supplier->id;
                $ledgers = $this->Suppliers->Ledgers->patchEntity($ledgers, $this->request->getData());
                $this->Suppliers->Ledgers->save($ledgers);

                $opening_bal=$this->request->data('opening_bal');
                if($opening_bal > 0)
                {
                    $credit_debit=$this->request->getData('credit_debit');
                    if(!empty($credit_debit)){
                        $accountingEntries = $this->Suppliers->AccountingEntries->newEntity();
                        $this->request->data['ledger_id'] = $ledgers->id;
                        if($credit_debit == 'credit'){
                            $this->request->data['credit'] = $opening_bal;
                        }
                        if($credit_debit == 'debit'){
                            $this->request->data['debit'] = $opening_bal;
                        }
                        $this->request->data['transaction_date'] = date('Y').'-04-01';
                        $this->request->data['company_id'] = $company_id;
                        $this->request->data['is_opening_balance'] = 'yes'; 
                        $accountingEntries = $this->Suppliers->AccountingEntries->patchEntity($accountingEntries, $this->request->getData());
                        $this->Suppliers->AccountingEntries->save($accountingEntries);
                    }
                    $bill_to_bill=$this->request->getData('bill_to_bill');
                    if($bill_to_bill == 'yes'){
                        $referenceDetails = $this->Suppliers->ReferenceDetails->newEntity();
                        $this->request->data['ledger_id'] = $ledgers->id;
                        if($credit_debit == 'credit'){
                            $this->request->data['credit'] = $opening_bal;
                        }
                        if($credit_debit == 'debit'){
                            $this->request->data['debit'] = $opening_bal;
                        }
                        $this->request->data['transaction_date'] = date('Y').'-04-01';
                        $this->request->data['company_id'] = $company_id;
                        $this->request->data['opening_balance'] = 'yes'; 
                        $this->request->data['ledger_id'] =$ledgers->id; 
                        $referenceDetails = $this->Suppliers->ReferenceDetails->patchEntity($referenceDetails, $this->request->getData());
                        $this->Suppliers->ReferenceDetails->save($referenceDetails);
                    }                    
                }

                $this->Flash->success(__('The supplier has been saved.')); 
                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('The supplier could not be saved. Please, try again.'));
        }
        $supplierTypes = $this->Suppliers->SupplierTypes->find('list', ['limit' => 200]);
 
        $copysupplier = $this->Suppliers->find('list');
        $supplierTypeSubs = $this->Suppliers->SupplierTypeSubs->find('list', ['limit' => 200]);
        
        $this->set(compact('supplier', 'supplierTypes', 'supplierTypeSubs','copysupplier'));
    }

    public function autoFetchSubType(){
        $supplier_type_id = $this->request->getQuery('supplier_type_id');
        $SubList = $this->Suppliers->SupplierTypeSubs->find('list')->where(['SupplierTypeSubs.supplier_type_id'=>$supplier_type_id]);
        $html = new FormHelper(new \Cake\View\View());
        echo $html->control('supplier_type_sub_id' , ['label' => false,'class' => 'select2  firstupercase','empty'=>'Select...','options'=>$SubList,'autocomplete'=>'off']);

        exit;
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
