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
                //-- INVOICE
                $query = $this->Invoices->query(); 
                $query->update()->set(['waveoff_reason'=>$reason,'waveoff_status'=>1,'waveoff_login_id'=>$login_id,'waveoff_counter_id'=>$counter_id,])
                    ->where(['id' => $id])
                    ->execute();
                    //-- DutySlip
                $detailsData = $this->Invoices->InvoiceDetails->find()->where(['InvoiceDetails.invoice_id'=>$id]);
                foreach ($detailsData as $value) {
                    $query = $this->Invoices->Dutyslips->query(); 
                    $query->update()->set(['billing_status'=>'no'])
                        ->where(['id' => $value->duty_slip_id])
                        ->execute();  
                }
                 
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
                $other_charges=$this->request->getData('other_charges'); 

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
                   $str = $financialYearsData->alias_name; 


                   if(!empty($CheckInvoiceNo))
                    {
                        $max_invoice_no = $CheckInvoiceNo->invoice_no;
                        $strs = 'A';
                        $old_invoice_no_1 = str_replace($strs,"",$max_invoice_no);
                        $old_invoice_no = str_replace('/'.$financialYearsData->alias_name,"",$old_invoice_no_1);
                        $old_invoice_no = $old_invoice_no + 1;
                        $invoice_no = 'A'. sprintf("%04s",$old_invoice_no).'/'.$financialYearsData->alias_name;
                    }
                    else 
                    {
                        $invoice_no = 'A0001/'.$financialYearsData->alias_name;
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
                    $invoice->discount = $discount;
                    $invoice->gst_figure_id = 3;

                    $LedgerData = $this->Invoices->Ledgers->find()->select(['id'])->where(['Ledgers.customer_id'=>$this->request->getData('customer_id')])->first();
                    $customer_ledger_id = $LedgerData->id;
                    $invoice->ledger_id = $customer_ledger_id;
                    //pr($invoice); exit; 
                    if ($this->Invoices->save($invoice)) {

                        //-- DISCOUNT ENTRY
                        if($discount>0){
                            $ledger_id = 34; 
                            $accountingEntries = $this->Invoices->AccountingEntries->newEntity();
                            $this->request->data['ledger_id'] = $ledger_id;
                            
                            $this->request->data['credit'] = 0;
                            $this->request->data['debit'] = $discount;
                            $this->request->data['transaction_date'] = date("Y-m-d");
                            $this->request->data['company_id'] = $company_id; 
                            $this->request->data['invoice_id'] = $invoice->id; 
                            $accountingEntries = $this->Invoices->AccountingEntries->patchEntity($accountingEntries, $this->request->getData());
                            $this->Invoices->AccountingEntries->save($accountingEntries);   
                        }  
                        //-- DISCOUNT ENTRY

                        //-- Other Charges
                        if($other_charges>0){
                            $ledger_id = 35; 
                            $accountingEntries = $this->Invoices->AccountingEntries->newEntity();
                            $this->request->data['ledger_id'] = $ledger_id;
                            
                            $this->request->data['credit'] = $other_charges;
                            $this->request->data['debit'] = 0;
                            $this->request->data['transaction_date'] = date("Y-m-d");
                            $this->request->data['company_id'] = $company_id; 
                            $this->request->data['invoice_id'] = $invoice->id; 
                            $accountingEntries = $this->Invoices->AccountingEntries->patchEntity($accountingEntries, $this->request->getData());
                            $this->Invoices->AccountingEntries->save($accountingEntries);   
                        }
                        //--Other Charges
                        
                        $company_id=1; 

                        
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
                        //$amt = $this->request->getData('total') - $this->request->getData('discout_final');
                        $this->request->data['credit'] = $total;
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
                        if($bill_to_bill =='yes')
                        { 
                            //--Referance Details Entry
                            $referenceDetail = $this->Invoices->ReferenceDetails->newEntity();
                            $this->request->data['ledger_id'] = $customer_ledger_id; 
                            $this->request->data['credit'] = 0;
                            $this->request->data['debit'] = $this->request->getData('grand_total');
                            $this->request->data['transaction_date'] = date("Y-m-d");
                            $this->request->data['company_id'] = $company_id; 
                            $this->request->data['invoice_id'] = $invoice->id; 
                            $this->request->data['customer_id'] = '';
                            $this->request->data['type'] = 'New Ref'; 
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


                            $service_id = $this->request->getData('service_id'); 
                            $car_type_id = $this->request->getData('car_type_id');
                            if(!empty($customer_id) &&  !empty($service_id) && !empty($car_type_id)){
                                echo "in";exit;
                            }

                            echo "out";exit;
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
        $this->set('invoice', $invoice);
    }

    public function pdf()
    {
        $this->viewBuilder()->setLayout('');   
        $this->set('pdfData', $this->request->getData('pdfData'));
    }
    public function excel()
    {  
        $this->viewBuilder()->setLayout(''); 
        $this->set('pdfData', $this->request->getData('pdfData'));
    }

    public function edit($id = null)
    {
        $invoice = $this->Invoices->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            //pr($this->request->getData());exit;
            $guest_name=$this->request->getData('guest_name');
            $count=$this->request->getData('count');
            $total=$this->request->getData('total');
            $tax_type=$this->request->getData('tax_type');
            $invoice_gst=$this->request->getData('invoice_gst');
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

            $discount=$this->request->getData('discount');
            $discout_final=$this->request->getData('discout_final');
            $grand_total=$this->request->getData('grand_total');
            $invoice_id=$this->request->getData('invoice_id');
            $customer_id=$this->request->getData('customer_id');
            $date=date('Y-m-d',strtotime($this->request->getData('date')));
            $current_date=date('Y-m-d',strtotime($this->request->getData('current_date')));
            $remarks=$this->request->getData('remarks');
            $other_charges=$this->request->getData('other_charges');

            $invoice = $this->Invoices->patchEntity($invoice, $this->request->getData());
            $invoice->tax = $tax;
            $invoice->date = $date;
            $invoice->current_date = $current_date;
            $invoice->discount = $discout_final; 
            $invoice->gst_figure_id = 3;

            $LedgerData = $this->Invoices->Ledgers->find()->select(['id'])->where(['Ledgers.customer_id'=>$this->request->getData('customer_id')])->first();
            $customer_ledger_id = $LedgerData->id;
            $invoice->ledger_id = $customer_ledger_id;

            //pr($invoice);exit;
            if ($this->Invoices->save($invoice)) {

                $this->Invoices->AccountingEntries->deleteAll(['invoice_id' => $id]);
                $this->Invoices->ReferenceDetails->deleteAll(['invoice_id' => $id]);

                $company_id=1;
                //-- DISCOUNT ENTRY
                if($discout_final>0){
                    $ledger_id = 34; 
                    $accountingEntries = $this->Invoices->AccountingEntries->newEntity();
                    $this->request->data['ledger_id'] = $ledger_id;
                    $this->request->data['credit'] = 0;
                    $this->request->data['debit'] = $discout_final;
                    $this->request->data['transaction_date'] =  $date;
                    $this->request->data['company_id'] = $company_id; 
                    $this->request->data['invoice_id'] = $invoice->id; 
                    $accountingEntries = $this->Invoices->AccountingEntries->patchEntity($accountingEntries, $this->request->getData());
                    $this->Invoices->AccountingEntries->save($accountingEntries);   
                }  
                //-- DISCOUNT ENTRY

                //-- Other Charges
                if($other_charges>0){
                    $ledger_id = 35; 
                    $accountingEntries = $this->Invoices->AccountingEntries->newEntity();
                    $this->request->data['ledger_id'] = $ledger_id;
                    $this->request->data['credit'] = $other_charges;
                    $this->request->data['debit'] = 0;
                    $this->request->data['transaction_date'] =  $date;
                    $this->request->data['company_id'] = $company_id; 
                    $this->request->data['invoice_id'] = $invoice->id; 
                    $accountingEntries = $this->Invoices->AccountingEntries->patchEntity($accountingEntries, $this->request->getData());
                    $this->Invoices->AccountingEntries->save($accountingEntries);   
                }
                //--Other Charges 

                //--Dabit Customer
                $accountingEntries = $this->Invoices->AccountingEntries->newEntity();
                $this->request->data['ledger_id'] = $customer_ledger_id;
                $this->request->data['credit'] = 0;
                $this->request->data['debit'] = $this->request->getData('grand_total');
                $this->request->data['transaction_date'] = $date;
                $this->request->data['company_id'] = $company_id; 
                $this->request->data['invoice_id'] = $invoice->id; 
                $accountingEntries = $this->Invoices->AccountingEntries->patchEntity($accountingEntries, $this->request->getData());
                $this->Invoices->AccountingEntries->save($accountingEntries);
                //pr($accountingEntries);exit;
                //--Dabit Customer

                $ledger_id = 33;
                //--Credit Taxi Services
                $accountingEntries = $this->Invoices->AccountingEntries->newEntity();
                $this->request->data['ledger_id'] = $ledger_id;
                $amt = $this->request->getData('total') - $this->request->getData('discout_final');
                $this->request->data['credit'] = $this->request->getData('total');
                $this->request->data['debit'] = 0;
                $this->request->data['transaction_date'] =  $date;
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
                    $this->request->data['transaction_date'] =  $date;
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
                    $this->request->data['transaction_date'] =  $date;;
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
                    $this->request->data['transaction_date'] = $date;
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
                    $this->request->data['transaction_date'] = $date;
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
                if($bill_to_bill =='yes')
                { 
                    //--Referance Details Entry
                    $referenceDetail = $this->Invoices->ReferenceDetails->newEntity();
                    $this->request->data['ledger_id'] = $customer_ledger_id; 
                    $this->request->data['credit'] = 0;
                    $this->request->data['debit'] = $this->request->getData('grand_total');
                    $this->request->data['transaction_date'] =  $date;
                    $this->request->data['company_id'] = $company_id; 
                    $this->request->data['invoice_id'] = $invoice->id; 
                    $this->request->data['customer_id'] = '';
                    $this->request->data['type'] = 'New Ref';
                    $this->request->data['ref_name'] = 'IN'.$invoice->id; 
                    $referenceDetail = $this->Invoices->ReferenceDetails->patchEntity($referenceDetail, $this->request->getData());
                    $this->Invoices->ReferenceDetails->save($referenceDetail);
                    //--Credit CGST   
                }
                for($k=1;$k<=$count;$k++)
                {
                    $main_amnt=$this->request->getData('main_amnt'.$k);
                    $extra_amnt=$this->request->getData('extra_amnt'.$k);  
                    $extra_chg=$this->request->getData('extra_chg'.$k);
                    $permit_chg=$this->request->getData('permit_chg'.$k);
                    $parking_chg=$this->request->getData('parking_chg'.$k);
                    $otherstate_chg=$this->request->getData('otherstate_chg'.$k);
                    $guide_chg=$this->request->getData('guide_chg'.$k);
                    $misc_chg=$this->request->getData('misc_chg'.$k);
                    $fuel_hike_chg=$this->request->getData('fuel_hike_chg'.$k);
                    $duty_slip_id=$this->request->getData('duty_slip_id'.$k);
                    $invoice_detail_id=$this->request->getData('invoice_detail_id'.$k);

                    $tot_amnt=$main_amnt+$extra_chg+$permit_chg+$parking_chg+$otherstate_chg+$guide_chg+$misc_chg+$fuel_hike_chg;

                    $amount=$main_amnt+$extra_chg+$permit_chg+$parking_chg+$otherstate_chg+$guide_chg+$misc_chg+$extra_amnt+$fuel_hike_chg;
                    //-- DS UPDATE
                    $query = $this->Invoices->Dutyslips->query(); 
                    $query->update()->set([
                        'guest_name'=>$guest_name,
                        'extra_amnt'=>$extra_amnt,
                        'extra_chg'=>$extra_chg,
                        'permit_chg'=>$permit_chg,
                        'parking_chg'=>$parking_chg,
                        'otherstate_chg'=>$otherstate_chg,
                        'guide_chg'=>$guide_chg,
                        'misc_chg'=>$misc_chg,
                        'tot_amnt'=>$tot_amnt,
                        'fuel_hike_chg'=>$fuel_hike_chg
                        ])
                        ->where(['id' => $duty_slip_id])
                        ->execute();

                    //-- DETAILS UPDATE
                    $query = $this->Invoices->InvoiceDetails->query(); 
                    $query->update()->set(['amount'=>$amount])
                        ->where(['id' => $invoice_detail_id])
                        ->execute();
                }

                $this->Flash->success(__('The invoice has been saved.'));
                return $this->redirect(['action' => 'index','edt']);
            }
            $this->Flash->error(__('The invoice could not be saved. Please, try again.'));
        }
        $invoiceTypes = $this->Invoices->InvoiceTypes->find('list', ['limit' => 200]);
        $customers = $this->Invoices->Customers->find('list', ['limit' => 200]); 
        $gstData = $this->Invoices->GstFigures->get(3);
        $row_invoice = $this->Invoices->get($id, [
            'contain' => ['Customers','InvoiceDetails'=>['DutySlips'=>['Cars','Services','CarTypes']]]
        ]);
        $this->set(compact('row_invoice', 'invoiceTypes', 'customers','gstData'));
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

    public function waveoffBilling()
    {
        $RecordShow = 0;
        $where=array();
        $date_from='';
        $date_to='';
        if ($this->request->is(['patch', 'post', 'put'])) {
            $where['Invoices.waveoff_status']=1;
            $waveoffds = $this->Invoices->find()->contain(['Customers','Logins','InvoiceDetails'])->where($where);
            if(!empty($this->request->getData('date_from'))){
                $date_from=date('Y-m-d',strtotime($this->request->getData('date_from'))); 
                $date_to=date('Y-m-d',strtotime($this->request->getData('date_to')));  
                $waveoffds->where(function($exp) use($date_from,$date_to) {
                    return $exp->between('date', $date_from, $date_to, 'date');
                });
            } 
            $RecordShow=1;
        }
        $this->set(compact('RecordShow','waveoffds','date_from','date_to'));
    }
}
