<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Employees Controller
 *
 * @property \App\Model\Table\EmployeesTable $Employees
 *
 * @method \App\Model\Entity\Employee[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EmployeesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index($type = null)
    {   $RecordShow = 0;
        $where=array();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $where['Employees.is_deleted']=0;
            foreach ($this->request->getData() as $key => $value) {
                if(!empty($value))
                { 
                    if (strpos($key, 'name') !== false)
                    {
                        $where['Employees.'.$key.' LIKE '] = '%'.$value.'%';
                    }
                    else{
                        $where['Employees.'.$key.' LIKE '] = '%'.$value.'%';
                    }
                }
            }
            //pr($SuppliersList->toArray());exit();
            $RecordShow=1;
        }
        if($type == 'edt'){ $displayName = 'Edit';}
        if($type == 'del'){ $displayName = 'Delete';}
        if($type == 'ser'){ $displayName = 'Search';}
        
        $employees = $this->paginate($this->Employees);
        $EmployeeList  = $this->Employees->find()->where($where);
        

        $this->set(compact('employees','type','RecordShow','displayName','EmployeeList'));
    }

    /**
     * View method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $employee = $this->Employees->get($id, [
            'contain' => []
        ]);

        $this->set('employee', $employee);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $employee = $this->Employees->newEntity();
        if ($this->request->is('post')) {
            $employee = $this->Employees->patchEntity($employee, $this->request->getData());

            $dob = $this->request->getData('dob');
            if (!empty($dob_leave)) {
                $employee->dob = date('y-m-d',strtotime($this->request->getData('dob_leave')));
            }
            else
            {
            
                $employee->dob = '0000-00-00';
            }
            $driver_doj = $this->request->getData('driver_doj');
            if (!empty($driver_doj)) {
                $employee->dob = date('y-m-d',strtotime($this->request->getData('driver_doj')));
            }
            else
            {
            
                $employee->driver_doj = '0000-00-00';
            }
            $lic_issue_date = $this->request->getData('lic_issue_date');
            if (!empty($lic_issue_date)) {
                $employee->lic_issue_date = date('y-m-d',strtotime($this->request->getData('lic_issue_date')));
            }
            else
            {
            
                $employee->lic_issue_date = '0000-00-00';
            }

            $lic_exp_date = $this->request->getData('lic_exp_date');
            if (!empty($lic_exp_date)) {
                $employee->lic_exp_date = date('y-m-d',strtotime($this->request->getData('lic_exp_date')));
            }
            else
            {
            
                $employee->lic_exp_date  = '0000-00-00';
            }
            $dob_leave = $this->request->getData('dob_leave');
            if (!empty($dob_leave)) {
                $employee->dob_leave = date('y-m-d',strtotime($this->request->getData('dob_leave')));
            }
            else
            {
            
                $employee->dob_leave = '0000-00-00';
            }

           // pr($employee); die();
            if ($this->Employees->save($employee)) {
                $this->Flash->success(__('The employee has been saved.'));

                $company_id=1;
                $ledgers = $this->Employees->Ledgers->newEntity();
                $this->request->data['accounting_group_id'] = 31; // Staff Ac
                $this->request->data['company_id'] = $company_id; 
                $this->request->data['employee_id'] = $employee->id; 
                $ledgers = $this->Employees->Ledgers->patchEntity($ledgers, $this->request->getData());
                $this->Employees->Ledgers->save($ledgers); 

                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('The employee could not be saved. Please, try again.'));
        }
        $this->set(compact('employee'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $employee = $this->Employees->get($id, [
            'contain' => []
        ]);


        if ($this->request->is(['patch', 'post', 'put'])) {
            $employee = $this->Employees->patchEntity($employee, $this->request->getData());
            $dob = $this->request->getData('dob');
            if (!empty($dob_leave)) {
                $employee->dob = date('y-m-d',strtotime($this->request->getData('dob_leave')));
            }
            else
            {
            
                $employee->dob = '0000-00-00';
            }
            $driver_doj = $this->request->getData('driver_doj');
            if (!empty($driver_doj)) {
                $employee->dob = date('y-m-d',strtotime($this->request->getData('driver_doj')));
            }
            else
            {
            
                $employee->driver_doj = '0000-00-00';
            }
            $lic_issue_date = $this->request->getData('lic_issue_date');
            if (!empty($lic_issue_date)) {
                $employee->lic_issue_date = date('y-m-d',strtotime($this->request->getData('lic_issue_date')));
            }
            else
            {
            
                $employee->lic_issue_date = '0000-00-00';
            }

            $lic_exp_date = $this->request->getData('lic_exp_date');
            if (!empty($lic_exp_date)) {
                $employee->lic_exp_date = date('y-m-d',strtotime($this->request->getData('lic_exp_date')));
            }
            else
            {
            
                $employee->lic_exp_date  = '0000-00-00';
            }
            $dob_leave = $this->request->getData('dob_leave');
            if (!empty($dob_leave)) {
                $employee->dob_leave = date('y-m-d',strtotime($this->request->getData('dob_leave')));
            }
            else
            {
            
                $employee->dob_leave = '0000-00-00';
            }
            
            if ($this->Employees->save($employee)) {
                $query = $this->Employees->Ledgers->query(); 
                $query->update()->set(['name'=>$this->request->getData('name')])
                    ->where(['employee_id' => $id])
                    ->execute();

                /*$company_id=1;
                $ledgers = $this->Employees->Ledgers->newEntity();
                $this->request->data['accounting_group_id'] = 31; // Staff Ac
                $this->request->data['company_id'] = $company_id; 
                $this->request->data['employee_id'] = $employee->id; 
                $ledgers = $this->Employees->Ledgers->patchEntity($ledgers, $this->request->getData());
                $this->Employees->Ledgers->save($ledgers); */

                $this->Flash->success(__('The employee has been saved.'));

                return $this->redirect(['action' => 'index','edt']);
            }
            $this->Flash->error(__('The employee could not be saved. Please, try again.'));
        }
        $this->set(compact('employee'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $employee = $this->Employees->get($id);
        $employee->is_deleted = 1;
        if ($this->Employees->save($employee)) {
            $this->Flash->success(__('The employee has been deleted.'));
        } else {
            $this->Flash->error(__('The employee could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index','del']);
    }


    public function ajaxAutocompleted(){
        $name=$this->request->getData('input'); 
        $searchType=$this->request->getData('searchType');
        if($searchType == 'employee_name'){
            $employee=$this->Employees->find()->where(['Employees.name Like'=>''.$name.'%','Employees.is_deleted'=>0]);
            ?>
                <ul id="country-list">
                    <?php foreach($employee as $show){ ?>
                        <li onClick="selectAutoCompleted('<?php echo $show->name;?>')">
                            <?php echo $show->name?>
                        </li>
                    <?php } ?>
                </ul>
            <?php
        }
        else
        {
            $employee=$this->Employees->find()->where(['Employees.mobile_no Like'=>''.$name.'%','Employees.is_deleted'=>0]);
            ?>
                <ul id="country-list">
                    <?php foreach($employee as $show){ ?>
                        <li onClick="selectAutoCompleted1('<?php echo $show->mobile_no;?>')">
                            <?php echo $show->mobile_no?>
                        </li>
                    <?php } ?>
                </ul>
            <?php
        }
        
        exit;  
    }
}
