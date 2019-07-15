<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DebitNoteRows Controller
 *
 * @property \App\Model\Table\DebitNoteRowsTable $DebitNoteRows
 *
 * @method \App\Model\Entity\DebitNoteRow[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DebitNoteRowsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['DebitNotes', 'Ledgers']
        ];
        $debitNoteRows = $this->paginate($this->DebitNoteRows);

        $this->set(compact('debitNoteRows'));
    }

    /**
     * View method
     *
     * @param string|null $id Debit Note Row id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $debitNoteRow = $this->DebitNoteRows->get($id, [
            'contain' => ['DebitNotes', 'Ledgers']
        ]);

        $this->set('debitNoteRow', $debitNoteRow);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $debitNoteRow = $this->DebitNoteRows->newEntity();
        if ($this->request->is('post')) {
            $debitNoteRow = $this->DebitNoteRows->patchEntity($debitNoteRow, $this->request->getData());
            if ($this->DebitNoteRows->save($debitNoteRow)) {
                $this->Flash->success(__('The debit note row has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The debit note row could not be saved. Please, try again.'));
        }
        $debitNotes = $this->DebitNoteRows->DebitNotes->find('list', ['limit' => 200]);
        $ledgers = $this->DebitNoteRows->Ledgers->find('list', ['limit' => 200]);
        $this->set(compact('debitNoteRow', 'debitNotes', 'ledgers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Debit Note Row id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $debitNoteRow = $this->DebitNoteRows->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $debitNoteRow = $this->DebitNoteRows->patchEntity($debitNoteRow, $this->request->getData());
            if ($this->DebitNoteRows->save($debitNoteRow)) {
                $this->Flash->success(__('The debit note row has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The debit note row could not be saved. Please, try again.'));
        }
        $debitNotes = $this->DebitNoteRows->DebitNotes->find('list', ['limit' => 200]);
        $ledgers = $this->DebitNoteRows->Ledgers->find('list', ['limit' => 200]);
        $this->set(compact('debitNoteRow', 'debitNotes', 'ledgers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Debit Note Row id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $debitNoteRow = $this->DebitNoteRows->get($id);
        if ($this->DebitNoteRows->delete($debitNoteRow)) {
            $this->Flash->success(__('The debit note row has been deleted.'));
        } else {
            $this->Flash->error(__('The debit note row could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
