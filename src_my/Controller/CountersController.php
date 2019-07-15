<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Counters Controller
 *
 * @property \App\Model\Table\CountersTable $Counters
 *
 * @method \App\Model\Entity\Counter[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CountersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index($id = null)
    { 
        if($id){ 
            $counters = $this->Counters->get($id);
        }else{
            $counters = $this->Counters->newEntity();
        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            $counters = $this->Counters->patchEntity($counters, $this->request->data);
            if ($this->Counters->save($counters)) {
                $this->Flash->success(__('The counter has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The counter could not be saved. Please, try again.'));
            }
        }
         $this->paginate = [
            'limit' => 10
        ];
       
            
        $countersList = $this->paginate($this->Counters->find());
        
        $page_no = $this->request->getQuery('page');
        if (empty($page_no)) $page_no = 1;

        $page_no = $page_no-1;
        
        $this->set(compact('counters','countersList','page_no'));     

    }

    public function add()
    {
        $counters = $this->Counters->newEntity();
        if ($this->request->is('post')) {
            $counters = $this->Counters->patchEntity($counters, $this->request->getData());
            if ($this->Counters->save($counters)) {
                $this->Flash->success(__('The counters has been saved.'));

                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('The counters could not be saved. Please, try again.'));
        }
        $this->set(compact('counters'));
    }
    public function edit($id = null)
    {
        $status='';
        if(empty($id)){
            $status='search';
        }
        if(empty($status)){
           $counters = $this->Counters->get($id, [
                'contain' => []
            ]);
            if ($this->request->is(['patch', 'post', 'put'])) {
                $counters = $this->Counters->patchEntity($counters, $this->request->getData());
                if ($this->Counters->save($counters)) {
                    $this->Flash->success(__('The counters has been saved.'));

                    return $this->redirect(['action' => 'edit']);
                }
                $this->Flash->error(__('The counters could not be saved. Please, try again.'));
            } 
        }
        else{
           $counters=''; 
        }
        
        $this->set(compact('counters','status'));
    }
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $id = $this->Counters->get($id);
        $this->request->data['is_deleted']=1;   
         if ($this->request->is(['patch', 'post', 'put'])) {
            $Cities = $this->Counters->patchEntity($id, $this->request->data);
           
            if ($this->Counters->save($Cities)) {
                $this->Flash->error(__('Data has been Deleted'));
                return $this->redirect(['action' => 'index']);
            } 
        }
    } 
}
