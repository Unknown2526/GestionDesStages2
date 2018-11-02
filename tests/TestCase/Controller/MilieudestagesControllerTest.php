<?php
namespace App\Test\TestCase\Controller;

use App\Controller\MilieudestagesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\MilieudestagesController Test Case
 */
class MilieudestagesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.milieudestages',
        'app.regions',
        'app.users',
        'app.offres',
<<<<<<< HEAD
        'app.missions',
        'app.typeclienteles',
        'app.typeetablissements',
        'app.milieudestages_missions',
        'app.milieudestages_typeclienteles',
        'app.milieudestages_typeetablissements'
=======
        //'app.missions',
        //'app.typeclienteles',
        //'app.typeetablissements',
        //'app.milieudestages_missions',
        //'app.milieudestages_typeclienteles',
        //'app.milieudestages_typeetablissements'
>>>>>>> 77ffb0775b5d26c8068c64ac1ea5246f3b0d27ab
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
<<<<<<< HEAD
        $this->markTestIncomplete('Not implemented yet.');
=======
        $this->get('/milieudestages');
        $this->assertResponseSuccess();
>>>>>>> 77ffb0775b5d26c8068c64ac1ea5246f3b0d27ab
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
<<<<<<< HEAD
        $this->markTestIncomplete('Not implemented yet.');
=======
        $this->get('/milieudestages/view/1');
        $this->assertResponseSuccess();
>>>>>>> 77ffb0775b5d26c8068c64ac1ea5246f3b0d27ab
    }

    /**
     * Test add method
     *
     * @return void
     */
<<<<<<< HEAD
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
=======
    /**public function testAdd()
    {
        $this->session([
            'Auth' => [
                'Users' => [
                    'id' => 10,
                    'username' => 'milieu',
                    'role_id' => 'milieu',
                    'verify' => 1
                ]
            ]
        ]);
        
        $this->
        
        $this->get('/milieudestages/add');
        $this->assertResponseSuccess();
        
        $data = [
            'id' => 1,
            'nom' => 'milieu',
            'adresse' => 'a',
            'ville' => 'a',
            'province' => 'a',
            'code_postal' => 'a',
            'exigence' => 'a',
            'nom_respo' => 'a',
            'telephone_respo' => '123',
            'fax_respo' => '123',
            'courriel_respo' => 'milieu@milieu.com',
            'adresse_admin' => 'a',
            'ville_admin' => 'a',
            'province_admin' => 'a',
            'code_postal_admin' => 'a',
            'region_admin_id' => 1,
            'facilite' => 'a',
            'tache' => 'a',
            'remarque' => 'a',
            'info_solicitation' => 'a',
            'info_contrat' => 'a',
            'reponse_milieu' => 'a',
            'autre_info' => 'a',
            'date_inv' => '2018-09-27 00:03:00',
            'date_rappel' => '2018-09-27 00:03:00',
            'actif' => 1,
            'user_id' => 10,
            'created' => '2018-09-29 15:50:49',
            'modified' => '2018-09-29 15:50:49'
        ];
        $this->post('/milieudestages/add',$data);
        $this->assertResponseSuccess();
        
        $milieu = TableRegistry::get('Milieudestages');
        $query = $milieu->find()->where([
            'id' => $data['id']
        ]);
    }*/
>>>>>>> 77ffb0775b5d26c8068c64ac1ea5246f3b0d27ab

    /**
     * Test edit method
     *
     * @return void
     */
<<<<<<< HEAD
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
=======
    /**public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }*/
>>>>>>> 77ffb0775b5d26c8068c64ac1ea5246f3b0d27ab

    /**
     * Test delete method
     *
     * @return void
     */
<<<<<<< HEAD
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
=======
    /**public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }*/
    
    public function testAddAuthenticatedFails()
    {
        //Tester Milieu ne peut pas créer un milieu
        $this->session([
            'Auth' => [
                'User' => [
                    'id' => 1,
                    'username' => 'milieu',
                    'password' => 'milieu',
                    'role_id' => 'milieu',
                    'file_id' => null,
                    'uuid' => '',
                    'verify' => 1,
                    'created' => null,
                    'modified' => null
                ]
            ]
        ]);
        $this->get('/milieudestages/add');

        $this->assertRedirect('/');
        
        //Tester Admin peut créer un milieu
        /*$this->session([
            'Auth' => [
                'User' => [
                    'id' => 2,
                    'username' => 'admin',
                    'password' => 'admin',
                    'role_id' => 'admin',
                    'file_id' => null,
                    'uuid' => '',
                    'verify' => 1,
                    'created' => null,
                    'modified' => null
                ]
            ]
        ]);
        $this->get('/milieudestages/add');

        $this->assertResponseOk();*/
    
        //Tester Etudiant ne peut pas créer un milieu
        $this->session([
            'Auth' => [
                'User' => [
                    'id' => 3,
                    'username' => 'etudiant',
                    'password' => 'etudiant',
                    'role_id' => 'etudiant',
                    'file_id' => null,
                    'uuid' => '',
                    'verify' => 1,
                    'created' => null,
                    'modified' => null
                ]
            ]
        ]);
        $this->get('/milieudestages/add');

        $this->assertRedirect('/');
>>>>>>> 77ffb0775b5d26c8068c64ac1ea5246f3b0d27ab
    }
}
