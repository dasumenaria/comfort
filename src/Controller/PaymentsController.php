<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Payments Controller
 *
 * @property \App\Model\Table\PaymentsTable $Payments
 *
 * @method \App\Model\Entity\Payment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PaymentsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['FinancialYears', 'Companies']
        ];
        $payments = $this->paginate($this->Payments);

        $this->set(compact('payments'));
    }

    /**
     * View method
     *
     * @param string|null $id Payment id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $payment = $this->Payments->get($id, [
            'contain' => ['FinancialYears', 'Companies', 'AccountingEntries', 'PaymentRows']
        ]);

        $this->set('payment', $payment);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $login_id = $this->Auth->User('id'); 
        $counter_id = $this->Auth->User('counter_id'); 
        $financialYear_id = $this->activeFinancialYear();
        $company_id=1;

        $payment = $this->Payments->newEntity();
        
        if ($this->request->is('post')) {
            
            $this->request->data['transaction_date'] = date("Y-m-d",strtotime($this->request->getData()['transaction_date']));
            $Voucher = $this->Payments->find()->select(['voucher_no'])->where(['company_id'=>$company_id,'financial_year_id'=>$financialYear_id])->order(['voucher_no' => 'DESC'])->first();
            if($Voucher)
            {
                $payment->voucher_no = $Voucher->voucher_no+1;
            }
            else
            {
                $payment->voucher_no = 1;
            } 
            $payment = $this->Payments->patchEntity($payment, $this->request->getData(), [
                            'associated' => ['PaymentRows','PaymentRows.ReferenceDetails']
                        ]);
            $payment->financial_year_id =$financialYear_id;
            //transaction date for payment code start here--
            foreach($payment->payment_rows as $payment_row)
            {
                if(!empty($payment_row->reference_details))
                {
                    foreach($payment_row->reference_details as $reference_detail)
                    {
                        $reference_detail->transaction_date = $payment->transaction_date;
                    }
                }
                if(!empty($payment_row->cheque_date))
                {
                    $payment_row->cheque_date= date('Y-m-d',strtotime($payment_row->cheque_date)); 
                }
            } 
            //transaction date for payment code close here-- 
            
            $payment->company_id = $company_id;
            if ($this->Payments->save($payment)) {
            foreach($payment->payment_rows as $payment_row)
                {
                    $accountEntry = $this->Payments->AccountingEntries->newEntity();
                    $accountEntry->ledger_id                  = $payment_row->ledger_id;
                    $accountEntry->debit                      = @$payment_row->debit;
                    $accountEntry->credit                     = @$payment_row->credit;
                    $accountEntry->transaction_date           = $payment->transaction_date;
                    $accountEntry->company_id                 = $company_id;
                    $accountEntry->payment_id                 = $payment->id;
                    $accountEntry->payment_row_id             = $payment_row->id;
                    $this->Payments->AccountingEntries->save($accountEntry);
                }
                  
                $this->Flash->success(__('The payment has been saved.'));

                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('The payment could not be saved. Please, try again.'));
        }
        $Voucher = $this->Payments->find()->select(['voucher_no'])->where(['company_id'=>$company_id,'financial_year_id'=>$financialYear_id])->order(['voucher_no' => 'DESC'])->first();
        if($Voucher)
        {
            $voucher_no=$Voucher->voucher_no+1;
        }
        else
        { 
            $voucher_no=1;
        }       
        //bank group
        $bankParentGroups = $this->Payments->PaymentRows->Ledgers->AccountingGroups->find()
                        ->where(['AccountingGroups.company_id'=>$company_id, 'AccountingGroups.bank'=>'1']);
                        
        $bankGroups=[];
        
        foreach($bankParentGroups as $bankParentGroup)
        {
            $accountingGroups = $this->Payments->PaymentRows->Ledgers->AccountingGroups
            ->find('children', ['for' => $bankParentGroup->id])->toArray();
            $bankGroups[]=$bankParentGroup->id;
            foreach($accountingGroups as $accountingGroup){
                $bankGroups[]=$accountingGroup->id;
            }
        }
        
        //cash-in-hand group
        $cashParentGroups = $this->Payments->PaymentRows->Ledgers->AccountingGroups->find()
                        ->where(['AccountingGroups.company_id'=>$company_id, 'AccountingGroups.cash'=>'1']);
                        
        $cashGroups=[];
        
        foreach($cashParentGroups as $cashParentGroup)
        {
            $cashChildGroups = $this->Payments->PaymentRows->Ledgers->AccountingGroups
            ->find('children', ['for' => $cashParentGroup->id])->toArray();
            $cashGroups[]=$cashParentGroup->id;
            foreach($cashChildGroups as $cashChildGroup){
                $cashGroups[]=$cashChildGroup->id;
            }
        }
        
        $partyParentGroups = $this->Payments->PaymentRows->Ledgers->AccountingGroups->find()
                            ->where(['AccountingGroups.company_id'=>$company_id, 'AccountingGroups.payment_ledger'=>1]);

        $partyGroups=[];
        
        foreach($partyParentGroups as $partyParentGroup)
        {
            
            $partyChildGroups = $this->Payments->PaymentRows->Ledgers->AccountingGroups->find('children', ['for' => $partyParentGroup->id]);
            $partyGroups[]=$partyParentGroup->id;
            foreach($partyChildGroups as $partyChildGroup){
                $partyGroups[]=$partyChildGroup->id;
            }
        }
    
        $partyLedgers = $this->Payments->PaymentRows->Ledgers->find()
        ->where(['Ledgers.accounting_group_id IN' =>$partyGroups,'Ledgers.company_id'=>$company_id]);
        
        //$ledgers = $this->Payments->PaymentRows->Ledgers->find()->where(['company_id'=>$company_id]);
        foreach($partyLedgers as $ledger){
            if(in_array($ledger->accounting_group_id,$bankGroups)){
                $ledgerOptions[]=['text' =>$ledger->name, 'value' => $ledger->id ,'open_window' => 'bank','bank_and_cash' => 'yes'];
            }
            else if($ledger->bill_to_bill_accounting == 'yes'){
                $ledgerOptions[]=['text' =>$ledger->name, 'value' => $ledger->id,'open_window' => 'party','bank_and_cash' => 'no','default_days'=>$ledger->default_credit_days];
            }
            else if(in_array($ledger->accounting_group_id,$cashGroups)){
                $ledgerOptions[]=['text' =>$ledger->name, 'value' => $ledger->id ,'open_window' => 'no','bank_and_cash' => 'yes'];
            }
            else{
                $ledgerOptions[]=['text' =>$ledger->name, 'value' => $ledger->id,'open_window' => 'no','bank_and_cash' => 'no' ];
            }
        }
         
        //$referenceDetails=$this->Payments->PaymentRows->ReferenceDetails->find('list');
        
        $this->set(compact('payment', 'company_id','voucher_no','ledgerOptions', 'referenceDetails'));
        $this->set('_serialize', ['payment']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Payment id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $payment = $this->Payments->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $payment = $this->Payments->patchEntity($payment, $this->request->getData());
            if ($this->Payments->save($payment)) {
                $this->Flash->success(__('The payment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The payment could not be saved. Please, try again.'));
        }
        $financialYears = $this->Payments->FinancialYears->find('list', ['limit' => 200]);
        $companies = $this->Payments->Companies->find('list', ['limit' => 200]);
        $this->set(compact('payment', 'financialYears', 'companies'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Payment id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $payment = $this->Payments->get($id);
        if ($this->Payments->delete($payment)) {
            $this->Flash->success(__('The payment has been deleted.'));
        } else {
            $this->Flash->error(__('The payment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
