<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Offres Controller
 *
 * @property \App\Model\Table\OffresTable $Offres
 *
 * @method \App\Model\Entity\Offre[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OffresController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $this->paginate = [
            'contain' => ['Users', 'Milieudestages']
        ];
        $offres = $this->paginate($this->Offres);

        $this->set(compact('offres'));
    }

    /**
     * View method
     *
     * @param string|null $id Offre id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $offre = $this->Offres->get($id, [
            'contain' => ['Users', 'Milieudestages']
        ]);

        $this->set('offre', $offre);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $offre = $this->Offres->newEntity();
        if ($this->request->is('post')) {
            $offre = $this->Offres->patchEntity($offre, $this->request->getData());

            $loguser = $this->request->session()->read('Auth.User');
            $milieu = $this->Offres->Milieudestages->find('all', [
                'conditions' => ['user_id' => $loguser['id']]
            ]);
            $first = $milieu->first();
            
            $offre->user_id = $loguser['id'];
            $offre->mileudestage_id = $first['id'];
            

            if ($this->Offres->save($offre)) {
                $this->Flash->success(__('The offre has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The offre could not be saved. Please, try again.'));
        }
        $users = $this->Offres->Users->find('list', ['limit' => 200]);
        $milieudestages = $this->Offres->Milieudestages->find('list', ['limit' => 200]);
        $this->set(compact('offre', 'users', 'milieudestages'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Offre id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $offre = $this->Offres->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $offre = $this->Offres->patchEntity($offre, $this->request->getData());
            if ($this->Offres->save($offre)) {
                $this->Flash->success(__('The offre has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The offre could not be saved. Please, try again.'));
        }
        $users = $this->Offres->Users->find('list', ['limit' => 200]);
        $milieudestages = $this->Offres->Milieudestages->find('list', ['limit' => 200]);
        $this->set(compact('offre', 'users', 'milieudestages'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Offre id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $offre = $this->Offres->get($id);
        if ($this->Offres->delete($offre)) {
            $this->Flash->success(__('The offre has been deleted.'));
        } else {
            $this->Flash->error(__('The offre could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user) {
        $action = $this->request->getParam('action');
        $role = $user['role_id'];

        if ($role === "etudiant") {
            return in_array($action, ['display', 'view', 'index']);
        }

        if ($role === "milieu") {
            if ($action === "edit") {
                $passParam = $this->request->getParam('pass');
                $sujet = $this->Offres->get($passParam);

                return $user['id'] === $sujet['user_id'];
            } else {
                return in_array($action, ['display', 'view', 'index', 'add']);
            }
        }
        return true;
    }

}
