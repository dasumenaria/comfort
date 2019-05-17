<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Invoices Controller
 *
 * @property \App\Model\Table\InvoicesTable $Invoices
 *
 * @method \App\Model\Entity\Invoice[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InvoicesController extends AppController
{
    public function index($type = null)
    {
        $RecordShow = 0; 
        $where=array();
        $requests = $this->request->getData();
        if ($this->request->is(['patch', 'post', 'put'])) {  
            if(!empty($this->request->getData('searchDS'))){ 
                foreach ($this->request->getData() as $key => $value) {
                    if(!empty($value))
                    { 
                        if($key == 'date_from'){} 
                        else if($key == 'searchDS'){} 
                        else if($key == 'date_to') {}
                        else if($key == 'date') {}
                        else if($key == 'guest_name') {}
                        else if($key == 'dutyslip_id') {}
                        else
                        {
                            $where['Invoices.'.$key] = $value;
                        }
                    }
                }
                if($type == 'edt'){
                    $where['Invoices.payment_status'] = 'no'; 
                    $where['Invoices.waveoff_status'] = 0; 
                } 
                //pr($where);exit;
                $customerList = $this->Invoices->find()->contain(['InvoiceTypes', 'Customers','InvoiceDetails'=>['DutySlips']])->where($where);

                if(!empty($this->request->getData('date_from'))){
                    $date_from=date('Y-m-d',strtotime($this->request->getData('date_from'))); 
                    $date_to=date('Y-m-d',strtotime($this->request->getData('date_to')));  
                    $customerList->where(function($exp) use($date_from,$date_to) {
                        return $exp->between('date', $date_from, $date_to, 'date');
                    });
                } 
                if(!empty($this->request->getData('date'))){
                    $date_from=date('Y-m-d',strtotime($this->request->getData('date')));    
                    $customerList->where(function($exp) use($date_from,$date_from) {
                        return $exp->between('current_date', $date_from, $date_from, 'date');
                    });
                }
                if(!empty($this->request->getData('dutyslip_id'))){
                    $customerList->where(['invoiceDetails.dutyslip_id'=>$this->request->getData('dutyslip_id')]);
                }
                 
                //-- Guest Name
                $RecordShow=1;
            }
            if(!empty($this->request->getData('deleteDS'))){
                $login_id = $this->Auth->User('id'); 
                $counter_id = $this->Auth->User('counter_id');

                $id = $this->request->getData('dsid');
                $reason = $this->request->getData('reason');
                $query = $this->Invoices->query(); 
                $query->update()->set(['waveoff_reason'=>$reason,'waveoff_status'=>1,'waveoff_login_id'=>$login_id,'waveoff_counter_id'=>$counter_id,])
                    ->where(['id' => $id])
                    ->execute();
                $this->Flash->success(__('Invoice Waveoff Successfully'));
                return $this->redirect(['action' => 'index',$type]);
            } 
        } 
        if($type == 'edt'){ $displayName = 'Edit';}
        if($type == 'del'){ $displayName = 'Waveoff';}
        if($type == 'ser'){ $displayName = 'Search';}
 
        $customers = $this->Invoices->Customers->find('list', ['limit' => 200]);
        $this->set(compact('customerList','displayName','type','RecordShow','customers'));  
    }

     
    /**
     * View method
     *
     * @param string|null $id Invoice id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $showRecord = 0;
        $login_id = $this->Auth->User('id'); 
        $counter_id = $this->Auth->User('counter_id'); 
        $ldrview = $this->Auth->User('ldrview'); 
        $invoice = $this->Invoices->newEntity();
        $financial_year_id = $this->activeFinancialYear();
        if ($this->request->is('post')) {
            
            if(!empty($this->request->getData('searchDS'))){
                $customer_id = $this->request->getData('customer_id');
                $invoice_type_id = $this->request->getData('invoice_type_id');
                $payment_type = $this->request->getData('payment_type');
                $complimenatry_status = $this->request->getData('complimenatry_status');
                $remarks = $this->request->getData('remarks');
                $showRecord = 1;
                $tax_type=1;
                //-- Check Tax Rate
                $customerData = $this->Invoices->Customers->get($customer_id);
                $servicetax_status = $customerData->servicetax_status;
                $state = $customerData->state;
                if($state=='rajasthan' || $state=='Rajasthan' || $state=='RAJASTHAN')
                {
                    $tax_type=0;
                }
                $invoiceTypeData = $this->Invoices->InvoiceTypes->get($invoice_type_id);
                $dutySlipData = $this->Invoices->DutySlips->find()->where(['DutySlips.customer_id'=>$customer_id,'DutySlips.waveoff_status'=>0 ,'DutySlips.billing_status'=>'no'])->contain(['CarTypes','Services','Cars']); 

                //pr($dutySlipData->toArray());exit;
                $gstData = $this->Invoices->GstFigures->get(3);

                $this->set(compact('customer_id', 'invoice_type_id', 'payment_type','complimenatry_status','remarks','invoiceTypeData','customerData','dutySlipData','tax_type','gstData'));      
            }
            if(!empty($this->request->getData('invoiceReg'))){ 

                //pr($this->request->getData());exit;
                $count=$this->request->getData('count');  
                $payment_type=$this->request->getData('payment_type');
                $remarks=$this->request->getData('remarks');
                $customer_id=$this->request->getData('customer_id');
                $invoice_type_id=$this->request->getData('invoice_type_id');
                $total=$this->request->getData('total');
                $discount=$this->request->getData('discout_final');
                $tax_type=$this->request->getData('tax_type'); 

                for($i=1;$i<=$count;$i++)
                {
                    $dutyslip_id[]=$this->request->getData('ds_idd'.$i); 
                }
                $tax=0;
                if($tax_type==0){
                    $tax+=$this->request->getData('taxation1');
                    $tax+=$this->request->getData('taxation2');
                }
                else{
                    $tax+=$this->request->getData('taxation1');
                }

                $grand_total=$this->request->getData('grand_total');
                $complimenatry_status=$this->request->getData('complimenatry_status');
                $invoice_date= $this->request->getData('invoice_date');
                //--
                $findCount = $this->Invoices->InvoiceDetails->find()->where(['InvoiceDetails.duty_slip_id IN'=>$dutyslip_id])->count();
                if($findCount==0){
                     
                    $CheckInvoiceNo = $this->Invoices->find()->where(['financial_year_id'=>$financial_year_id])->order(['id'=>'DESC'])->first();
                    
                    $financialYearsData = $this->Invoices->FinancialYears->get($financial_year_id); 
                   $str = $financialYearsData->alias_name.'/'; 
                    if(!empty($CheckInvoiceNo)){
                        $max_invoice_no = $CheckInvoiceNo->invoice_no; 
                        $old_invoice_no = str_replace($str,"",$max_invoice_no);
                        $old_invoice_no = $old_invoice_no + 1;  
                        $invoice_no = $str.$old_invoice_no;
                    }
                    else{
                        $invoice_no = $str.'1';
                        $old_invoice_no=1;
                    } 
                    $invoice = $this->Invoices->patchEntity($invoice, $this->request->getData());
                    $invoice->invoice_no = $invoice_no;
                    $invoice->date = $invoice_date;
                    $invoice->payment_status = 'no';
                    $invoice->tax = $tax;
                    $invoice->remarks = $remarks;
                    $invoice->login_id = $login_id;
                    $invoice->counter_id = $counter_id;
                    $invoice->financial_year_id = $financial_year_id;
                    $invoice->current_date = date("Y-m-d");
                    //pr($invoice); exit; 
                    if ($this->Invoices->save($invoice)) {
                        $company_id=1;
                        $LedgerData = $this->Invoices->Ledgers->find()->select(['id'])->where(['Ledgers.customer_id'=>$this->request->getData('customer_id')])->first();
                        $customer_ledger_id = $LedgerData->id;
                        //--Dabit Customer
                        $accountingEntries = $this->Invoices->AccountingEntries->newEntity();
                        $this->request->data['ledger_id'] = $customer_ledger_id;
                        $this->request->data['credit'] = 0;
                        $this->request->data['debit'] = $this->request->getData('grand_total');
                        $this->request->data['transaction_date'] = date("Y-m-d");
                        $this->request->data['company_id'] = $company_id; 
                        $this->request->data['invoice_id'] = $invoice->id; 
                        $accountingEntries = $this->Invoices->AccountingEntries->patchEntity($accountingEntries, $this->request->getData());
                        $this->Invoices->AccountingEntries->save($accountingEntries);
                        //--Dabit Customer
 
                        $ledger_id = 33;
                        //--Credit Taxi Services
                        $accountingEntries = $this->Invoices->AccountingEntries->newEntity();
                        $this->request->data['ledger_id'] = $ledger_id;
                        $amt = $this->request->getData('total') - $this->request->getData('discout_final');
                        $this->request->data['credit'] = $amt;
                        $this->request->data['debit'] = 0;
                        $this->request->data['transaction_date'] = date("Y-m-d");
                        $this->request->data['company_id'] = $company_id; 
                        $this->request->data['invoice_id'] = $invoice->id; 
                        $accountingEntries = $this->Invoices->AccountingEntries->patchEntity($accountingEntries, $this->request->getData());
                        $this->Invoices->AccountingEntries->save($accountingEntries);
                        //--Credit Taxi Services
                        
                        if($tax_type == 0 ){
                            $ledger_id = 16;
                            //--Credit CGST
                            $accountingEntries = $this->Invoices->AccountingEntries->newEntity();
                            $this->request->data['ledger_id'] = $ledger_id; 
                            $this->request->data['credit'] = $this->request->getData('taxation1');
                            $this->request->data['debit'] = 0;
                            $this->request->data['transaction_date'] = date("Y-m-d");
                            $this->request->data['company_id'] = $company_id; 
                            $this->request->data['invoice_id'] = $invoice->id; 
                            $accountingEntries = $this->Invoices->AccountingEntries->patchEntity($accountingEntries, $this->request->getData());
                            $this->Invoices->AccountingEntries->save($accountingEntries);
                            //--Credit CGST

                            $ledger_id = 17;
                            //--Credit SGST
                            $accountingEntries = $this->Invoices->AccountingEntries->newEntity();
                            $this->request->data['ledger_id'] = $ledger_id; 
                            $this->request->data['credit'] = $this->request->getData('taxation2');
                            $this->request->data['debit'] = 0;
                            $this->request->data['transaction_date'] = date("Y-m-d");
                            $this->request->data['company_id'] = $company_id; 
                            $this->request->data['invoice_id'] = $invoice->id; 
                            $accountingEntries = $this->Invoices->AccountingEntries->patchEntity($accountingEntries, $this->request->getData());
                            $this->Invoices->AccountingEntries->save($accountingEntries);
                            //--Credit SGST
                        }
                        else
                        {
                            $ledger_id = 18;
                            //--Credit IGST
                            $accountingEntries = $this->Invoices->AccountingEntries->newEntity();
                            $this->request->data['ledger_id'] = $ledger_id; 
                            $this->request->data['credit'] = $this->request->getData('taxation1');
                            $this->request->data['debit'] = 0;
                            $this->request->data['transaction_date'] = date("Y-m-d");
                            $this->request->data['company_id'] = $company_id; 
                            $this->request->data['invoice_id'] = $invoice->id; 
                            $accountingEntries = $this->Invoices->AccountingEntries->patchEntity($accountingEntries, $this->request->getData());
                            $this->Invoices->AccountingEntries->save($accountingEntries);
                            //--Credit CGST
                        }
                        
                        //-- ROund Off 
                        if(str_replace('-',' ',$this->request->getData('round_off'))>0)
                        {
                             
                            if($this->request->getData('isRoundofType')=='0')
                            {
                                $debit=0;
                                $credit=str_replace('-',' ',$this->request->getData('round_off'));
                            }
                            else if($this->request->getData('isRoundofType')=='1')
                            {
                                $credit=0;
                                $debit=str_replace('-',' ',$this->request->getData('round_off'));
                            }
                            $ledger_id = 31; 
                            $accountingEntries = $this->Invoices->AccountingEntries->newEntity();
                            $this->request->data['ledger_id'] = $ledger_id;  
                            $this->request->data['credit'] = $credit;
                            $this->request->data['debit'] = $debit;
                            $this->request->data['transaction_date'] = date("Y-m-d");
                            $this->request->data['company_id'] = $company_id; 
                            $this->request->data['invoice_id'] = $invoice->id; 
                            $accountingEntries = $this->Invoices->AccountingEntries->patchEntity($accountingEntries, $this->request->getData());
                            $this->Invoices->AccountingEntries->save($accountingEntries);
                            
                        }
                        //-- ROund Off 
                        
                        //-- Referance Details Entry
                        $customer_id = $this->request->getData('customer_id');
                        $customerDetails = $this->Invoices->Customers->get($customer_id);
                        $bill_to_bill = $customerDetails->bill_to_bill;
                        if($payment_type == 'Credit' && $bill_to_bill =='yes')
                        { 
                            //--Referance Details Entry
                            $referenceDetail = $this->Invoices->ReferenceDetails->newEntity();
                            $this->request->data['ledger_id'] = $customer_ledger_id; 
                            $this->request->data['credit'] = 0;
                            $this->request->data['debit'] = $this->request->getData('grand_total');
                            $this->request->data['transaction_date'] = date("Y-m-d");
                            $this->request->data['company_id'] = $company_id; 
                            $this->request->data['invoice_id'] = $invoice->id; 
                            $this->request->data['ref_name'] = 'IN'.$invoice->id; 
                            $referenceDetail = $this->Invoices->ReferenceDetails->patchEntity($referenceDetail, $this->request->getData());
                            $this->Invoices->ReferenceDetails->save($referenceDetail);
                            //--Credit CGST   
                        }

                        for($i=1;$i<=$count;$i++)
                        {
                            $extra_amnt = $this->request->getData('extra_amnt'.$i);
                            $main_amnt = $this->request->getData('main_amnt'.$i);
                            $ds_idd = $this->request->getData('ds_idd'.$i);
                            $extra_details = $this->request->getData('extra'.$i);
                            $amount=$extra_amnt+$main_amnt;
                            if(!empty($ds_idd) && $findCount==0)
                            {
                                $query = $this->Invoices->DutySlips->query(); 
                                $query->update()->set(['billing_status'=>'yes','extra_details'=>$extra_details,'extra_amnt'=>$extra_amnt])
                                    ->where(['id' => $ds_idd])
                                    ->execute();

                                $invoiceDetails = $this->Invoices->InvoiceDetails->newEntity();
                                $invoiceDetails = $this->Invoices->InvoiceDetails->patchEntity($invoiceDetails, $this->request->getData());
                                $invoiceDetails->invoice_id = $invoice->id;
                                $invoiceDetails->duty_slip_id = $ds_idd;
                                $invoiceDetails->amount = $amount;

                                $this->Invoices->InvoiceDetails->save($invoiceDetails); 
                            }
                        }

                        $this->Flash->success(__('The invoice has been saved.'));
                        return $this->redirect(['action' => 'ledgerView',$invoice->id]);
                    } 
                    $this->Flash->error(__('The invoice could not be saved. Please, try again.')); 
                }
            } 
        }
        $invoiceTypes = $this->Invoices->InvoiceTypes->find('list', ['limit' => 200]);
        $customers = $this->Invoices->Customers->find('list', ['limit' => 200]); 
        $this->set(compact('invoice', 'invoiceTypes', 'customers','showRecord'));
    }

    
    public function ledgerView($id = null){
        $AccountingDatas = $this->Invoices->AccountingEntries->find()->where(['AccountingEntries.invoice_id'=>$id])->contain(['Ledgers']);
        $this->set('AccountingDatas', $AccountingDatas);
        $this->set('invoice_id', $id);
    }

    public function view($id = null)
    {
        $invoice = $this->Invoices->get($id, [
            'contain' => ['InvoiceTypes', 'Customers'=>['CustomerTariffs'],'InvoiceDetails'=>['DutySlips'=>['Cars','Services','CarTypes']]]
        ]);
        pr($invoice);exit;
        $this->set('invoice', $invoice);
    }

    public function edit($id = null)
    {
        $invoice = $this->Invoices->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $invoice = $this->Invoices->patchEntity($invoice, $this->request->getData());
            if ($this->Invoices->save($invoice)) {
                $this->Flash->success(__('The invoice has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The invoice could not be saved. Please, try again.'));
        }
        $invoiceTypes = $this->Invoices->InvoiceTypes->find('list', ['limit' => 200]);
        $customers = $this->Invoices->Customers->find('list', ['limit' => 200]); 

        $this->set(compact('invoice', 'invoiceTypes', 'customers'));
    }
 
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $invoice = $this->Invoices->get($id);
        if ($this->Invoices->delete($invoice)) {
            $this->Flash->success(__('The invoice has been deleted.'));
        } else {
            $this->Flash->error(__('The invoice could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
