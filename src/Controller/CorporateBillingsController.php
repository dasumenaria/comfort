<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CorporateBillings Controller
 *
 * @property \App\Model\Table\CorporateBillingsTable $CorporateBillings
 *
 * @method \App\Model\Entity\CorporateBilling[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CorporateBillingsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Logins', 'Counters', 'WaveoffLogins', 'WaveoffCounters']
        ];
        $corporateBillings = $this->paginate($this->CorporateBillings);

        $this->set(compact('corporateBillings'));
    }

    /**
     * View method
     *
     * @param string|null $id Corporate Billing id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $corporateBilling = $this->CorporateBillings->get($id, [
            'contain' => ['Logins', 'Counters', 'WaveoffLogins', 'WaveoffCounters']
        ]);

        $this->set('corporateBilling', $corporateBilling);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $corporateBilling = $this->CorporateBillings->newEntity();
        if ($this->request->is('post')) {
            $corporateBilling = $this->CorporateBillings->patchEntity($corporateBilling, $this->request->getData());
            if ($this->CorporateBillings->save($corporateBilling)) {
                $this->Flash->success(__('The corporate billing has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The corporate billing could not be saved. Please, try again.'));
        }
        $logins = $this->CorporateBillings->Logins->find('list', ['limit' => 200]);
        $counters = $this->CorporateBillings->Counters->find('list', ['limit' => 200]);
        $this->set(compact('corporateBilling', 'logins', 'counters', 'waveoffLogins', 'waveoffCounters'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Corporate Billing id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $corporateBilling = $this->CorporateBillings->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $corporateBilling = $this->CorporateBillings->patchEntity($corporateBilling, $this->request->getData());
            if ($this->CorporateBillings->save($corporateBilling)) {
                $this->Flash->success(__('The corporate billing has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The corporate billing could not be saved. Please, try again.'));
        }
        $logins = $this->CorporateBillings->Logins->find('list', ['limit' => 200]);
        $counters = $this->CorporateBillings->Counters->find('list', ['limit' => 200]);
        $waveoffLogins = $this->CorporateBillings->WaveoffLogins->find('list', ['limit' => 200]);
        $waveoffCounters = $this->CorporateBillings->WaveoffCounters->find('list', ['limit' => 200]);
        $this->set(compact('corporateBilling', 'logins', 'counters', 'waveoffLogins', 'waveoffCounters'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Corporate Billing id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $corporateBilling = $this->CorporateBillings->get($id);
        if ($this->CorporateBillings->delete($corporateBilling)) {
            $this->Flash->success(__('The corporate billing has been deleted.'));
        } else {
            $this->Flash->error(__('The corporate billing could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
