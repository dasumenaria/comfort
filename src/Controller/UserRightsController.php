<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UserRights Controller
 *
 * @property \App\Model\Table\UserRightsTable $UserRights
 *
 * @method \App\Model\Entity\UserRight[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UserRightsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Logins']
        ];
        $userRights = $this->paginate($this->UserRights);

        $this->set(compact('userRights'));
    }

    /**
     * View method
     *
     * @param string|null $id User Right id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userRight = $this->UserRights->get($id, [
            'contain' => ['Logins']
        ]);

        $this->set('userRight', $userRight);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userRight = $this->UserRights->newEntity();
        
        $logins = $this->UserRights->Logins->find('list', ['limit' => 200]);
        $this->set(compact('userRight', 'logins'));
    }
    public function employeeUserRight()
    {
        
        $employee_id=$this->request->getData('login_id');
        $menus =  $this->UserRights->Menus->find('threaded');
        $employee =  $this->UserRights->Logins->get($employee_id); 
        $this->set(compact('menus'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User Right id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userRight = $this->UserRights->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userRight = $this->UserRights->patchEntity($userRight, $this->request->getData());
            if ($this->UserRights->save($userRight)) {
                $this->Flash->success(__('The user right has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user right could not be saved. Please, try again.'));
        }
        $logins = $this->UserRights->Logins->find('list', ['limit' => 200]);
        $this->set(compact('userRight', 'logins'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User Right id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userRight = $this->UserRights->get($id);
        if ($this->UserRights->delete($userRight)) {
            $this->Flash->success(__('The user right has been deleted.'));
        } else {
            $this->Flash->error(__('The user right could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function addEmployeeRights()
    {
       
        if ($this->request->is('post')) {
            
            $employee_id=$this->request->getData('login_id');
            $userRights = $this->UserRights->find()->where(['login_id'=>$employee_id])->first();
            if($userRights->id)
            {
                $userRight = $this->UserRights->get($userRights->id);
            }
            else
            {
                $userRight = $this->UserRights->newEntity();
            }
            
           
            $userRight = $this->UserRights->patchEntity($userRight, $this->request->getData());
            if(!empty($this->request->getData('menu_id')))
            {
                $userRight->menu_ids=implode(',',$this->request->getData('menu_id'));
            }
            else
            {
                $userRight->menu_ids='';
            }
            if ($this->UserRights->save($userRight)) {
                $this->Flash->success(__('The user right has been saved.'));

                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('The user right could not be saved. Please, try again.'));
        }
    }
}
