<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CarTypes Controller
 *
 * @property \App\Model\Table\CarTypesTable $CarTypes
 *
 * @method \App\Model\Entity\CarType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CarTypesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index($id=null)
    {
        if($id){ 
            $CarTypes = $this->CarTypes->get($id);
        }else{
            $CarTypes = $this->CarTypes->newEntity();
        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            $CarTypes = $this->CarTypes->patchEntity($CarTypes, $this->request->getData());
            if ($this->CarTypes->save($CarTypes)) {
                $this->Flash->success(__('The city has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The city could not be saved. Please, try again.'));
            }
        }

        $this->paginate = [
            'limit' => 10
        ];
            
        $carTypesList = $this->paginate($this->CarTypes->find());
        
        $page_no = $this->request->getQuery('page');
        if (empty($page_no)) $page_no = 1;

        $page_no = $page_no-1;
        
        $this->set(compact('CarTypes','carTypesList','page_no'));
    }

    /**
     * View method
     *
     * @param string|null $id Car Type id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {   

        $carType = $this->CarTypes->get($id, [
            'contain' => []
        ]);

        $this->set('carType', $carType);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $carType = $this->CarTypes->newEntity();
        if ($this->request->is('post')) {
            $carType = $this->CarTypes->patchEntity($carType, $this->request->getData());
            if ($this->CarTypes->save($carType)) {
                $this->Flash->success(__('The car type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The car type could not be saved. Please, try again.'));
        }
        $this->set(compact('carType'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Car Type id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $carType = $this->CarTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $carType = $this->CarTypes->patchEntity($carType, $this->request->getData());
            if ($this->CarTypes->save($carType)) {
                $this->Flash->success(__('The car type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The car type could not be saved. Please, try again.'));
        }
        $this->set(compact('carType'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Car Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $carType = $this->CarTypes->get($id);
        if ($this->CarTypes->delete($carType)) {
            $this->Flash->success(__('The car type has been deleted.'));
        } else {
            $this->Flash->error(__('The car type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
