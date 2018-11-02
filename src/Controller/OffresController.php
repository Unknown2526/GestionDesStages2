<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;
use Cake\ORM\TableRegistry;
<<<<<<< HEAD
use Cake\Utility\Text;
=======
>>>>>>> 77ffb0775b5d26c8068c64ac1ea5246f3b0d27ab

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
<<<<<<< HEAD
=======
        $loguser = $this->request->session()->read('Auth.User');

>>>>>>> 77ffb0775b5d26c8068c64ac1ea5246f3b0d27ab
        $this->paginate = [
            'contain' => ['Users', 'Milieudestages', 'Regions']
        ];
        $offres = $this->paginate($this->Offres);

<<<<<<< HEAD
        $this->set(compact('offres'));
=======
        if ($loguser['role_id'] === 'etudiant') {
            $links = $this->getLinks();
            $this->set(compact('offres', 'links'));
        } else {
            $this->set(compact('offres'));
        }
>>>>>>> 77ffb0775b5d26c8068c64ac1ea5246f3b0d27ab
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
<<<<<<< HEAD
=======
                $this->notifierEtudiants($offre['id']);
>>>>>>> 77ffb0775b5d26c8068c64ac1ea5246f3b0d27ab

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
<<<<<<< HEAD
            if (in_array($action, ['edit', 'delete', 'notifierEtudiants'])) {
=======
            if (in_array($action, ['edit', 'delete'])) {
>>>>>>> 77ffb0775b5d26c8068c64ac1ea5246f3b0d27ab
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
<<<<<<< HEAD
        $offreid = $this->request->getParam('pass');

        $email = new Email('default');
        $email->to($milieu['courriel_respo'])->subject('Postulation d\'un étudiant')
                ->send('Bonjour,' . $etudiant['prenom'] . ' ' . $etudiant['prenom']
                        . ' est intéressé à votre offre de stage numéro ' . $offreid[0]
                        . '. Vous pouvez le contacter à son courriel ' . $etudiant['courriel']
                        . ' ou à son téléphone ' . $etudiant['telephone'] . '.');
        $this->Flash->success(__('You applied.'));
        return $this->redirect(['action' => 'index']);
    }

=======

        if ($this->linkStudantAndOffer($etudiant['id'], $offre['id'])) {
            /*
              $email = new Email('default');
              $email->to($milieu['courriel_respo']);
              $email->subject('Postulation d\'un étudiant');
              $email->send('Bonjour,' . $etudiant['prenom'] . ' ' . $etudiant['prenom']
              . ' est intéressé à votre offre de stage numéro ' . $offre['id']
              . '. Vous pouvez le contacter à son courriel ' . $etudiant['courriel']
              . ' ou à son téléphone ' . $etudiant['telephone'] . '.');

              $this->Flash->success(__('You applied.'));
             */
        } else {
            $this->Flash->error(__('Your application failed. Please, try again.'));
        }
        
        return $this->redirect(['action' => 'index']);
    }

    private function linkStudantAndOffer($etudiantId, $offreId) {
        $links = TableRegistry::get('EtudiantsOffres');
        $newLink = $links->newEntity();

        $newLink->etudiant_id = $etudiantId;
        $newLink->offre_id = $offreId;
        debug($newLink);

        return $links->save($newLink);
    }

>>>>>>> 77ffb0775b5d26c8068c64ac1ea5246f3b0d27ab
    private function getInfoEtudiant() {
        $loguser = $this->request->session()->read('Auth.User');

        $etudiant = TableRegistry::get('Etudiants');
        $etudiant = $etudiant->find('all', [
            'conditions' => ['user_id' => $loguser['id']]
        ]);
        return $etudiant->first();
    }

    private function getInfoMilieu($id) {
<<<<<<< HEAD
        $milieu = $this->Offres->Milieudestages->find('all', [
            'conditions' => ['user_id' => $id],
        ]);
=======
        $milieu = $this->Offres->Milieudestages->find('all', ['user_id' => $id]);
>>>>>>> 77ffb0775b5d26c8068c64ac1ea5246f3b0d27ab

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
<<<<<<< HEAD
    
    public function notifierEtudiants() {
        
        $offreid = $this->request->getParam('pass');
        $webroot = $this->request->webroot;
        $etudiants = $this->getEmailStudents();
        
        foreach ($etudiants as $etudiant) {
            
            $email = new Email('default');
            $email->emailFormat('html');
            $email->to($etudiants['courriel'])->subject('New offer')
                    ->send('We have a new internship offer.'
                            . '<br><br><a href="localhost'.$webroot.'offres/view/'.$offreid[0].'">Click here to see the new offer</a>');
        }
         $this->Flash->success(__('You have notified the students.'));
        return $this->redirect(['controller' => 'Milieudestages', 'action' => 'index']);
    }
    
    public function getEmailStudents() {
        
        /*$etudiant = TableRegistry::get('Users');
        $etudiant = $etudiant->find('all', array(
            'conditions' => array('role_id' => 'etudiant')
        ));*/
        $etudiants = TableRegistry::get('Etudiants');
        $etudiants = $etudiants->find('all');
        
        return $etudiants->toArray();
    }

=======

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

    private function getLinks() {
        $etudiant = $this->getInfoEtudiant();
        $links = TableRegistry::get('EtudiantsOffres');
        $links = $links->find()->where(['etudiant_id' => $etudiant['id']])->all();
        $array = array();
        foreach ( $links as $row ) {
            $array[] = $row['offre_id'];
        }
        
        return $array;
    }

>>>>>>> 77ffb0775b5d26c8068c64ac1ea5246f3b0d27ab
}
