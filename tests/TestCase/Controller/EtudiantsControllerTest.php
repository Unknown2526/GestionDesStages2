<?php
namespace App\Test\TestCase\Controller;

use App\Controller\EtudiantsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\EtudiantsController Test Case
 */
class EtudiantsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.etudiants',
<<<<<<< HEAD
        'app.users'
=======
        'app.users',
        'app.offres',
        //'app.etudiants_offres'
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
        $this->get('/etudiants');
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
        $this->get('/etudiants/view/1');
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
    /*public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
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
    /*public function testEdit()
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
    }
=======
    /*public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }*/
>>>>>>> 77ffb0775b5d26c8068c64ac1ea5246f3b0d27ab
}
