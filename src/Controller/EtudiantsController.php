<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Etudiants Controller
 *
 * @property \App\Model\Table\EtudiantsTable $Etudiants
 *
 * @method \App\Model\Entity\Etudiant[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EtudiantsController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $this->paginate = [
            'contain' => ['Users', 'Files']
        ];
        $etudiants = $this->paginate($this->Etudiants);

        $this->set(compact('etudiants'));
    }

    /**
     * View method
     *
     * @param string|null $id Etudiant id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $etudiant = $this->Etudiants->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('etudiant', $etudiant);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $etudiant = $this->Etudiants->newEntity();
        if ($this->request->is('post')) {
            $etudiant = $this->Etudiants->patchEntity($etudiant, $this->request->getData());
            if ($this->Etudiants->save($etudiant)) {
                $this->Flash->success(__('The etudiant has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The etudiant could not be saved. Please, try again.'));
        }
        $users = $this->Etudiants->Users->find('list', ['limit' => 200]);
        $this->set(compact('etudiant', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Etudiant id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $etudiant = $this->Etudiants->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $etudiant = $this->Etudiants->patchEntity($etudiant, $this->request->getData());

        
            if ($this->Etudiants->save($etudiant)) {
                $this->Flash->success(__('The etudiant has been saved.'));

                return $this->redirect(['controller' => 'Users', 'action' => 'monProfil', $id]);
            }
            $this->Flash->error(__('The etudiant could not be saved. Please, try again.'));
        }
        $users = $this->Etudiants->Users->find('list', ['limit' => 200]);
        $this->set(compact('etudiant', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Etudiant id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $etudiant = $this->Etudiants->get($id);
        if ($this->Etudiants->delete($etudiant)) {
            $this->Flash->success(__('The etudiant has been deleted.'));
        } else {
            $this->Flash->error(__('The etudiant could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user) {
        $action = $this->request->getParam('action');
        $role = $user['role_id'];

        if ($role === "milieu") {
            return false;
        }

        if ($role === "etudiant") {
            if (in_array($action, ['view', 'edit'])) {
                $passParam = $this->request->getParam('pass');
                $sujet = $this->Etudiants->get($passParam);

                return $user['id'] === $sujet['user_id'];
            } else {
                return false;
            }
        }
        return true;
    }

    public function addoc($id = null) {
        $etudiant = $this->Etudiants->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $etudiant = $this->Etudiants->patchEntity($etudiant, $this->request->getData());

            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["info_supp"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
            if (isset($_POST["submit"])) {
                $check = getimagesize($_FILES["info_supp"]["tmp_name"]);
                if ($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
            }
// Check if file already exists
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }
// Check file size
            if ($_FILES["info_supp"]["size"] > 500000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }
// Allow certain file formats
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "docx" && $imageFileType != "pdf") {
                echo "Sorry, only DOCX,PDF ,PNG & JPG  files are allowed.";
                $uploadOk = 0;
            }
// Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["info_supp"]["tmp_name"], $target_file)) {
                    echo "The file " . basename($_FILES["info_supp"]["name"]) . " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }


            if ($this->Etudiants->save($etudiant)) {
                $this->Flash->success(__('The file has been uploaded.'));

                return $this->redirect(['controller' => 'Users', 'action' => 'monProfil', $id]);
            }
            $this->Flash->error(__('The file could not be saved. Please, try again.'));
        }
        $users = $this->Etudiants->Users->find('list', ['limit' => 200]);
        $this->set(compact('etudiant', 'users'));
    }

}
