<?php
namespace App\Test\TestCase\Controller;

use App\Controller\OffresController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\OffresController Test Case
 */
class OffresControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.offres',
        'app.regions',
        'app.users',
        'app.milieudestages',
        'app.etudiants',
        'app.etudiants_offres'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->get('/etudiants');
        $this->assertResponseSuccess();
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->get('/etudiants/view/1');
        $this->assertResponseSuccess();
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        //$this->markTestIncomplete('Not implemented yet.');
        
        $this->Auth = [
            'Auth' => [
                'username' => 'milieu'
            ]
        ];
        
        $this->session($this->Auth);
        $this->get('/offres/add');
        $this->assertResponseSuccess();
    }

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
}
