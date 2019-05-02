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
                $this->Flash->success(__('The city has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The city could not be saved. Please, try again.'));
            }
        }
            
        $countersList = $this->paginate($this->Counters->find());
        
        $this->set(compact('counters','countersList'));     

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
