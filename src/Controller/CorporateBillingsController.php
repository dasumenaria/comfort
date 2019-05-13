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
    public function index($type = null)
    {   
        $RecordShow = 0;
        $where=array();
        if ($this->request->is(['patch', 'post', 'put'])) {
            
            foreach ($this->request->getData() as $key => $value) {
                if(!empty($value))
                { 
                    if (strpos($key, 'supplier_type_id') !== false)
                    {
                        $where['Suppliers.'.$key] = $value;
                    }
                    else{
                        $where['Suppliers.'.$key.' LIKE '] = '%'.$value.'%';
                    }
                }

                if(!empty($this->request->getData('deleteDS'))){
                $login_id = $this->Auth->User('id'); 
                $counter_id = $this->Auth->User('counter_id');

                $id = $this->request->getData('dsid');
                $reason = $this->request->getData('reason');
                $query = $this->CorporateBillings->query(); 
                $query->update()->set(['waveoff_reason'=>$reason,'waveoff_status'=>1,'waveoff_login_id'=>$login_id,'waveoff_counter_id'=>$counter_id,])
                    ->where(['id' => $id])
                    ->execute();
                $this->Flash->success(__(' Waveoff Successfully'));
                return $this->redirect(['action' => 'index',$type]);
            }
            }
            $customerLists = $this->CorporateBillings->find()->contain(['Customers']);
            //pr($SuppliersList->toArray());exit();
            $RecordShow=1;
        }
        if($type == 'edt'){ $displayName = 'Edit';}
        if($type == 'del'){ $displayName = 'Delete';}
        if($type == 'ser'){ $displayName = 'Search';}
        
       $customerList = $this->CorporateBillings->Customers->find('list');
      

        $this->set(compact('corporateBillings','RecordShow','displayName','customerList','customerLists','type'));
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
        $login_id = $this->Auth->User('id');
        $counter_id = $this->Auth->User('counter_id'); 
        if ($this->request->is('post')) {
            $corporateBilling = $this->CorporateBillings->patchEntity($corporateBilling, $this->request->getData());
            $corporateBilling->login_id = $login_id;
            $corporateBilling->counter_id = $counter_id;

            $date = $this->request->getData('date');
            
            if (!empty($date)) {
                $corporateBilling->date = date('y-m-d',strtotime($this->request->getData('date')));
            }
            else
            {
            
                $corporateBilling->date = '0000-00-00';
            }

            $service_date = $this->request->getData('service_date');
            if (!empty($service_date)) {
                $corporateBilling->service_date = date('y-m-d',strtotime($this->request->getData('service_date')));
            }
            else
            {
                $corporateBilling->service_date = '0000-00-00';
            }
            
            
            if ($this->CorporateBillings->save($corporateBilling)) {

                $this->Flash->success(__('The corporate billing has been saved.'));

                return $this->redirect(['action' => 'add']);
            }
            
            $this->Flash->error(__('The corporate billing could not be saved. Please, try again.'));
        }
        
        $customerList = $this->CorporateBillings->Customers->find('list');
        $this->set(compact('corporateBilling', 'logins', 'counters', 'waveoffLogins', 'waveoffCounters','customerList'));
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
            $login_id = $this->Auth->User('id');
            $counter_id = $this->Auth->User('counter_id'); 
            $corporateBilling = $this->CorporateBillings->patchEntity($corporateBilling, $this->request->getData());
            $corporateBilling = $this->CorporateBillings->patchEntity($corporateBilling, $this->request->getData());
            $corporateBilling->login_id = $login_id;
            $corporateBilling->counter_id = $counter_id;

            $date = $this->request->getData('date');
            
            if (!empty($date)) {
                $corporateBilling->date = date('y-m-d',strtotime($this->request->getData('date')));
            }
            else
            {
            
                $corporateBilling->date = '0000-00-00';
            }

            $service_date = $this->request->getData('service_date');
            if (!empty($service_date)) {
                $corporateBilling->service_date = date('y-m-d',strtotime($this->request->getData('service_date')));
            }
            else
            {
                $corporateBilling->service_date = '0000-00-00';
            }
            
            
            if ($this->CorporateBillings->save($corporateBilling)) {
                $this->Flash->success(__('The corporate billing has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The corporate billing could not be saved. Please, try again.'));
        }
        $customerList = $this->CorporateBillings->Customers->find('list');
        
        
        $this->set(compact('corporateBilling', 'logins', 'counters', 'waveoffLogins', 'waveoffCounters','customerList'));
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
