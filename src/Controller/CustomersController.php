<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Customers Controller
 *
 * @property \App\Model\Table\CustomersTable $Customers
 *
 * @method \App\Model\Entity\Customer[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CustomersController extends AppController
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
            $where['Customers.is_deleted']=0;
            foreach ($this->request->getData() as $key => $value) {
                if(!empty($value))
                { 
                    $where['Customers.'.$key.' LIKE '] = '%'.$value.'%';
                }
            }
            $customerList = $this->Customers->find()->where($where); 
            $RecordShow=1;
        }
        if($type == 'edt'){ $displayName = 'Edit';}
        if($type == 'del'){ $displayName = 'Delete';}
        if($type == 'ser'){ $displayName = 'Search';}
        $this->set(compact('customers','displayName','type','RecordShow','customerList')); 
    } 

    public function view($id = null)
    {
        $customer = $this->Customers->get($id);

        $this->set('customer', $customer);
    }
    public function add()
    {
        $customer = $this->Customers->newEntity();
        if ($this->request->is('post')) {
            $accountGroup = $this->Customers->AccountingGroups->find()->select(['id'])->where(['customer'=>'1'])->first();
            $accounting_group_id = $accountGroup->id;
            //pr($this->request->getData());exit;
            $customer = $this->Customers->patchEntity($customer, $this->request->getData());
            if ($this->Customers->save($customer)) {
                //-- Copy Tariff
                $cop_custtariff=$this->request->getData('cop_custtariff');
                if(!empty($cop_custtariff))
                {

                }
                //-- Entry In ledgers
                $company_id=1;
                $ledgers = $this->Customers->Ledgers->newEntity();
                $this->request->data['accounting_group_id'] = $accounting_group_id;
                $this->request->data['company_id'] = $company_id;
                $this->request->data['customer_id'] = $customer->id;
                $ledgers = $this->Customers->Ledgers->patchEntity($ledgers, $this->request->getData());
                $this->Customers->Ledgers->save($ledgers);

                $opening_bal=$this->request->data('opening_bal');
                if($opening_bal > 0)
                {
                    $credit_debit=$this->request->getData('credit_debit');
                    if(!empty($credit_debit)){
                        $accountingEntries = $this->Customers->AccountingEntries->newEntity();
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
                        $accountingEntries = $this->Customers->AccountingEntries->patchEntity($accountingEntries, $this->request->getData());
                        $this->Customers->AccountingEntries->save($accountingEntries);
                    }
                    $bill_to_bill=$this->request->getData('bill_to_bill');
                    if($bill_to_bill == 'yes'){
                        $referenceDetails = $this->Customers->ReferenceDetails->newEntity();
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
                        $referenceDetails = $this->Customers->ReferenceDetails->patchEntity($referenceDetails, $this->request->getData());
                        $this->Customers->ReferenceDetails->save($referenceDetails);
                    }                    
                }

                $this->Flash->success(__('The customer has been saved.'));
                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('The customer could not be saved. Please, try again.'));
        }
        $customersList = $this->Customers->find('list', ['limit' => 200]);
        $statesList = $this->Customers->States->find('list', ['limit' => 200]);
        $this->set(compact('customer', 'customersList','statesList'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Customer id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $customer = $this->Customers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            pr($this->request->getData());exit;
            $customer = $this->Customers->patchEntity($customer, $this->request->getData());
            if ($this->Customers->save($customer)) {
                $this->Flash->success(__('The customer has been saved.'));

                return $this->redirect(['action' => 'index','edt']);
            }
            $this->Flash->error(__('The customer could not be saved. Please, try again.'));
        }
        $statesList = $this->Customers->States->find('list', ['limit' => 200]);
        $this->set(compact('customer', 'emails','statesList'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Customer id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $customer = $this->Customers->get($id, [
            'contain' => []
        ]); 
        $customer = $this->Customers->patchEntity($customer, $this->request->getData());
        $customer->is_deleted = 1;
        if ($this->Customers->save($customer)) {
            $this->Flash->success(__('The customer has been deleted.'));
        } else {
            $this->Flash->error(__('The customer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index','del']);
    }

    //  Auto COmpleted

    public function ajaxAutocompleted(){
        $name=$this->request->getData('input'); 
        $searchType=$this->request->getData('searchType');
        if($searchType == 'customer_name'){
            $customers=$this->Customers->find()->where(['Customers.name Like'=>''.$name.'%','Customers.is_deleted'=>0]);
            ?>
                <ul id="country-list">
                    <?php foreach($customers as $show){ ?>
                        <li onClick="selectAutoCompleted('<?php echo $show->name;?>')">
                            <?php echo $show->name?>
                        </li>
                    <?php } ?>
                </ul>
            <?php
        }
        else
        {
            $customers=$this->Customers->find()->where(['Customers.mobile_no Like'=>''.$name.'%','Customers.is_deleted'=>0]);
            ?>
                <ul id="country-list">
                    <?php foreach($customers as $show){ ?>
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
