<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Logins Controller
 *
 * @property \App\Model\Table\LoginsTable $Logins
 *
 * @method \App\Model\Entity\Login[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LoginsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        // Add the 'add' action to the allowed actions list.
        $this->Auth->allow(['logout']);
    }
    public function login()
    {
        $this->viewBuilder()->setLayout(''); 
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $counterId = $this->request->getData('counter_id');
                $loginCounterId = $user['counter_id'];
                if($loginCounterId == $counterId){
                    $this->Auth->setUser($user); 
                    return $this->redirect(['controller'=>'Logins','action' => 'index']);
                }
                else{
                    $this->Flash->error('Your counter is incorrect.');
                }
            }
            else{
                $this->Flash->error('Your username or password is incorrect.');
            }
        }
        $counterList = $this->Logins->Counters->find('list', ['limit' => 200]);
        $this->set(compact('counterList'));
    }
    public function logout()
    {
        $this->Flash->success('You are now logged out.');
        return $this->redirect($this->Auth->logout());
    }
    public function index()
    {
        $where =array();
        $where['DutySlips.waveoff_status']=0;
        $where['DutySlips.billing_type']='Normal Billing';
        $where['DutySlips.closing_km']=0; 
        $opendsCount = $this->Logins->DutySlips->find()->where($where)->count(); 
 
        $where =array();
        $where['DutySlips.waveoff_status']=0;
        $where['DutySlips.billing_status']='no';
        $unBilledds = $this->Logins->DutySlips->find()->where($where)->count();
        
        $this->set(compact('opendsCount', 'unBilledds'));
    }

    /**
     * View method
     *
     * @param string|null $id Login id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view()
    {$this->viewBuilder()->setLayout(''); 
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $login = $this->Logins->newEntity();
        if ($this->request->is('post')) {
            $login = $this->Logins->patchEntity($login, $this->request->getData());
            if ($this->Logins->save($login)) {
                $this->Flash->success(__('The login has been saved.'));

                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('The login could not be saved. Please, try again.'));
        }
        $counters = $this->Logins->Counters->find('list', ['limit' => 200]);
        $this->set(compact('login', 'counters'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Login id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $login = $this->Logins->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $login = $this->Logins->patchEntity($login, $this->request->getData());
            if ($this->Logins->save($login)) {
                $this->Flash->success(__('The login has been saved.'));

                return $this->redirect(['action' => 'LoginView']);
            }
            $this->Flash->error(__('The login could not be saved. Please, try again.'));
        }
        $counters = $this->Logins->Counters->find('list', ['limit' => 200]);
        $this->set(compact('login', 'counters'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Login id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $login = $this->Logins->get($id);
        $login->is_deleted = 1;
        if ($this->Logins->save($login)) {
            $this->Flash->success(__('The login has been deleted.'));
        } else {
            $this->Flash->error(__('The login could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'LoginView']);
    }


    public function LoginView()
    {   
        $page_no = 0;
        $where['Logins.is_deleted']=0;
       
        $loginList = $this->Logins->find()->contain(['Counters'])->where($where);
        
        $this->set(compact('loginList','page_no'));
    }
}
