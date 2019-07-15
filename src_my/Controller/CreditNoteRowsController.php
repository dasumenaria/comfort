<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CreditNoteRows Controller
 *
 * @property \App\Model\Table\CreditNoteRowsTable $CreditNoteRows
 *
 * @method \App\Model\Entity\CreditNoteRow[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CreditNoteRowsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['CreditNotes', 'Ledgers']
        ];
        $creditNoteRows = $this->paginate($this->CreditNoteRows);

        $this->set(compact('creditNoteRows'));
    }

    /**
     * View method
     *
     * @param string|null $id Credit Note Row id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $creditNoteRow = $this->CreditNoteRows->get($id, [
            'contain' => ['CreditNotes', 'Ledgers']
        ]);

        $this->set('creditNoteRow', $creditNoteRow);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $creditNoteRow = $this->CreditNoteRows->newEntity();
        if ($this->request->is('post')) {
            $creditNoteRow = $this->CreditNoteRows->patchEntity($creditNoteRow, $this->request->getData());
            if ($this->CreditNoteRows->save($creditNoteRow)) {
                $this->Flash->success(__('The credit note row has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The credit note row could not be saved. Please, try again.'));
        }
        $creditNotes = $this->CreditNoteRows->CreditNotes->find('list', ['limit' => 200]);
        $ledgers = $this->CreditNoteRows->Ledgers->find('list', ['limit' => 200]);
        $this->set(compact('creditNoteRow', 'creditNotes', 'ledgers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Credit Note Row id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $creditNoteRow = $this->CreditNoteRows->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $creditNoteRow = $this->CreditNoteRows->patchEntity($creditNoteRow, $this->request->getData());
            if ($this->CreditNoteRows->save($creditNoteRow)) {
                $this->Flash->success(__('The credit note row has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The credit note row could not be saved. Please, try again.'));
        }
        $creditNotes = $this->CreditNoteRows->CreditNotes->find('list', ['limit' => 200]);
        $ledgers = $this->CreditNoteRows->Ledgers->find('list', ['limit' => 200]);
        $this->set(compact('creditNoteRow', 'creditNotes', 'ledgers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Credit Note Row id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $creditNoteRow = $this->CreditNoteRows->get($id);
        if ($this->CreditNoteRows->delete($creditNoteRow)) {
            $this->Flash->success(__('The credit note row has been deleted.'));
        } else {
            $this->Flash->error(__('The credit note row could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
