<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Ledgers Controller
 *
 * @property \App\Model\Table\LedgersTable $Ledgers
 *
 * @method \App\Model\Entity\Ledger[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LedgersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['AccountingGroups', 'Companies', 'Suppliers', 'Customers', 'GstFigures']
        ];
        $ledgers = $this->paginate($this->Ledgers);

        $this->set(compact('ledgers'));
    }

	function checkBillToBillAccountingStatus($received_from_id){
		$Ledger=$this->Ledgers->get($received_from_id);
		echo $Ledger->bill_to_bill_accounting;
		exit;
	}
	
	public function overDueReport()
	{
		$company_id=1;
	
		$status=$this->request->query('status'); 
		if(!empty($status)){ 
			$this->viewBuilder()->layout('');	
		}
		
		$run_time_dates =date('d-m-Y');;
		$url=$this->request->here();
		$url=parse_url($url,PHP_URL_QUERY);
		$run_time_date = $this->request->query('run_time_date');
		
		if(!empty($run_time_date)) {
		$run_time_date = date("Y-m-d",strtotime($run_time_date)); }
	
		$parentSundryDebtors = $this->Ledgers->AccountingGroups->find()
				->where(['AccountingGroups.company_id'=>$company_id, 'AccountingGroups.customer'=>'1']);
		
		$childSundryDebtors=[];
		
		foreach($parentSundryDebtors as $parentSundryDebtor)
		{
			$accountingGroups = $this->Ledgers->AccountingGroups->find('children', ['for' => $parentSundryDebtor->id]);
			$childSundryDebtors[]=$parentSundryDebtor->id;
			foreach($accountingGroups as $accountingGroup){
				$childSundryDebtors[]=$accountingGroup->id;
			}			
		}
		
		$ledgerAccounts = $this->Ledgers->find()->where(['accounting_group_id IN'=>$childSundryDebtors]);
		
		$ledgerAccountids = [];

		foreach($ledgerAccounts as $ledgerAccount)
		{
			$ledgerAccountids[]=$ledgerAccount->id;
		}
		$reference_details = $this->Ledgers->AccountingEntries->find()->contain(['Ledgers'=>['Customers']])->where(['AccountingEntries.company_id'=>$company_id]);
		$reference_details->select(['total_debit' => $reference_details->func()->sum('AccountingEntries.debit'),'total_credit' => $reference_details->func()->sum('AccountingEntries.credit')])
		->where(['AccountingEntries.ledger_id IN '=> $ledgerAccountids,'AccountingEntries.transaction_date <=' => $run_time_date])
		->group(['AccountingEntries.ledger_id'])
		->order(['Ledgers.name'=>'ASC'])
		->autoFields(true);		 
		//$companies=$this->Ledgers->ReferenceDetails->Companies->find()->contain(['States'])->where(['Companies.id'=>$company_id])->first();
		
		/*$reference_details = $this->Ledgers->ReferenceDetails->find()->contain(['Ledgers'])->where(['ReferenceDetails.company_id'=>$company_id]);
		$reference_details->select(['total_debit' => $reference_details->func()->sum('ReferenceDetails.debit'),'total_credit' => $reference_details->func()->sum('ReferenceDetails.credit')])
		->where(['ReferenceDetails.ledger_id IN '=> $ledgerAccountids,'ReferenceDetails.transaction_date <=' => $run_time_date])
		->group(['ReferenceDetails.ledger_id'])
		->autoFields(true);		 
		$companies=$this->Ledgers->ReferenceDetails->Companies->find()->contain(['States'])->where(['Companies.id'=>$company_id])->first();
		*/
			//pr($reference_details->toArray()); exit;
		
		$this->set(compact('companies','reference_details','run_time_date','url','status','run_time_dates'));
        $this->set('_serialize', ['reference_details']);
		
	/* 	$reference_details = $this->Ledgers->ReferenceDetails->find()
		->contain(['SalesInvoices'])
		->where(['ReferenceDetails.ledger_id IN'=>$ledgerAccountids]); */
		
		/*
		$reference_details=$reference_details->leftJoinWith('SalesInvoices', function ($q) use($run_time_date){
		return $q->orWhere(['SalesInvoices.transaction_date <=' => $run_time_date]);
		});
		
		$reference_details->leftJoinWith('Receipts', function ($q) use($run_time_date){
		return $q->orWhere(['Receipts.transaction_date <=' => $run_time_date]);
		});
		
		$reference_details->leftJoinWith('Payments', function ($q) use($run_time_date){
		return $q->orWhere(['Payments.transaction_date <=' => $run_time_date]);
		});
		*/
		
		
	}
	
	
	public function overDueReportPayable()
	{
		$company_id=1;
	//	$this->viewBuilder()->layout('index_layout');
		$run_time_date = $this->request->query('run_time_date');
		$status=$this->request->query('status'); 
		 $run_time_dates =date('d-m-Y');
		if(!empty($status)){ 
			$this->viewBuilder()->layout('');	
		}
		$url=$this->request->here();
		$url=parse_url($url,PHP_URL_QUERY);
		if(!empty($run_time_date)) {
		$run_time_date = date("Y-m-d",strtotime($run_time_date)); }
	
		$parentSundryCreditors = $this->Ledgers->AccountingGroups->find()
				->where(['AccountingGroups.company_id'=>$company_id, 'AccountingGroups.supplier'=>'1']);
	
		$childSundryCreditors=[];
		
		foreach($parentSundryCreditors as $parentSundryCreditor)
		{
			$accountingGroups = $this->Ledgers->AccountingGroups->find('children', ['for' => $parentSundryCreditor->id]);
			$childSundryCreditors[]=$parentSundryCreditor->id;
			foreach($accountingGroups as $accountingGroup){
				$childSundryCreditors[]=$accountingGroup->id;
			}			
		}
		
		//pr($childSundryCreditors);exit;
		$ledgerAccounts = $this->Ledgers->find()->where(['accounting_group_id IN'=>$childSundryCreditors]);
		
		$ledgerAccountids = [];

		foreach($ledgerAccounts as $ledgerAccount)
		{
			$ledgerAccountids[]=$ledgerAccount->id;
		} 
		
		$reference_details = $this->Ledgers->AccountingEntries->find()->contain(['Ledgers'=>['Suppliers']])->where(['AccountingEntries.company_id'=>$company_id]);
		
		$reference_details->select(['total_debit' => $reference_details->func()->sum('AccountingEntries.debit'),'total_credit' => $reference_details->func()->sum('AccountingEntries.credit')])
		->where(['AccountingEntries.ledger_id IN '=> $ledgerAccountids,'AccountingEntries.transaction_date <=' => $run_time_date])
		->group(['AccountingEntries.ledger_id'])
		->order(['Ledgers.name'=>'ASC'])
		->autoFields(true);	

//pr($reference_details->toArray());exit;		
	//	$companies=$this->Ledgers->ReferenceDetails->Companies->find()->contain(['States'])->where(['Companies.id'=>$company_id])->first();
		
		
		$this->set(compact('reference_details','run_time_date','url','status','companies','run_time_dates'));
        $this->set('_serialize', ['reference_details']);
		
	}
	
	
	public function accountLedger($id = null)
    {
	   $status = $this->request->query('status');
	   if(!empty($status)){
	        $this->viewBuilder()->setLayout(''); 
	   }
		$url=$this->request->here();
		$url=parse_url($url,PHP_URL_QUERY);
		$company_id        = 1;
		if(!empty($this->request->query('ledger_id'))){
			$ledger_id         = $this->request->query('ledger_id');
		}else{
			$ledger_id         = $this->request->query('ledger-id');
		}
		
		if(!empty($this->request->query('from_date'))){
			$from_date         = $this->request->query('from_date');
		}else{
			$from_date         = $this->request->query('from-date');
		}
		
		
		if(!empty($this->request->query('to_date'))){
			$to_date         = $this->request->query('to_date');
		}else{
			$to_date         = $this->request->query('to-date');
		}
		
		$where =[];
		if(!empty($from_date))
		{
			$from_date = date("Y-m-d",strtotime($from_date));
			$where['AccountingEntries.transaction_date >=']=$from_date;
		}
		if(!empty($to_date))
		{
			$to_date   = date("Y-m-d",strtotime($to_date));
			$where['AccountingEntries.transaction_date <=']=$to_date;
		}
		if(!empty($ledger_id))
		{
			$where['AccountingEntries.ledger_id']=$ledger_id;
		}
		$where['AccountingEntries.company_id']=$company_id;

		if(!empty($ledger_id)){
		$query = $this->Ledgers->AccountingEntries->find();
		$CaseCreditOpeningBalance = $query->newExpr()
					->addCase(
						$query->newExpr()->add(['ledger_id']),
						$query->newExpr()->add(['credit']),
						'decimal'
					);
		$CaseDebitOpeningBalance = $query->newExpr()
					->addCase(
						$query->newExpr()->add(['ledger_id']),
						$query->newExpr()->add(['debit']),
						'decimal'
					);
		$query->select([
				'debit_opening_balance' => $query->func()->sum($CaseDebitOpeningBalance),
				'credit_opening_balance' => $query->func()->sum($CaseCreditOpeningBalance),
				'id','ledger_id'
			])
			->where(['AccountingEntries.company_id'=>$company_id,'AccountingEntries.transaction_date <'=>$from_date,'AccountingEntries.ledger_id'=>$ledger_id])
			->group('ledger_id')
			->order(['AccountingEntries.transaction_date'=>'ASC'])
			->autoFields(true);
		$AccountLedgersOpeningBalance=($query);
		
		$total_debit=0;
		$total_credit=0;
		foreach($AccountLedgersOpeningBalance as $AccountLedgersOpeningBalance){
			$total_debit=$AccountLedgersOpeningBalance->debit_opening_balance;
			$total_credit=$AccountLedgersOpeningBalance->credit_opening_balance;
		}
		@$opening_balance=$total_debit-$total_credit;
			if($opening_balance>0){
			@$opening_balance_type='Dr';	
			}
			else if($opening_balance<0){
			$opening_balance=abs($opening_balance);
			@$opening_balance_type='Cr';	
			}
			else{
			@$opening_balance_type='';	
			}
		$opening_balance=round($opening_balance,2);
	
		$ledger_Names = $this->Ledgers->get($ledger_id);
		//pr($ledger_Names);exit;
		 $AccountingLedgers=$this->Ledgers->AccountingEntries->find()->select(['total_credit_sum'=>'SUM(AccountingEntries.credit)','total_debit_sum'=>'SUM(AccountingEntries.debit)'])->contain(['Ledgers','Invoices','Payments','CreditNotes','DebitNotes','ContraVouchers','JournalVouchers','Receipts'])->where($where)->group(['AccountingEntries.invoice_id','AccountingEntries.ledger_id','AccountingEntries.payment_id','AccountingEntries.credit_note_id','AccountingEntries.debit_note_id','AccountingEntries.contra_voucher_id','AccountingEntries.receipt_id','AccountingEntries.journal_voucher_id'])
		 ->order(['AccountingEntries.transaction_date'=>'ASC'])
		->autoFields(true); 
		}
		//	pr($AccountingLedgers->toArray());exit;
			/*$AccountingLedgers=$this->Ledgers->AccountingEntries->find()->where(['AccountingEntries.company_id'=>$company_id])->contain(['Ledgers','PurchaseVouchers','SalesInvoices','SaleReturns','Payments','SalesVouchers','Receipts','JournalVouchers','ContraVouchers','CreditNotes','DebitNotes','JournalVouchers','PurchaseInvoices','PurchaseReturns'])->where($where)
		->autoFields(true);
		} */
		//pr($AccountingLedgers->toArray());exit;
		$ledgers = $this->Ledgers->find('list')->where(['company_id'=>$company_id]);
		//$companies=$this->Ledgers->Companies->find()->contain(['States'])->where(['Companies.id'=>$company_id])->first();
		
		$this->set(compact('companies','accountLedger','ledgers','opening_balance_type','opening_balance','openingBalance_credit1','closingBalance_credit1','AccountingLedgers','from_date','to_date','voucher_type','voucher_no','ledger_id','url','status','Ledgers','ledger_Names'));
        $this->set('_serialize', ['ledger','ledger_Names']);
    }
	
    /**
     * View method
     *
     * @param string|null $id Ledger id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ledger = $this->Ledgers->get($id, [
            'contain' => ['AccountingGroups', 'Companies', 'Suppliers', 'Customers', 'GstFigures', 'AccountingEntries', 'ReferenceDetails']
        ]);

        $this->set('ledger', $ledger);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ledger = $this->Ledgers->newEntity();
        if ($this->request->is('post')) {
            $ledger = $this->Ledgers->patchEntity($ledger, $this->request->getData());
            if ($this->Ledgers->save($ledger)) {
                $this->Flash->success(__('The ledger has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ledger could not be saved. Please, try again.'));
        }
        $accountingGroups = $this->Ledgers->AccountingGroups->find('list', ['limit' => 200]);
        $companies = $this->Ledgers->Companies->find('list', ['limit' => 200]);
        $suppliers = $this->Ledgers->Suppliers->find('list', ['limit' => 200]);
        $customers = $this->Ledgers->Customers->find('list', ['limit' => 200]);
        $gstFigures = $this->Ledgers->GstFigures->find('list', ['limit' => 200]);
        $this->set(compact('ledger', 'accountingGroups', 'companies', 'suppliers', 'customers', 'gstFigures'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Ledger id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ledger = $this->Ledgers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ledger = $this->Ledgers->patchEntity($ledger, $this->request->getData());
            if ($this->Ledgers->save($ledger)) {
                $this->Flash->success(__('The ledger has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ledger could not be saved. Please, try again.'));
        }
        $accountingGroups = $this->Ledgers->AccountingGroups->find('list', ['limit' => 200]);
        $companies = $this->Ledgers->Companies->find('list', ['limit' => 200]);
        $suppliers = $this->Ledgers->Suppliers->find('list', ['limit' => 200]);
        $customers = $this->Ledgers->Customers->find('list', ['limit' => 200]);
        $gstFigures = $this->Ledgers->GstFigures->find('list', ['limit' => 200]);
        $this->set(compact('ledger', 'accountingGroups', 'companies', 'suppliers', 'customers', 'gstFigures'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ledger id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ledger = $this->Ledgers->get($id);
        if ($this->Ledgers->delete($ledger)) {
            $this->Flash->success(__('The ledger has been deleted.'));
        } else {
            $this->Flash->error(__('The ledger could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
