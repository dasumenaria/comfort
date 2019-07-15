<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * NatureOfGroups Controller
 *
 * @property \App\Model\Table\NatureOfGroupsTable $NatureOfGroups
 *
 * @method \App\Model\Entity\NatureOfGroup[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class NatureOfGroupsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $natureOfGroups = $this->paginate($this->NatureOfGroups);

        $this->set(compact('natureOfGroups'));
    }

    /**
     * View method
     *
     * @param string|null $id Nature Of Group id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $natureOfGroup = $this->NatureOfGroups->get($id, [
            'contain' => ['AccountingGroups']
        ]);

        $this->set('natureOfGroup', $natureOfGroup);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $natureOfGroup = $this->NatureOfGroups->newEntity();
        if ($this->request->is('post')) {
            $natureOfGroup = $this->NatureOfGroups->patchEntity($natureOfGroup, $this->request->getData());
            if ($this->NatureOfGroups->save($natureOfGroup)) {
                $this->Flash->success(__('The nature of group has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The nature of group could not be saved. Please, try again.'));
        }
        $this->set(compact('natureOfGroup'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Nature Of Group id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $natureOfGroup = $this->NatureOfGroups->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $natureOfGroup = $this->NatureOfGroups->patchEntity($natureOfGroup, $this->request->getData());
            if ($this->NatureOfGroups->save($natureOfGroup)) {
                $this->Flash->success(__('The nature of group has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The nature of group could not be saved. Please, try again.'));
        }
        $this->set(compact('natureOfGroup'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Nature Of Group id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $natureOfGroup = $this->NatureOfGroups->get($id);
        if ($this->NatureOfGroups->delete($natureOfGroup)) {
            $this->Flash->success(__('The nature of group has been deleted.'));
        } else {
            $this->Flash->error(__('The nature of group could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
