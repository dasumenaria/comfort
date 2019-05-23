<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Cars Controller
 *
 * @property \App\Model\Table\CarsTable $Cars
 *
 * @method \App\Model\Entity\Car[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CarsController extends AppController
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
            $where['Cars.is_deleted']=0;
            foreach ($this->request->getData() as $key => $value) {
                if(!empty($value))
                { 
                    if (strpos($key, 'car_type_id') !== false)
                    {
                        $where['Cars.'.$key] = $value;
                    }
                    else{
                        $where['Cars.'.$key.' LIKE '] = '%'.$value.'%';
                    }
                }
            }
            //pr($SuppliersList->toArray());exit();
            $RecordShow=1;
        }
        if($type == 'edt'){ $displayName = 'Edit';}
        if($type == 'del'){ $displayName = 'Delete';}
        if($type == 'ser'){ $displayName = 'Search';}
        
        $this->paginate = [
            'contain' => ['CarTypes', 'Suppliers']
        ];
        $carTypes  = $this->Cars->CarTypes->find('list', ['limit' => 200]);
        $suppliers = $this->Cars->Suppliers->find('list', ['limit' => 200]);
        $carsList  = $this->Cars->find()->contain(['Suppliers','CarTypes'])->where($where);
        //pr($carsList->toArray()); die();
        $cars = $this->paginate($this->Cars);

        $this->set(compact('cars','RecordShow','displayName','type','carsList','carTypes','suppliers'));
    }

    /**
     * View method
     *
     * @param string|null $id Car id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $car = $this->Cars->get($id, [
            'contain' => ['CarTypes', 'Suppliers']
        ]);

        $this->set('car', $car);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $car = $this->Cars->newEntity();
        if ($this->request->is('post')) {
            $car = $this->Cars->patchEntity($car, $this->request->getData());
            
            $rto_tax_date = $this->request->getData('rto_tax_date');
            if (!empty($rto_tax_date)) {
                $car->rto_tax_date = date('y-m-d',strtotime($this->request->getData('rto_tax_date')));
            }
            else
            {
            
                $car->rto_tax_date = '0000-00-00';
            }

            $insurance_date_from = $this->request->getData('insurance_date_from');
            if (!empty($insurance_date_from)) {
                $car->insurance_date_from = date('y-m-d',strtotime($this->request->getData('insurance_date_from')));
            }
            else
            {
            
                $car->insurance_date_from = '0000-00-00';
            }
            
            $insurance_date_to = $this->request->getData('insurance_date_to');
            if (!empty($insurance_date_to)) {
                $car->insurance_date_to = date('y-m-d',strtotime($this->request->getData('insurance_date_to')));
            }
            else
            {
            
                $car->insurance_date_to = '0000-00-00';
            }

            $authorization_date = $this->request->getData('authorization_date');
            if (!empty($authorization_date)) {
                $car->authorization_date = date('y-m-d',strtotime($this->request->getData('authorization_date')));
            }
            else
            {
            
                $car->authorization_date = '0000-00-00';
            }
            
            $permit_date = $this->request->getData('permit_date');
            if (!empty($permit_date)) {
                $car->permit_date = date('y-m-d',strtotime($this->request->getData('permit_date')));
            }
            else
            {
            
                $car->permit_date = '0000-00-00';
            }

            $fitness_date = $this->request->getData('fitness_date');
            if (!empty($fitness_date)) {
                $car->fitness_date = date('y-m-d',strtotime($this->request->getData('fitness_date')));
            }
            else
            {
            
                $car->fitness_date = '0000-00-00';
            }

            $puc_date = $this->request->getData('puc_date');
            if (!empty($puc_date)) {
                $car->puc_date = date('y-m-d',strtotime($this->request->getData('puc_date')));
            }
            else
            {
            
                $car->puc_date = '0000-00-00';
            }

            //pr($car); die();
            if ($this->Cars->save($car)) {

                $company_id=1;
                $ledgers = $this->Cars->Ledgers->newEntity();
                $this->request->data['accounting_group_id'] = 14; // Staff Ac
                $this->request->data['company_id'] = $company_id; 
                $this->request->data['car_id'] = $car->id; 
                $ledgers = $this->Cars->Ledgers->patchEntity($ledgers, $this->request->getData());
                $this->Cars->Ledgers->save($ledgers);

                $this->Flash->success(__('The car has been saved.'));

                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('The car could not be saved. Please, try again.'));
        }
        $carTypes = $this->Cars->CarTypes->find('list', ['limit' => 200]);
        $suppliers = $this->Cars->Suppliers->find('list', ['limit' => 200]);
        $this->set(compact('car', 'carTypes', 'suppliers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Car id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $car = $this->Cars->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $car = $this->Cars->patchEntity($car, $this->request->getData());
            $rto_tax_date = $this->request->getData('rto_tax_date');
            if (!empty($rto_tax_date)) {
                $car->rto_tax_date = date('y-m-d',strtotime($this->request->getData('rto_tax_date')));
            }
            else
            {
            
                $car->rto_tax_date = '0000-00-00';
            }

            $insurance_date_from = $this->request->getData('insurance_date_from');
            if (!empty($insurance_date_from)) {
                $car->insurance_date_from = date('y-m-d',strtotime($this->request->getData('insurance_date_from')));
            }
            else
            {
            
                $car->insurance_date_from = '0000-00-00';
            }
            
            $insurance_date_to = $this->request->getData('insurance_date_to');
            if (!empty($insurance_date_to)) {
                $car->insurance_date_to = date('y-m-d',strtotime($this->request->getData('insurance_date_to')));
            }
            else
            {
            
                $car->insurance_date_to = '0000-00-00';
            }

            $authorization_date = $this->request->getData('authorization_date');
            if (!empty($authorization_date)) {
                $car->authorization_date = date('y-m-d',strtotime($this->request->getData('authorization_date')));
            }
            else
            {
            
                $car->authorization_date = '0000-00-00';
            }
            
            $permit_date = $this->request->getData('permit_date');
            if (!empty($permit_date)) {
                $car->permit_date = date('y-m-d',strtotime($this->request->getData('permit_date')));
            }
            else
            {
            
                $car->permit_date = '0000-00-00';
            }

            $fitness_date = $this->request->getData('fitness_date');
            if (!empty($fitness_date)) {
                $car->fitness_date = date('y-m-d',strtotime($this->request->getData('fitness_date')));
            }
            else
            {
            
                $car->fitness_date = '0000-00-00';
            }

            $puc_date = $this->request->getData('puc_date');
            if (!empty($puc_date)) {
                $car->puc_date = date('y-m-d',strtotime($this->request->getData('puc_date')));
            }
            else
            {
            
                $car->puc_date = '0000-00-00';
            }
            if ($this->Cars->save($car)) {

                $query = $this->Cars->Ledgers->query(); 
                $query->update()->set(['name'=>$this->request->getData('name')])
                    ->where(['car_id' => $id])
                    ->execute(); 
                    
                $this->Flash->success(__('The car has been saved.'));

                return $this->redirect(['action' => 'index','edt']);
            }
            $this->Flash->error(__('The car could not be saved. Please, try again.'));
        }
        $carTypes = $this->Cars->CarTypes->find('list', ['limit' => 200]);
        $suppliers = $this->Cars->Suppliers->find('list', ['limit' => 200]);
        $this->set(compact('car', 'carTypes', 'suppliers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Car id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $car = $this->Cars->get($id);
        $car->is_deleted = 1;
        if ($this->Cars->save($car)) {
            $this->Flash->success(__('The car has been deleted.'));
        } else {
            $this->Flash->error(__('The car could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index','del']);
    }

    public function ajaxAutocompleted(){
        $name=$this->request->getData('input'); 
        $car=$this->Cars->find()->where(['Cars.name Like'=>''.$name.'%','Cars.is_deleted'=>0]);
        ?>
            <ul id="country-list">
                <?php foreach($car as $show){ ?>
                    <li onClick="selectAutoCompleted('<?php echo $show->name;?>')">
                        <?php echo $show->name?>
                    </li>
                <?php } ?>
            </ul>
        <?php
        exit;  
    }
}
