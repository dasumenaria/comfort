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
        $invoice = $this->Invoices->newEntity();
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

                $this->set(compact('customer_id', 'invoice_type_id', 'payment_type','complimenatry_status','remarks','invoiceTypeData','customerData','dutySlipData'));
                   
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
