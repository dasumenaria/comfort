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
    public function index()
    {
        $this->paginate = [
            'contain' => ['InvoiceTypes', 'Customers']
        ];
        $invoices = $this->paginate($this->Invoices);

        $this->set(compact('invoices'));
    }

    /**
     * View method
     *
     * @param string|null $id Invoice id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $invoice = $this->Invoices->get($id, [
            'contain' => ['InvoiceTypes', 'Customers', 'Logins', 'Counters', 'WaveoffLogins', 'WaveoffCounters', 'FinancialYears', 'GstFigures', 'InvoiceDetails']
        ]);

        $this->set('invoice', $invoice);
    }

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
                     
                    $CheckInvoiceNo = $this->Invoices->find()->where(['financial_year_id'=>$financial_year_id])->order(['id'=>'DESC'])->limit(1);
                    $financialYearsData = $this->Invoices->FinancialYears->get($financial_year_id); 
                    $str = $financialYearsData->alias_name;

                    if(!empty($CheckInvoiceNo->toArray())){
                        $max_invoice_no = $CheckInvoiceNo->invoice_no; 
                        $old_invoice_no = str_replace($str,"",$max_invoice_no);
                        $old_invoice_no = $old_invoice_no + 1;  
                        $invoice_no = $str.'/'.$old_invoice_no;
                    }
                    else{
                        $invoice_no = $str.'/1';
                    }
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
                pr($invoice); exit; 
                if ($this->Invoices->save($invoice)) {
                    $this->Flash->success(__('The invoice has been saved.'));
                    return $this->redirect(['action' => 'add']);
                }
                $this->Flash->error(__('The invoice could not be saved. Please, try again.')); 
            }
            
            /*$invoice = $this->Invoices->patchEntity($invoice, $this->request->getData());
            if ($this->Invoices->save($invoice)) {
                $this->Flash->success(__('The invoice has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The invoice could not be saved. Please, try again.'));*/

        }
        $invoiceTypes = $this->Invoices->InvoiceTypes->find('list', ['limit' => 200]);
        $customers = $this->Invoices->Customers->find('list', ['limit' => 200]); 
        $this->set(compact('invoice', 'invoiceTypes', 'customers','showRecord'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Invoice id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
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
        $logins = $this->Invoices->Logins->find('list', ['limit' => 200]);
        $counters = $this->Invoices->Counters->find('list', ['limit' => 200]);
        $waveoffLogins = $this->Invoices->WaveoffLogins->find('list', ['limit' => 200]);
        $waveoffCounters = $this->Invoices->WaveoffCounters->find('list', ['limit' => 200]);
        $financialYears = $this->Invoices->FinancialYears->find('list', ['limit' => 200]);
        $gstFigures = $this->Invoices->GstFigures->find('list', ['limit' => 200]);
        $this->set(compact('invoice', 'invoiceTypes', 'customers', 'logins', 'counters', 'waveoffLogins', 'waveoffCounters', 'financialYears', 'gstFigures'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Invoice id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
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
