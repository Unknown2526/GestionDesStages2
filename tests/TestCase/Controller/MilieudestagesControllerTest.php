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
    public function testAdd()
    {
        $this->Auth = [
            'Auth' => [
                'username' => 'admin'
            ]
        ];
        
        $this->session($this->Auth);
        $this->get('/milieudestages/add');
        $this->assertResponseSuccess();
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        //$this->markTestIncomplete('Not implemented yet.');
        $this->Auth = [
            'Auth' => [
                'username' => 'milieu'
            ]
        ];
        
        $this->session($this->Auth);
        $this->get('/milieudestages/edit');
        $this->assertResponseSuccess();
    }

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
        $this->assertRedirect('/');;
    
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
