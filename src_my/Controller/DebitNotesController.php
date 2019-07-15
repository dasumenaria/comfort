<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DebitNotes Controller
 *
 * @property \App\Model\Table\DebitNotesTable $DebitNotes
 *
 * @method \App\Model\Entity\DebitNote[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DebitNotesController extends AppController
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
            'contain' => ['DebitNoteRows'=>['Ledgers']],
			'limit' => 100
        ];
		
		if(!empty($voucher_no))
			{
				$where['DebitNotes.voucher_no']=$voucher_no;
			}	

		if(!empty($From))
			{
				$From=date("Y-m-d",strtotime($From));
				$where['DebitNotes.transaction_date >=']=$From;
			}
			
		if(!empty($To))
			{
				$To=date("Y-m-d",strtotime($To));
				$where['DebitNotes.transaction_date <=']=$To;	
			}			
			
		$where['DebitNotes.company_id']=$company_id;
		$where['DebitNotes.financial_year_id']=$financialYear_id;
		
		if($search){
        $debitNotes = $this->paginate($this->DebitNotes->find()->where(['DebitNotes.company_id'=>$company_id,'DebitNotes.financial_year_id'=>$financialYear_id])->where([
		'OR' => [
            'DebitNotes.voucher_no' => $search,
            //....
			'DebitNotes.transaction_date ' => date('Y-m-d',strtotime($search))
			//...
		 ]]));
		}else{
		  $debitNotes = $this->paginate($this->DebitNotes->find()->where($where));	
		}
		
        $this->set(compact('debitNotes','search','voucher_no'));
        $this->set('_serialize', ['debitNotes']);
    }

    /**
     * View method
     *
     * @param string|null $id Debit Note id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
	    $company_id=1;
		$debitNotes = $this->DebitNotes->get($id, [
            'contain' => ['DebitNoteRows'=>['ReferenceDetails', 'Ledgers']]
        ]);
        
        $this->set(compact('debitNotes'));
        $this->set('_serialize', ['debitNotes']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $debitNote = $this->DebitNotes->newEntity();
		$company_id='1';
		$financialYear_id=$this->activeFinancialYear();
        if ($this->request->is('post')) {

		$debitNote = $this->DebitNotes->patchEntity($debitNote, $this->request->getData(),['associated' => ['DebitNoteRows','DebitNoteRows.ReferenceDetails']]);
		$tdate=$this->request->data('transaction_date');
		$debitNote->transaction_date=date('Y-m-d',strtotime($tdate));
		$debitNote->financial_year_id =$financialYear_id;
		//transaction date for debit note code start here--
			foreach($debitNote->debit_note_rows as $debit_note_row)
			{
				if(!empty($debit_note_row->reference_details))
				{
					foreach($debit_note_row->reference_details as $reference_detail)
					{
						$reference_detail->transaction_date = $debitNote->transaction_date;
					}
				}
			}
			//pr($debitNote);exit;
		//transaction date for debit note code close here--

		if ($this->DebitNotes->save($debitNote)) {
			
			foreach($debitNote->debit_note_rows as $debit_note_row)
				{
					$accountEntry = $this->DebitNotes->AccountingEntries->newEntity();
					$accountEntry->ledger_id                  = $debit_note_row->ledger_id;
					$accountEntry->debit                      = @$debit_note_row->debit;
					$accountEntry->credit                     = @$debit_note_row->credit;
					$accountEntry->transaction_date           = $debitNote->transaction_date;
					$accountEntry->company_id                 = $company_id;
					$accountEntry->debit_note_id                 = $debitNote->id;
					$accountEntry->debit_note_row_id             = $debit_note_row->id;
					$this->DebitNotes->AccountingEntries->save($accountEntry);
				}
			
                $this->Flash->success(__('The Debit Note Note has been saved.'));
                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('The Debit Note Note could not be saved. Please, try again.'));
        }
		$Voucher_no = $this->DebitNotes->find()->select(['voucher_no'])->where(['company_id'=>$company_id,'financial_year_id'=>$financialYear_id])->order(['voucher_no' => 'DESC'])->first();
		if($Voucher_no)
		{
			$voucher_no=$Voucher_no->voucher_no+1;
		}
		else
		{
			$voucher_no=1;
		}
		
		// frst row bank group
		$bankParentGroups = $this->DebitNotes->DebitNoteRows->Ledgers->AccountingGroups->find()
						->where(['AccountingGroups.company_id'=>$company_id, 'AccountingGroups.bank'=>'1']);
						
		$bankGroups=[];
		
		foreach($bankParentGroups as $bankParentGroup)
		{
			$accountingGroups = $this->DebitNotes->DebitNoteRows->Ledgers->AccountingGroups
			->find('children', ['for' => $bankParentGroup->id])->toArray();
			$bankGroups[]=$bankParentGroup->id;
			foreach($accountingGroups as $accountingGroup){
				$bankGroups[]=$accountingGroup->id;
			}
		}
		
		//cash-in-hand group
		$cashParentGroups = $this->DebitNotes->DebitNoteRows->Ledgers->AccountingGroups->find()
						->where(['AccountingGroups.company_id'=>$company_id, 'AccountingGroups.cash'=>'1']);
						
		$cashGroups=[];
		
		foreach($cashParentGroups as $cashParentGroup)
		{
			$cashChildGroups = $this->DebitNotes->DebitNoteRows->Ledgers->AccountingGroups
			->find('children', ['for' => $cashParentGroup->id])->toArray();
			$cashGroups[]=$cashParentGroup->id;
			foreach($cashChildGroups as $cashChildGroup){
				$cashGroups[]=$cashChildGroup->id;
			}
		}
		
		$partyParentGroups = $this->DebitNotes->DebitNoteRows->Ledgers->AccountingGroups->find()
							->where(['AccountingGroups.company_id'=>$company_id, 'AccountingGroups.debit_note_first_row'=>1]);

		$partyGroups=[];
		
		foreach($partyParentGroups as $partyParentGroup)
		{
			
			$partyChildGroups = $this->DebitNotes->DebitNoteRows->Ledgers->AccountingGroups->find('children', ['for' => $partyParentGroup->id]);
			$partyGroups[]=$partyParentGroup->id;
			foreach($partyChildGroups as $partyChildGroup){
				$partyGroups[]=$partyChildGroup->id;
			}
		}
	
	
		$partyLedgers = $this->DebitNotes->DebitNoteRows->Ledgers->find()
		->where(['Ledgers.accounting_group_id IN' =>$partyGroups,'Ledgers.company_id'=>$company_id]);
		
	
		//$ledgers = $this->Payments->PaymentRows->Ledgers->find()->where(['company_id'=>$company_id]);
		foreach($partyLedgers as $ledger){
			if(in_array($ledger->accounting_group_id,$bankGroups)){
				$ledgerFirstOptions[]=['text' =>$ledger->name, 'value' => $ledger->id ,'open_window' => 'bank','bank_and_cash' => 'yes'];
			}
			else if($ledger->bill_to_bill_accounting == 'yes'){
				$ledgerFirstOptions[]=['text' =>$ledger->name, 'value' => $ledger->id,'open_window' => 'party','bank_and_cash' => 'no','default_days' => $ledger->default_credit_days];
			}
			else if(in_array($ledger->accounting_group_id,$cashGroups)){
				$ledgerFirstOptions[]=['text' =>$ledger->name, 'value' => $ledger->id ,'open_window' => 'no','bank_and_cash' => 'yes'];
			}
			else{
				$ledgerFirstOptions[]=['text' =>$ledger->name, 'value' => $ledger->id,'open_window' => 'no','bank_and_cash' => 'no' ];
			}
		}
		
		
		//2nd bank group
		$bankParentGroups = $this->DebitNotes->DebitNoteRows->Ledgers->AccountingGroups->find()
						->where(['AccountingGroups.company_id'=>$company_id, 'AccountingGroups.bank'=>'1']);
						
		$bankGroups=[];
		
		foreach($bankParentGroups as $bankParentGroup)
		{
			$accountingGroups = $this->DebitNotes->DebitNoteRows->Ledgers->AccountingGroups
			->find('children', ['for' => $bankParentGroup->id])->toArray();
			$bankGroups[]=$bankParentGroup->id;
			foreach($accountingGroups as $accountingGroup){
				$bankGroups[]=$accountingGroup->id;
			}
		}
		
		//cash-in-hand group
		$cashParentGroups = $this->DebitNotes->DebitNoteRows->Ledgers->AccountingGroups->find()
						->where(['AccountingGroups.company_id'=>$company_id, 'AccountingGroups.cash'=>'1']);
						
		$cashGroups=[];
		
		foreach($cashParentGroups as $cashParentGroup)
		{
			$cashChildGroups = $this->DebitNotes->DebitNoteRows->Ledgers->AccountingGroups
			->find('children', ['for' => $cashParentGroup->id])->toArray();
			$cashGroups[]=$cashParentGroup->id;
			foreach($cashChildGroups as $cashChildGroup){
				$cashGroups[]=$cashChildGroup->id;
			}
		}
		
		$partyParentGroups = $this->DebitNotes->DebitNoteRows->Ledgers->AccountingGroups->find()
							->where(['AccountingGroups.company_id'=>$company_id, 'AccountingGroups.debit_note_all_row'=>1]);

		$partyGroups=[];
		
		
		foreach($partyParentGroups as $partyParentGroup)
		{
			
			$partyChildGroups = $this->DebitNotes->DebitNoteRows->Ledgers->AccountingGroups->find('children', ['for' => $partyParentGroup->id]);
			$partyGroups[]=$partyParentGroup->id;
			foreach($partyChildGroups as $partyChildGroup){
				$partyGroups[]=$partyChildGroup->id;
			}
		}
	
		$partyLedgers = $this->DebitNotes->DebitNoteRows->Ledgers->find()
		->where(['Ledgers.accounting_group_id IN' =>$partyGroups,'Ledgers.company_id'=>$company_id]);
		
		//$ledgers = $this->Payments->PaymentRows->Ledgers->find()->where(['company_id'=>$company_id]);
		foreach($partyLedgers as $ledger){
			if(in_array($ledger->accounting_group_id,$bankGroups)){
				$ledgerOptions[]=['text' =>$ledger->name, 'value' => $ledger->id ,'open_window' => 'bank','bank_and_cash' => 'yes'];
			}
			else if($ledger->bill_to_bill_accounting == 'yes'){
				$ledgerOptions[]=['text' =>$ledger->name, 'value' => $ledger->id,'open_window' => 'party','bank_and_cash' => 'no','default_days' => $ledger->default_credit_days];
			}
			else if(in_array($ledger->accounting_group_id,$cashGroups)){
				$ledgerOptions[]=['text' =>$ledger->name, 'value' => $ledger->id ,'open_window' => 'no','bank_and_cash' => 'yes'];
			}
			else{
				$ledgerOptions[]=['text' =>$ledger->name, 'value' => $ledger->id,'open_window' => 'no','bank_and_cash' => 'no' ];
			}
		}
		
		
		
		$referenceDetails=$this->DebitNotes->DebitNoteRows->ReferenceDetails->find('list');
        //$companies = $this->DebitNotes->Companies->find('list', ['limit' => 200]);
        $this->set(compact('debitNote', 'companies','voucher_no','ledgerOptions','company_id','referenceDetails','ledgerFirstOptions'));
        $this->set('_serialize', ['debitNote']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Debit Note id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $debitNote = $this->DebitNotes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $debitNote = $this->DebitNotes->patchEntity($debitNote, $this->request->getData());
            if ($this->DebitNotes->save($debitNote)) {
                $this->Flash->success(__('The debit note has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The debit note could not be saved. Please, try again.'));
        }
        $financialYears = $this->DebitNotes->FinancialYears->find('list', ['limit' => 200]);
        $companies = $this->DebitNotes->Companies->find('list', ['limit' => 200]);
        $this->set(compact('debitNote', 'financialYears', 'companies'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Debit Note id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $debitNote = $this->DebitNotes->get($id);
        if ($this->DebitNotes->delete($debitNote)) {
            $this->Flash->success(__('The debit note has been deleted.'));
        } else {
            $this->Flash->error(__('The debit note could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
