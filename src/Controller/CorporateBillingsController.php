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
            $service_date = array_filter($this->request->getData('service_date'));
            $service = array_filter($this->request->getData('service'));
            $rate = array_filter($this->request->getData('rate'));
            $no_of_days = array_filter($this->request->getData('no_of_days'));
            $taxi_no = array_filter($this->request->getData('taxi_no'));
            $amount = array_filter($this->request->getData('amount'));
            $x=0;
            $save=0;
             
            foreach($service_date as $val){
                if(!empty($val)){
                    $corporateBilling = $this->CorporateBillings->newEntity();
                    $corporateBilling = $this->CorporateBillings->patchEntity($corporateBilling, $this->request->getData());
                    $corporateBilling->service_date = date('Y-m-d',strtotime($val));
                    $corporateBilling->date = date('Y-m-d',strtotime($this->request->getData('date')));
                    $corporateBilling->invoice_no = 1; 
                    $corporateBilling->service = $service[$x]; 
                    $corporateBilling->customer_id = $this->request->getData('customer_name'); 
                    $corporateBilling->rate = $rate[$x]; 
                    $corporateBilling->no_of_days = $no_of_days[$x]; 
                    $corporateBilling->taxi_no = $taxi_no[$x]; 
                    $corporateBilling->amount = $amount[$x]; 
                    $corporateBilling->login_id = $login_id;
                    $corporateBilling->counter_id = $counter_id;
                    
                    if ($this->CorporateBillings->save($corporateBilling)) { 
                        $save=1;
                    }
                    $x++;
                }
            } 

            if($save == 1){
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
            $corporateBilling = $this->CorporateBillings->patchEntity($corporateBilling, $this->request->getData());
            $service_date = array_filter($this->request->getData('service_date'));
            $service = array_filter($this->request->getData('service'));
            $rate = array_filter($this->request->getData('rate'));
            $no_of_days = array_filter($this->request->getData('no_of_days'));
            $taxi_no = array_filter($this->request->getData('taxi_no'));
            $amount = array_filter($this->request->getData('amount'));
            $x=0;
            $save=0;

            foreach($service_date as $val){
                if(!empty($val)){
                    $corporateBilling = $this->CorporateBillings->newEntity();
                    $corporateBilling = $this->CorporateBillings->patchEntity($corporateBilling, $this->request->getData());
                    $corporateBilling->service_date = date('Y-m-d',strtotime($val));
                    $corporateBilling->date = date('Y-m-d',strtotime($this->request->getData('date')));
                    $corporateBilling->invoice_no = 1; 
                    $corporateBilling->service = $service[$x]; 
                    $corporateBilling->customer_id = $this->request->getData('customer_name'); 
                    $corporateBilling->rate = $rate[$x]; 
                    $corporateBilling->no_of_days = $no_of_days[$x]; 
                    $corporateBilling->taxi_no = $taxi_no[$x]; 
                    $corporateBilling->amount = $amount[$x]; 
                    
                    if ($this->CorporateBillings->save($corporateBilling)) { 
                        $save=1;
                    }
                    $x++;
                }
            } 



            if($save == 1){
                $this->Flash->success(__('The corporate billing has been saved.'));
                return $this->redirect(['action' => 'index','edt']);
            }
            $this->Flash->error(__('The corporate billing could not be saved. Please, try again.'));
        }
        
        $customerList = $this->CorporateBillings->Customers->find('list');
        $this->set(compact('corporateBilling', 'logins', 'counters', 'waveoffLogins', 'waveoffCounters','customerList','CorporateEdit'));
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
