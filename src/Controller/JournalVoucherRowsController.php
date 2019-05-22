<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * JournalVoucherRows Controller
 *
 * @property \App\Model\Table\JournalVoucherRowsTable $JournalVoucherRows
 *
 * @method \App\Model\Entity\JournalVoucherRow[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class JournalVoucherRowsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['JournalVouchers', 'Ledgers']
        ];
        $journalVoucherRows = $this->paginate($this->JournalVoucherRows);

        $this->set(compact('journalVoucherRows'));
    }

    /**
     * View method
     *
     * @param string|null $id Journal Voucher Row id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $journalVoucherRow = $this->JournalVoucherRows->get($id, [
            'contain' => ['JournalVouchers', 'Ledgers', 'AccountingEntries', 'ReferenceDetails']
        ]);

        $this->set('journalVoucherRow', $journalVoucherRow);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $journalVoucherRow = $this->JournalVoucherRows->newEntity();
        if ($this->request->is('post')) {
            $journalVoucherRow = $this->JournalVoucherRows->patchEntity($journalVoucherRow, $this->request->getData());
            if ($this->JournalVoucherRows->save($journalVoucherRow)) {
                $this->Flash->success(__('The journal voucher row has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The journal voucher row could not be saved. Please, try again.'));
        }
        $journalVouchers = $this->JournalVoucherRows->JournalVouchers->find('list', ['limit' => 200]);
        $ledgers = $this->JournalVoucherRows->Ledgers->find('list', ['limit' => 200]);
        $this->set(compact('journalVoucherRow', 'journalVouchers', 'ledgers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Journal Voucher Row id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $journalVoucherRow = $this->JournalVoucherRows->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $journalVoucherRow = $this->JournalVoucherRows->patchEntity($journalVoucherRow, $this->request->getData());
            if ($this->JournalVoucherRows->save($journalVoucherRow)) {
                $this->Flash->success(__('The journal voucher row has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The journal voucher row could not be saved. Please, try again.'));
        }
        $journalVouchers = $this->JournalVoucherRows->JournalVouchers->find('list', ['limit' => 200]);
        $ledgers = $this->JournalVoucherRows->Ledgers->find('list', ['limit' => 200]);
        $this->set(compact('journalVoucherRow', 'journalVouchers', 'ledgers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Journal Voucher Row id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $journalVoucherRow = $this->JournalVoucherRows->get($id);
        if ($this->JournalVoucherRows->delete($journalVoucherRow)) {
            $this->Flash->success(__('The journal voucher row has been deleted.'));
        } else {
            $this->Flash->error(__('The journal voucher row could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
