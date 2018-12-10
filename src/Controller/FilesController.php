<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Files Controller
 *
 * @property \App\Model\Table\FilesTable $Files
 *
 * @method \App\Model\Entity\File[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FilesController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $files = $this->paginate($this->Files);

        $this->set(compact('files'));
    }

    /**
     * View method
     *
     * @param string|null $id File id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $file = $this->Files->get($id, [
            'contain' => []
        ]);

        $this->set('file', $file);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $file = $this->Files->newEntity();
        if ($this->request->is('post')) {
            
            //debug($this->request->data); die();

            if (!empty($this->request->data['name'])) {
                
                foreach ($this->request->data['name'] as $file_data) {
                    $fileName = $file_data['name'];
                    $uploadPath = 'Files/';
                    $uploadFile = $uploadPath . $fileName;

                    if (move_uploaded_file($file_data['tmp_name'], 'file/' . $uploadFile)) {

                        $file = $this->Files->patchEntity($file, $file_data);
                        $file->name = $fileName;
                        $file->path = $uploadPath;

                        $loguser = $this->request->session()->read('Auth.User');

                        $file->user_id= $loguser['id'];

                        if ($this->Files->save($file)) {
                            $this->Flash->success(__('The file has been saved.'));
                            return $this->redirect(['controller' => 'Etudiants', 'action' => 'index']);
                        } else {
                            $this->Flash->error(__('Unable to upload file, please try again.'));
                        }
                    } else {
                        $this->Flash->error(__('Please choose a file to upload.'));
                    }
                }

                $this->Flash->error(__('The file could not be saved. Please, try again.'));
            }
            $this->Flash->error(__('The file could not be saved. Please, try again.'));
        }
        $this->set(compact('file'));
    }

    /**
     * Edit method
     *
     * @param string|null $id File id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $file = $this->Files->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $file = $this->Files->patchEntity($file, $this->request->getData());
            if ($this->Files->save($file)) {
                $this->Flash->success(__('The file has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The file could not be saved. Please, try again.'));
        }
        $this->set(compact('file'));
    }

    /**
     * Delete method
     *
     * @param string|null $id File id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $file = $this->Files->get($id);
        if ($this->Files->delete($file)) {
            $this->Flash->success(__('The file has been deleted.'));
        } else {
            $this->Flash->error(__('The file could not be deleted. Please, try again.'));
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
            if (in_array($action, ['add'])) {
                
            } elseif (in_array($action, ['view', 'edit'])) {
                $passParam = $this->request->getParam('pass');
                $sujet = $this->Etudiants->get($passParam);

                return $user['id'] === $sujet['user_id'];
            } else {
                return false;
            }
        }
        return true;
    }

}