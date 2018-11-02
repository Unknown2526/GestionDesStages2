<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Administrateurs Controller
 *
 * @property \App\Model\Table\AdministrateursTable $Administrateurs
 *
 * @method \App\Model\Entity\Administrateur[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AdministrateursController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $administrateurs = $this->paginate($this->Administrateurs);

        $this->set(compact('administrateurs'));
    }

    /**
     * View method
     *
     * @param string|null $id Administrateur id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $administrateur = $this->Administrateurs->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set('administrateur', $administrateur);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $administrateur = $this->Administrateurs->newEntity();
        if ($this->request->is('post')) {
            $administrateur = $this->Administrateurs->patchEntity($administrateur, $this->request->getData());
            if ($this->Administrateurs->save($administrateur)) {
                $this->Flash->success(__('The administrateur has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The administrateur could not be saved. Please, try again.'));
        }
        $users = $this->Administrateurs->Users->find('list', ['limit' => 200, 'keyField' => 'id', 'valueField' => 'nom']);
        $this->set(compact('administrateur', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Administrateur id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $administrateur = $this->Administrateurs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $administrateur = $this->Administrateurs->patchEntity($administrateur, $this->request->getData());
            if ($this->Administrateurs->save($administrateur)) {
                $this->Flash->success(__('The administrateur has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The administrateur could not be saved. Please, try again.'));
        }
        $users = $this->Administrateurs->Users->find('list', ['limit' => 200, 'keyField' => 'id', 'valueField' => 'nom']);
        $this->set(compact('administrateur', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Administrateur id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $administrateur = $this->Administrateurs->get($id);
        if ($this->Administrateurs->delete($administrateur)) {
            $this->Flash->success(__('The administrateur has been deleted.'));
        } else {
            $this->Flash->error(__('The administrateur could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function isAuthorized($user) {
        $role = $user['role_id'];

        return $role === "admin";
    }
}
