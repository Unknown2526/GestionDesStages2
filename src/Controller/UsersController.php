<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Utility\Text;
use Cake\Mailer\Email;

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
            $user['uuid'] = Text::uuid();
            $user['verify'] = FALSE;

            if ($this->Users->save($user)) {

                $this->createRelatedProfil($user);

                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The username need to be a valide email.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
    }
    
    public function addStudent() {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user['uuid'] = Text::uuid();
            $user['verify'] = FALSE;
            $user['role_id'] = 'etudiant';
            
            if ($this->Users->save($user)) {

                $this->createRelatedProfil($user);
                
                $username = $user['username'];
                $split = explode('\\', ROOT);
                $local = end($split);
                $uuid = $user['uuid'];
                
                $email = new Email('default');
                $email->emailFormat('html');
                $email->to($username);
                $email->subject('Confirmation du compte');
                $email->send('Cliquer le lien dans la bar de recherche pour confirmer le compte: <a href="https://gestiondestages.ca/users/verifyEmail/' . $uuid . '">Verifier votre compte</a>');
                
                $this->Flash->success(__('Now verify your email.'));
                return $this->redirect(['action' => 'login']);
                
                $this->Flash->success(__('Now verify your email.'));
                return $this->redirect(['action' => 'login']);
            }
            $this->Flash->error(__('The username need to be a valide email.'));
        }
        $this->set(compact('user'));
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
                if ($user['verify'] == TRUE) {
                    $this->Auth->setUser($user);
                    return $this->dirigerVersPage($user['role_id']);
                } else {
                    $this->Flash->error(__('You need to verify your email in order to login.'));
                }
            } else {
                $this->Flash->error(__('Your username or password is incorrect.'));
            }
        }
    }

    public function dirigerVersPage($role) {
        if ($role === 'admin') {
            return $this->redirect(['controller' => 'Users', 'action' => 'index']);
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
        $this->Auth->allow(['logout', 'addStudent', 'verifyEmail']);
    }

    public function logout() {
        $this->Flash->success(__('You have been disconnected.'));
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

    public function verifyEmail() {
        $uuid = $this->request->getParam('pass');
        $sujet = $this->Users->find('all', [
            'conditions' => ['uuid' => $uuid['0']],
        ]);
        $sujet = $sujet->first();
        
        if (!empty($sujet)) {
            $sujet['verify'] = TRUE;
            $this->Users->save($sujet);
            $this->Flash->success(__('Your account is now active.'));
            
        } else {
            $this->Flash->error(__('The identification is not valide.'));
        }
        
        $this->redirect(['controller' => 'Users', 'action' => 'login']);
    }

}
