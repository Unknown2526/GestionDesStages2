<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $this->paginate = [
            'contain' => ['Roles']
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $user = $this->Users->get($id, [
            'contain' => ['Roles', 'Administrateurs', 'Etudiants', 'Milieudestages', 'Offres']
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {

                $this->createRelatedProfil($user);

                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Le username doit être un courriel valide.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
    }

    private function createRelatedProfil($user) {
        if ($user['role_id'] === 'milieu') {
            $profiltable = TableRegistry::get('Milieudestages');
            $profil = $profiltable->newEntity();
            $profil->courriel_respo = $user['username'];
            
        } elseif ($user['role_id'] === 'etudiant') {
            $profiltable = TableRegistry::get('Etudiants');
            $profil = $profiltable->newEntity();
            $profil->courriel = $user['username'];

        } elseif ($user['role_id'] === 'admin') {
            $profiltable = TableRegistry::get('Administrateurs');
            $profil = $profiltable->newEntity();
            $profil->courriel = $user['username'];

        }
        
        $profil->user_id = $user['id'];
        $profiltable->save($profil);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login() {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->dirigerVersPage($user['role_id']);
            } else {
                $this->Flash->error('Votre identifiant ou votre mot de passe est incorrect.');
            }
        }
    }

    public function dirigerVersPage($role) {
        if ($role === 'admin') {
            return $this->redirect(['controller' => 'Milieudestages', 'action' => 'index']);
        } else {
            return $this->redirect(['controller' => 'Offres', 'action' => 'index']);
        }
    }

    public function monProfil() {
        $user = $this->request->session()->read('Auth.User');

        if ($user['role_id'] === 'admin') {
            $admin = $this->Users->Administrateurs->find('all', [
                'conditions' => ['user_id' => $user['id']]
            ]);
            $first = $admin->first();
            $this->redirect(['controller' => 'Administrateurs', 'action' => 'view', $first['id']]);
        }

        if ($user['role_id'] === 'milieu') {
            $milieu = $this->Users->Milieudestages->find('all', [
                'conditions' => ['user_id' => $user['id']]
            ]);
            $first = $milieu->first();
            $this->redirect(['controller' => 'Milieudestages', 'action' => 'view', $first['id']]);
        }

        if ($user['role_id'] === 'etudiant') {
            $etudiant = $this->Users->Etudiants->find('all', [
                'conditions' => ['user_id' => $user['id']]
            ]);
            $first = $etudiant->first();
            $this->redirect(['controller' => 'Etudiants', 'action' => 'view', $first['id']]);
        }
    }

    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['logout']);
    }

    public function logout() {
        $this->Flash->success('Vous avez été déconnecté.');
        return $this->redirect($this->Auth->logout());
    }

    public function isAuthorized($user) {
        $action = $this->request->getParam('action');
        $role = $user['role_id'];

        if ($role !== "admin") {
            return $action === "monProfil";
        }

        return true;
    }

}
