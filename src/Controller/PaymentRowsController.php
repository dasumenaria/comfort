<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PaymentRows Controller
 *
 * @property \App\Model\Table\PaymentRowsTable $PaymentRows
 *
 * @method \App\Model\Entity\PaymentRow[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PaymentRowsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Payments', 'Ledgers']
        ];
        $paymentRows = $this->paginate($this->PaymentRows);

        $this->set(compact('paymentRows'));
    }

    /**
     * View method
     *
     * @param string|null $id Payment Row id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $paymentRow = $this->PaymentRows->get($id, [
            'contain' => ['Payments', 'Ledgers', 'AccountingEntries', 'ReferenceDetails']
        ]);

        $this->set('paymentRow', $paymentRow);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $paymentRow = $this->PaymentRows->newEntity();
        if ($this->request->is('post')) {
            $paymentRow = $this->PaymentRows->patchEntity($paymentRow, $this->request->getData());
            if ($this->PaymentRows->save($paymentRow)) {
                $this->Flash->success(__('The payment row has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The payment row could not be saved. Please, try again.'));
        }
        $payments = $this->PaymentRows->Payments->find('list', ['limit' => 200]);
        $ledgers = $this->PaymentRows->Ledgers->find('list', ['limit' => 200]);
        $this->set(compact('paymentRow', 'payments', 'ledgers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Payment Row id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $paymentRow = $this->PaymentRows->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $paymentRow = $this->PaymentRows->patchEntity($paymentRow, $this->request->getData());
            if ($this->PaymentRows->save($paymentRow)) {
                $this->Flash->success(__('The payment row has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The payment row could not be saved. Please, try again.'));
        }
        $payments = $this->PaymentRows->Payments->find('list', ['limit' => 200]);
        $ledgers = $this->PaymentRows->Ledgers->find('list', ['limit' => 200]);
        $this->set(compact('paymentRow', 'payments', 'ledgers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Payment Row id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $paymentRow = $this->PaymentRows->get($id);
        if ($this->PaymentRows->delete($paymentRow)) {
            $this->Flash->success(__('The payment row has been deleted.'));
        } else {
            $this->Flash->error(__('The payment row could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
