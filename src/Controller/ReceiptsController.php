<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Receipts Controller
 *
 * @property \App\Model\Table\ReceiptsTable $Receipts
 *
 * @method \App\Model\Entity\Receipt[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ReceiptsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
		 $company_id=1;
        $financialYear_id=$this->activeFinancialYear();
        $search=$this->request->query('search');
        $voucher_no=$this->request->query('voucher_no');
        $From=$this->request->query('From');
        $To=$this->request->query('To');
		
		$this->paginate = [
            'contain' => ['ReceiptRows'=>['Ledgers']]
        ];
		
		 if(!empty($voucher_no))
        {
            $where['Receipts.voucher_no']=$voucher_no;
        }
        if(!empty($From))
        {
            $From=date("Y-m-d",strtotime($From));
            $where['Receipts.transaction_date >='] = $From;             
        }            
        
        if(!empty($To))
        {
            $To=date("Y-m-d",strtotime($To));
            $where['Receipts.transaction_date <='] = $To;               
        }    
	
				
        $where['Receipts.company_id']=$company_id;
        $where['Receipts.financial_year_id']=$financialYear_id;
        if($search){
            $receipts = $this->paginate($this->Receipts->find()->where(['Receipts.company_id'=>$company_id,'Receipts.financial_year_id'=>$financialYear_id])->where([
            'OR' => [
                'Receipts.voucher_no' => $search,
                //....
                'Receipts.transaction_date ' => date('Y-m-d',strtotime($search))
                //...
             ]]));
        } else {
         $receipts = $this->paginate($this->Receipts->find()->where($where));
        }
	
		$this->set(compact('receipts','search','voucher_no'));
        $this->set('_serialize', ['receipts']);
     
    }

    /**
     * View method
     *
     * @param string|null $id Receipt id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $company_id=1;
        $receipts = $this->Receipts->get($id, [
            'contain' => ['ReceiptRows'=>['ReferenceDetails', 'Ledgers']]
        ]);

        $this->set('receipts', $receipts);
        $this->set('_serialize', ['receipts']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
		$receipt = $this->Receipts->newEntity();
		$company_id=1;
		$financialYear_id = $this->activeFinancialYear();
        if ($this->request->is('post')) {

		$receipt = $this->Receipts->patchEntity($receipt, $this->request->getData(),['associated' => ['ReceiptRows','ReceiptRows.ReferenceDetails']]);
		$tdate=$this->request->data('transaction_date');
		$receipt->transaction_date=date('Y-m-d',strtotime($tdate));
		$receipt->financial_year_id =$financialYear_id;
		$receipt->company_id =$company_id;
		   //transaction date for receipt code start here--
			foreach($receipt->receipt_rows as $receipt_row)
			{
				if(!empty($receipt_row->reference_details))
				{
					foreach($receipt_row->reference_details as $reference_detail)
					{
						$reference_detail->transaction_date = $receipt->transaction_date;
					}
				}
			}
			//transaction date for receipt code close here-- 

            if ($this->Receipts->save($receipt)) {
			
			foreach($receipt->receipt_rows as $receipt_row)
				{
					$accountEntry = $this->Receipts->AccountingEntries->newEntity();
					$accountEntry->ledger_id                  = $receipt_row->ledger_id;
					$accountEntry->debit                      = @$receipt_row->debit;
					$accountEntry->credit                     = @$receipt_row->credit;
					$accountEntry->transaction_date           = $receipt->transaction_date;
					$accountEntry->company_id                 = $company_id;
					$accountEntry->receipt_id                 = $receipt->id;
					$accountEntry->receipt_row_id             = $receipt_row->id;
					$this->Receipts->AccountingEntries->save($accountEntry);
				}
			
                $this->Flash->success(__('The receipt has been saved.'));
                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('The receipt could not be saved. Please, try again.'));
        }
		$Voucher_no = $this->Receipts->find()->select(['voucher_no'])->where(['company_id'=>$company_id,'financial_year_id'=>$financialYear_id])->order(['voucher_no' => 'DESC'])->first();
		if($Voucher_no)
		{
			$voucher_no=$Voucher_no->voucher_no+1;
		}
		else
		{
			$voucher_no=1;
		}
		
		//bank group
		$bankParentGroups = $this->Receipts->ReceiptRows->Ledgers->AccountingGroups->find()
						->where(['AccountingGroups.company_id'=>$company_id, 'AccountingGroups.bank'=>'1']);
						
		$bankGroups=[];
		
		foreach($bankParentGroups as $bankParentGroup)
		{
			$accountingGroups = $this->Receipts->ReceiptRows->Ledgers->AccountingGroups
			->find('children', ['for' => $bankParentGroup->id])->toArray();
			$bankGroups[]=$bankParentGroup->id;
			foreach($accountingGroups as $accountingGroup){
				$bankGroups[]=$accountingGroup->id;
			}
		}
		
		//cash-in-hand group
		$cashParentGroups = $this->Receipts->ReceiptRows->Ledgers->AccountingGroups->find()
						->where(['AccountingGroups.company_id'=>$company_id, 'AccountingGroups.cash'=>'1']);
						
		$cashGroups=[];
		
		foreach($cashParentGroups as $cashParentGroup)
		{
			$cashChildGroups = $this->Receipts->ReceiptRows->Ledgers->AccountingGroups
			->find('children', ['for' => $cashParentGroup->id])->toArray();
			$cashGroups[]=$cashParentGroup->id;
			foreach($cashChildGroups as $cashChildGroup){
				$cashGroups[]=$cashChildGroup->id;
			}
		}
		
		$partyParentGroups = $this->Receipts->ReceiptRows->Ledgers->AccountingGroups->find()
							->where(['AccountingGroups.company_id'=>$company_id, 'AccountingGroups.receipt_ledger'=>1]);

		$partyGroups=[];
		
		foreach($partyParentGroups as $partyParentGroup)
		{
			
			$partyChildGroups = $this->Receipts->ReceiptRows->Ledgers->AccountingGroups->find('children', ['for' => $partyParentGroup->id]);
			$partyGroups[]=$partyParentGroup->id;
			foreach($partyChildGroups as $partyChildGroup){
				$partyGroups[]=$partyChildGroup->id;
			}
		}
	
		$partyLedgers = $this->Receipts->ReceiptRows->Ledgers->find()
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
		$referenceDetails=$this->Receipts->ReceiptRows->ReferenceDetails->find('list');
      //  $companies = $this->Receipts->Companies->find('list', ['limit' => 200]);
        $this->set(compact('receipt', 'companies','voucher_no','ledgerOptions','company_id','referenceDetails'));
        $this->set('_serialize', ['receipt']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Receipt id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
	 
	 public function cancel($id = null)
    {
        $Receipts = $this->Receipts->get($id, [
            'contain' => ['ReceiptRows'=>['ReferenceDetails']]
        ]);
        $company_id=1;
        $Receipts->status='cancel';
        $receipt_row_ids=[];
        foreach($Receipts->receipt_rows as $receipt_row){
            $receipt_row_ids[]=$receipt_row->id;
        }
        
        if ($this->Receipts->save($Receipts)) {
            $deleteRefDetails = $this->Receipts->ReceiptRows->ReferenceDetails->query();
                $deleteRef = $deleteRefDetails->delete()
                    ->where(['ReferenceDetails.receipt_row_id IN' => $receipt_row_ids])
                    ->execute();
                $deleteAccountEntries = $this->Receipts->AccountingEntries->query();
                $result = $deleteAccountEntries->delete()
                ->where(['AccountingEntries.payment_id' => $Receipts->id])
                ->execute();
                
            $this->Flash->success(__('The Receipts has been cancelled.'));
        } else {
            $this->Flash->error(__('The Receipts could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

	
    public function edit($id = null)
    {
        $receipt = $this->Receipts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $receipt = $this->Receipts->patchEntity($receipt, $this->request->getData());
            if ($this->Receipts->save($receipt)) {
                $this->Flash->success(__('The receipt has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The receipt could not be saved. Please, try again.'));
        }
        $financialYears = $this->Receipts->FinancialYears->find('list', ['limit' => 200]);
        $companies = $this->Receipts->Companies->find('list', ['limit' => 200]);
        $salesInvoices = $this->Receipts->SalesInvoices->find('list', ['limit' => 200]);
        $this->set(compact('receipt', 'financialYears', 'companies', 'salesInvoices'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Receipt id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $receipt = $this->Receipts->get($id);
        if ($this->Receipts->delete($receipt)) {
            $this->Flash->success(__('The receipt has been deleted.'));
        } else {
            $this->Flash->error(__('The receipt could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
