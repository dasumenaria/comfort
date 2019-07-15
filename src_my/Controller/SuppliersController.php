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
    public function index($type = null)
    {   
        $RecordShow = 0;
        $where=array();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $where['Suppliers.is_deleted']=0;
            foreach ($this->request->getData() as $key => $value) {
                if(!empty($value))
                { 
                    if (strpos($key, 'supplier_type_id') !== false)
                    {
                        $where['Suppliers.'.$key] = $value;
                    }
                    else{
                        $where['Suppliers.'.$key.' LIKE '] = '%'.$value.'%';
                    }
                }
            }
            $SuppliersList = $this->Suppliers->find()->contain(['SupplierTypes'])->where($where); 
            //pr($SuppliersList->toArray());exit();
            $RecordShow=1;
        }
        if($type == 'edt'){ $displayName = 'Edit';}
        if($type == 'del'){ $displayName = 'Delete';}
        if($type == 'ser'){ $displayName = 'Search';}
        
        $this->paginate = [
            'contain' => ['SupplierTypes', 'SupplierTypeSubs']
        ];
        $suppliers = $this->paginate($this->Suppliers);
        $supplierTypes = $this->Suppliers->SupplierTypes->find('list', ['limit' => 200]);

       // pr($SuppliersList);exit;
        $this->set(compact('suppliers','supplierTypes','SuppliersList','type','displayName','RecordShow'));
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
        $supplierTypes = $this->Suppliers->SupplierTypes->find('list', ['limit' => 200]);
 
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
                    $customerTariffs = $this->Suppliers->SupplierTariffs->find()->where(['customer_id'=>$cop_custtariff]);   
                    if(!empty($customerTariffs)){
                        foreach ($customerTariffs as $value) {
                            $customerTariffIns= $this->Suppliers->SupplierTariffs->newEntity();
                            $customerTariffIns = $this->Suppliers->SupplierTariffs->patchEntity($customerTariffIns,$this->request->getData());
                            $customerTariffIns->supplier_id = $supplier->id;
                            $customerTariffIns->car_type_id = $value->car_type_id;
                            $customerTariffIns->service_id = $value->service_id;
                            $customerTariffIns->rate = $value->rate;
                            $customerTariffIns->minimum_chg_km = $value->minimum_chg_km;
                            $customerTariffIns->extra_km_rate = $value->extra_km_rate;
                            $customerTariffIns->minimum_chg_hourly = $value->minimum_chg_hourly;
                            $customerTariffIns->extra_hour_rate = $value->extra_hour_rate;
                            $customerTariffIns->is_deleted = $value->is_deleted;

                            $this->Suppliers->SupplierTariffs->save($customerTariffIns);   
                        }
                    }
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
        echo $html->control('supplier_type_sub_id' , ['label' => false,'class' => 'form-control  firstupercase','empty'=>'Select...','options'=>$SubList,'autocomplete'=>'off','required']);

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

                //-- Entry In ledgers
                /*$accountGroup = $this->Suppliers->AccountingGroups->find()->select(['id'])->where(['supplier'=>'1'])->first();
                $accounting_group_id = $accountGroup->id;

                $company_id=1;
                $ledgers = $this->Suppliers->Ledgers->newEntity();
                $this->request->data['accounting_group_id'] = $accounting_group_id;
                $this->request->data['company_id'] = $company_id;
                $this->request->data['supplier_id'] = $supplier->id;
                $ledgers = $this->Suppliers->Ledgers->patchEntity($ledgers, $this->request->getData());
                $this->Suppliers->Ledgers->save($ledgers);

                $opening_bal=$supplier->opening_bal;
                if($opening_bal > 0)
                {
                    $credit_debit='debit';
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
                    $bill_to_bill=$supplier->bill_to_bill;
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
                }*/

                $query = $this->Suppliers->Ledgers->query(); 
                $query->update()->set(['name'=>$this->request->getData('name')])
                    ->where(['supplier_id' => $id])
                    ->execute();
                $this->Flash->success(__('The supplier has been saved.'));

                return $this->redirect(['action' => 'index','edt']);
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
        $supplier = $this->Suppliers->get($id, [
            'contain' => []
        ]); 
        $supplier = $this->Suppliers->patchEntity($supplier, $this->request->getData());
        $supplier->is_deleted = 1;
        if ($this->Suppliers->save($supplier)) {
            $this->Flash->success(__('The supplier has been deleted.'));
        } else {
            $this->Flash->error(__('The supplier could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index','del']);
    }

    public function ajaxAutocompleted(){
        $name=$this->request->getData('input'); 
        $searchType=$this->request->getData('searchType');
        if($searchType == 'supplier_name'){
            $supplier=$this->Suppliers->find()->where(['Suppliers.name Like'=>''.$name.'%','Suppliers.is_deleted'=>0]);
            ?>
                <ul id="country-list">
                    <?php foreach($supplier as $show){ ?>
                        <li onClick="selectAutoCompleted('<?php echo $show->name;?>')">
                            <?php echo $show->name?>
                        </li>
                    <?php } ?>
                </ul>
            <?php
        }
        else
        {
            $supplier=$this->Suppliers->find()->where(['Suppliers.mobile_no Like'=>''.$name.'%','Suppliers.is_deleted'=>0]);
            ?>
                <ul id="country-list">
                    <?php foreach($supplier as $show){ ?>
                        <li onClick="selectAutoCompleted1('<?php echo $show->mobile_no;?>')">
                            <?php echo $show->mobile_no?>
                        </li>
                    <?php } ?>
                </ul>
            <?php
        }
        
        exit;  
    }
}
