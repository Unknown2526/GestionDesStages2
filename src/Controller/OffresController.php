<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;
use Cake\ORM\TableRegistry;

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
            'contain' => ['Users', 'Milieudestages', 'Regions']
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
            'contain' => ['Users', 'Milieudestages', 'Regions']
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

            $offre = $this->secureAssociation($offre);

            if ($this->Offres->save($offre)) {
                $this->Flash->success(__('The offre has been saved.'));
                $this->notifierEtudiants($offre['id']);
                
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The offre could not be saved. Please, try again.'));
        }

        $regions = $this->Offres->Regions->find('list', ['limit' => 200, 'keyField' => 'id', 'valueField' => 'nom']);
        /* $users = $this->Offres->Users->find('list', ['limit' => 200, 'keyField' => 'id', 'valueField' => 'username']); */
        $milieudestages = $this->Offres->Milieudestages->find('list', ['limit' => 200, 'keyField' => 'id', 'valueField' => 'nom']);
        $this->set(compact('offre', 'regions', 'users', 'milieudestages'));
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

            $offre = $this->secureAssociation($offre);

            if ($this->Offres->save($offre)) {
                $this->Flash->success(__('The offre has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The offre could not be saved. Please, try again.'));
        }

        $regions = $this->Offres->Regions->find('list', ['limit' => 200, 'keyField' => 'id', 'valueField' => 'nom']);
        $users = $this->Offres->Users->find('list', ['limit' => 200, 'keyField' => 'id', 'valueField' => 'username']);
        $milieudestages = $this->Offres->Milieudestages->find('list', ['limit' => 200, 'keyField' => 'id', 'valueField' => 'nom']);
        $this->set(compact('offre', 'regions', 'users', 'milieudestages'));
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
            return in_array($action, ['display', 'view', 'index', 'postuler']);
        }

        if ($role === "milieu") {
            if (in_array($action, ['edit', 'delete'])) {
                $passParam = $this->request->getParam('pass');
                $sujet = $this->Offres->get($passParam);

                return $user['id'] === $sujet['user_id'];
            } else {
                return in_array($action, ['display', 'view', 'index', 'add']);
            }
        }
        return true;
    }

    public function postuler() {
        $offre = $this->Offres->get($this->request->getParam('pass'));
        $milieu = $this->getInfoMilieu($offre['milieudestage_id']);
        $etudiant = $this->getInfoEtudiant();
        $offreid = $this->request->getParam('pass');
        
        $email = new Email('default');
        $email->to($milieu['courriel_respo']);
        $email->subject('Postulation d\'un étudiant');
        $email->send('Bonjour,' . $etudiant['prenom'] . ' ' . $etudiant['prenom']
                        . ' est intéressé à votre offre de stage numéro ' . $offreid[0]
                        . '. Vous pouvez le contacter à son courriel ' . $etudiant['courriel']
                        . ' ou à son téléphone ' . $etudiant['telephone'] . '.');
        
        $this->Flash->success(__('You applied.'));
        return $this->redirect(['action' => 'index']);
    }

    private function getInfoEtudiant() {
        $loguser = $this->request->session()->read('Auth.User');

        $etudiant = TableRegistry::get('Etudiants');
        $etudiant = $etudiant->find('all', [
            'conditions' => ['user_id' => $loguser['id']]
        ]);
        return $etudiant->first();
    }

    private function getInfoMilieu($id) {
        $milieu = $this->Offres->Milieudestages->find('all', ['user_id' => $id]);
        
        return $milieu->first();
    }

    private function secureAssociation($offre) {
        $loguser = $this->request->session()->read('Auth.User');

        if ($loguser['role_id'] === 'milieu') {
            $milieu = $this->getInfoMilieu($loguser['id']);

            $offre['user_id'] = $loguser['id'];
            $offre['milieudestage_id'] = $milieu['id'];
        }

        return $offre;
    }
    
    public function notifierEtudiants($id) {
        $webroot = $this->request->webroot;
        $etudiants = $this->getEmailStudents();

        foreach ($etudiants as $etudiant) {
            $destination = $etudiant['courriel'];
            
            $email = new Email('default');
            $email->emailFormat('html');
            $email->to($destination);
            $email->subject('New offer');
            $email->send('We have a new internship offer.<br><br><a href="localhost' . $webroot . 'offres/view/' . $id . '">Click here to see the new offer</a>');
        }
        $this->Flash->success(__('You have notified the students.'));
        return $this->redirect(['controller' => 'Offres', 'action' => 'index']);
    }

    public function getEmailStudents() {
        $etudiants = TableRegistry::get('Etudiants');
        $etudiants = $etudiants->find('all');

        return $etudiants->toArray();
    }
}
