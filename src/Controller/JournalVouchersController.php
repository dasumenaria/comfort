<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * JournalVouchers Controller
 *
 * @property \App\Model\Table\JournalVouchersTable $JournalVouchers
 *
 * @method \App\Model\Entity\JournalVoucher[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class JournalVouchersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
		 $financialYear_id = $this->activeFinancialYear();
		$search=$this->request->query('search');
        $voucher_no=$this->request->query('voucher_no');
        $From=$this->request->query('From');
        $To=$this->request->query('To');
        $reference_no=$this->request->query('reference_no');
        
		$this->paginate = [
            'contain' => ['JournalVoucherRows'=>['Ledgers']],
			'limit' => 100
        ];
		if(!empty($voucher_no))
				{
					$where['JournalVouchers.voucher_no']=$voucher_no;
				}
			
		if(!empty($From))
				{
					$From=date("Y-m-d",strtotime($From));
					$where['JournalVouchers.transaction_date >='] = $From;				
				}			 
		
		 if(!empty($To))
				{
					$To=date("Y-m-d",strtotime($To));
					$where['JournalVouchers.transaction_date <='] = $To;				
				}			 
		 if(!empty($reference_no))
			{
					$where['JournalVouchers.reference_no']=$reference_no;
					
			}
			$company_id=1;
			$where['JournalVouchers.company_id']=$company_id;
			$where['JournalVouchers.financial_year_id']=$financialYear_id;
		if(empty($From))
			{
				$From=date("Y-m-d");
				$To=date("Y-m-d");
			
			}
		if($search){
        $journalVouchers = $this->paginate($this->JournalVouchers->find()->where(['JournalVouchers.company_id'=>$company_id,'JournalVouchers.financial_year_id'=>$financialYear_id])->where([
		'OR' => [
            'JournalVouchers.voucher_no' => $search,
            //....
			'JournalVouchers.reference_no LIKE' => '%'.$search.'%',
				//...
			'JournalVouchers.transaction_date ' => date('Y-m-d',strtotime($search))

		 ]]));
		} else {
        $journalVouchers = $this->paginate($this->JournalVouchers->find()->where($where));
		}
        $this->set(compact('journalVouchers','search','voucher_no','reference_no','From','To'));
        $this->set('_serialize', ['journalVouchers']);
    }

    /**
     * View method
     *
     * @param string|null $id Journal Voucher id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $journalVoucher = $this->JournalVouchers->get($id, [
            'contain' => ['JournalVoucherRows'=>['Ledgers','ReferenceDetails']]
        ]);

        $this->set('journalVoucher', $journalVoucher);
        $this->set('_serialize', ['journalVoucher']);
    }
	
	 public function cancel($id = null)
    {
        $JournalVouchers = $this->JournalVouchers->get($id, [
            'contain' => ['JournalVoucherRows'=>['ReferenceDetails']]
        ]);
        $company_id=1;
        $JournalVouchers->status='cancel';
        $journalvoucher_row_ids=[];
        foreach($JournalVouchers->journal_voucher_rows as $journalvoucher_row){
            $journalvoucher_row_ids[]=$journalvoucher_row->id;
        }
        
        if ($this->JournalVouchers->save($JournalVouchers)) {
            $deleteRefDetails = $this->JournalVouchers->JournalVoucherRows->ReferenceDetails->query();
                $deleteRef = $deleteRefDetails->delete()
                    ->where(['ReferenceDetails.journal_voucher_row_id IN' => $journalvoucher_row_ids])
                    ->execute();
                $deleteAccountEntries = $this->JournalVouchers->AccountingEntries->query();
                $result = $deleteAccountEntries->delete()
                ->where(['AccountingEntries.payment_id' => $JournalVouchers->id])
                ->execute();
                
            $this->Flash->success(__('The JournalVouchers has been cancelled.'));
        } else {
            $this->Flash->error(__('The JournalVouchers could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        	
		$company_id=1;
		 $financialYear_id = $this->activeFinancialYear();
        $journalVoucher = $this->JournalVouchers->newEntity();
        if ($this->request->is('post')) {
			$journalVoucher = $this->JournalVouchers->patchEntity($journalVoucher, $this->request->getData());
			$Voucher_no = $this->JournalVouchers->find()->select(['voucher_no'])->where(['company_id'=>$company_id,'financial_year_id'=>$financialYear_id])->order(['voucher_no' => 'DESC'])->first();
			if($Voucher_no)
			{
				$journalVoucher->voucher_no = $Voucher_no->voucher_no+1;
			}
			else
			{
				$journalVoucher->voucher_no = 1;
			} 
			$journalVoucher->company_id            = $company_id;
            
			$journalVoucher = $this->JournalVouchers->patchEntity($journalVoucher, $this->request->getData(), [
							'associated' => ['JournalVoucherRows','JournalVoucherRows.ReferenceDetails']
						]);
			$journalVoucher->transaction_date      = date("Y-m-d",strtotime($journalVoucher->transaction_date));
			$journalVoucher->financial_year_id =$financialYear_id;
			foreach($journalVoucher->journal_voucher_rows as $journal_voucher_row)
			{
				if(!empty($journal_voucher_row->reference_details))
				{
					foreach($journal_voucher_row->reference_details as $reference_detail)
					{
						$reference_detail->transaction_date = $journalVoucher->transaction_date;
					}
				}
			}
            if ($this->JournalVouchers->save($journalVoucher)) 
			{
				foreach($journalVoucher->journal_voucher_rows as $journal_voucher_row)
				{
					$accountEntry = $this->JournalVouchers->AccountingEntries->newEntity();
					$accountEntry->ledger_id                  = $journal_voucher_row->ledger_id;
					$accountEntry->debit                      = $journal_voucher_row->debit;
					$accountEntry->credit                     = $journal_voucher_row->credit;
					$accountEntry->transaction_date           = $journalVoucher->transaction_date;
					$accountEntry->company_id                 = $company_id;
					$accountEntry->journal_voucher_id         = $journalVoucher->id;
					$accountEntry->journal_voucher_row_id     = $journal_voucher_row->id;
					
					$this->JournalVouchers->AccountingEntries->save($accountEntry);
				}
                $this->Flash->success(__('The journal voucher has been saved.'));

                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('The journal voucher could not be saved. Please, try again.'));
        }
		$Voucher_no = $this->JournalVouchers->find()->select(['voucher_no'])->where(['company_id'=>$company_id,'financial_year_id'=>$financialYear_id])->order(['voucher_no' => 'DESC'])->first();
		if($Voucher_no)
		{
			$voucher_no=$Voucher_no->voucher_no+1;
		}
		else
		{
			$voucher_no=1;
		} 
		
		$bankParentGroups = $this->JournalVouchers->JournalVoucherRows->Ledgers->AccountingGroups->find()
						->where(['AccountingGroups.company_id'=>$company_id, 'AccountingGroups.bank'=>'1']);
						
		$bankGroups=[];
		
		foreach($bankParentGroups as $bankParentGroup)
		{
			$accountingGroups = $this->JournalVouchers->JournalVoucherRows->Ledgers->AccountingGroups
			->find('children', ['for' => $bankParentGroup->id])->toArray();
			$bankGroups[]=$bankParentGroup->id;
			foreach($accountingGroups as $accountingGroup){
				$bankGroups[]=$accountingGroup->id;
			}
		}
		
		$accountGroupParents = $this->JournalVouchers->JournalVoucherRows->Ledgers->AccountingGroups->find()->where(['journal_voucher_ledger'=>1,'company_id'=>$company_id]); 
		$CreditGroups=[];
		foreach($accountGroupParents as $accountGroupParent)
		{ 
			$ChildGroups = $this->JournalVouchers->JournalVoucherRows->Ledgers->AccountingGroups->find('children', ['for' =>$accountGroupParent->id])->toArray();
			
			$CreditGroups[]=$accountGroupParent->id;
			foreach($ChildGroups as $ChildGroup)
			{
				$CreditGroups[]=$ChildGroup->id;
			}
		}
		$AllCreditledgers = $this->JournalVouchers->JournalVoucherRows->Ledgers->find()->where(['Ledgers.accounting_group_id IN' =>$CreditGroups]);
		
		$ledgers=[];
		foreach($AllCreditledgers as $AllCreditledger){
		if(in_array($AllCreditledger->accounting_group_id,$bankGroups)){
				$ledgers[]=['text' =>$AllCreditledger->name, 'value' => $AllCreditledger->id ,'open_window' => 'bank'];
			}
			else if($AllCreditledger->bill_to_bill_accounting == 'yes'){
				$ledgers[]=['text' =>$AllCreditledger->name, 'value' => $AllCreditledger->id,'open_window' => 'party','default_days'=>$AllCreditledger->default_credit_days];
			}
			else{
				$ledgers[]=['text' =>$AllCreditledger->name, 'value' => $AllCreditledger->id,'open_window' => 'no' ];
			}
		}
		
        $this->set(compact('journalVoucher', 'company_id','ledgers','voucher_no'));
        $this->set('_serialize', ['journalVoucher']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Journal Voucher id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $journalVoucher = $this->JournalVouchers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $journalVoucher = $this->JournalVouchers->patchEntity($journalVoucher, $this->request->getData());
            if ($this->JournalVouchers->save($journalVoucher)) {
                $this->Flash->success(__('The journal voucher has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The journal voucher could not be saved. Please, try again.'));
        }
        $financialYears = $this->JournalVouchers->FinancialYears->find('list', ['limit' => 200]);
        $companies = $this->JournalVouchers->Companies->find('list', ['limit' => 200]);
        $this->set(compact('journalVoucher', 'financialYears', 'companies'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Journal Voucher id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $journalVoucher = $this->JournalVouchers->get($id);
        if ($this->JournalVouchers->delete($journalVoucher)) {
            $this->Flash->success(__('The journal voucher has been deleted.'));
        } else {
            $this->Flash->error(__('The journal voucher could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
