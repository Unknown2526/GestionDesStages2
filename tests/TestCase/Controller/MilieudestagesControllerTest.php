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
        //'app.missions',
        //'app.typeclienteles',
        //'app.typeetablissements',
        //'app.milieudestages_missions',
        //'app.milieudestages_typeclienteles',
        //'app.milieudestages_typeetablissements'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->get('/milieudestages');
        $this->assertResponseSuccess();
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->get('/milieudestages/view/1');
        $this->assertResponseSuccess();
    }

    /**
     * Test add method
     *
     * @return void
     */
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

    /**
     * Test edit method
     *
     * @return void
     */
    /**public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }*/

    /**
     * Test delete method
     *
     * @return void
     */
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
    }
}
