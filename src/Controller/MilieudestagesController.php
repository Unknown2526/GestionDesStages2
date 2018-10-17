<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;
use Cake\ORM\TableRegistry;

/**
 * Milieudestages Controller
 *
 * @property \App\Model\Table\MilieudestagesTable $Milieudestages
 *
 * @method \App\Model\Entity\Milieudestage[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MilieudestagesController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $this->paginate = [
            'contain' => ['Regions', 'Users']
        ];
        $milieudestages = $this->paginate($this->Milieudestages);

        $this->set(compact('milieudestages'));
    }

    /**
     * View method
     *
     * @param string|null $id Milieudestage id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $milieudestage = $this->Milieudestages->get($id, [
            'contain' => ['Regions', 'Users', 'Missions', 'Typeclienteles', 'Typeetablissements', 'Offres']
        ]);

        $this->set('milieudestage', $milieudestage);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $milieudestage = $this->Milieudestages->newEntity();
        if ($this->request->is('post')) {
            $milieudestage = $this->Milieudestages->patchEntity($milieudestage, $this->request->getData());

            $loguser = $this->request->session()->read('Auth.User');
            $milieudestage->user_id = $loguser['id'];

            if ($this->Milieudestages->save($milieudestage)) {
                $this->Flash->success(__('The milieudestage has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The milieudestage could not be saved. Please, try again.'));
        }
        $regions = $this->Milieudestages->Regions->find('list', ['limit' => 200, 'keyField' => 'id', 'valueField' => 'nom']);
        $users = $this->Milieudestages->Users->find('list', ['limit' => 200, 'keyField' => 'id', 'valueField' => 'username']);
        $missions = $this->Milieudestages->Missions->find('list', ['limit' => 200, 'keyField' => 'id', 'valueField' => 'nom']);
        $typeclienteles = $this->Milieudestages->Typeclienteles->find('list', ['limit' => 200, 'keyField' => 'id', 'valueField' => 'type']);
        $typeetablissements = $this->Milieudestages->Typeetablissements->find('list', ['limit' => 200, 'keyField' => 'id', 'valueField' => 'nom']);
        $this->set(compact('milieudestage', 'regions', 'users', 'missions', 'typeclienteles', 'typeetablissements'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Milieudestage id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $milieudestage = $this->Milieudestages->get($id, [
            'contain' => ['Missions', 'Typeclienteles', 'Typeetablissements']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $milieudestage = $this->Milieudestages->patchEntity($milieudestage, $this->request->getData());
            
            $milieudestage = $this->secureAssociation($milieudestage);
            
            if ($this->Milieudestages->save($milieudestage)) {
                $this->Flash->success(__('The milieudestage has been saved.'));

                return $this->redirect(['controller' => 'Milieudestages', 'action' => 'view', $milieudestage['id']]);
            }
            $this->Flash->error(__('The milieudestage could not be saved. Please, try again.'));
        }
        $regions = $this->Milieudestages->Regions->find('list', ['limit' => 200, 'keyField' => 'id', 'valueField' => 'nom']);
        $users = $this->Milieudestages->Users->find('list', ['limit' => 200]);
        $missions = $this->Milieudestages->Missions->find('list', ['limit' => 200, 'keyField' => 'id', 'valueField' => 'nom']);
        $typeclienteles = $this->Milieudestages->Typeclienteles->find('list', ['limit' => 200, 'keyField' => 'id', 'valueField' => 'type']);
        $typeetablissements = $this->Milieudestages->Typeetablissements->find('list', ['limit' => 200, 'keyField' => 'id', 'valueField' => 'nom']);
        $this->set(compact('milieudestage', 'regions', 'users', 'missions', 'typeclienteles', 'typeetablissements'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Milieudestage id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $milieudestage = $this->Milieudestages->get($id);
        if ($this->Milieudestages->delete($milieudestage)) {
            $this->Flash->success(__('The milieudestage has been deleted.'));
        } else {
            $this->Flash->error(__('The milieudestage could not be deleted. Please, try again.'));
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
                $sujet = $this->Milieudestages->get($passParam);

                return $user['id'] === $sujet['user_id'];
            } else {
                return in_array($action, ['display', 'view', 'index']);
            }
        }
        return true;
    }

    public function notifier() {      
        $milieus = $this->Milieudestages->find();
        $admin = $this->getEmailAdmin();
        foreach ($milieus as $milieu) {
            $email = new Email('default');
            $email->to($milieu['courriel_respo'])->subject('Mettez a jour vos information')
                    ->send('Vous pouvez maintenant mettre vos information à jours. Si'
                            . ' vous ne connaissez pas votre utilisateur et votre mot '
                            . 'de passe, contactez moi au ' . $admin['telephone'] . ' ou'
                            . ' à mon courriel ' . $admin['courriel'] . '.');
        }
         $this->Flash->success(__('You have notified the internship circles.'));
        return $this->redirect(['controller' => 'Milieudestages', 'action' => 'index']);
    }
    
    public function getEmailAdmin() {
        $loguser = $this->request->session()->read('Auth.User');
        
        $admin = TableRegistry::get('Administrateurs');
        $admin = $admin->find('all', [
            'conditions' => ['user_id' => $loguser['id']]
        ]);
        
        return $admin->first();
    }
    
    private function secureAssociation($milieudestage) {
        $loguser = $this->request->session()->read('Auth.User');

        if ($loguser['role_id'] === 'milieu') {
            $milieudestage['user_id'] = $loguser['id'];
        }

        return $milieudestage;
    }
}
