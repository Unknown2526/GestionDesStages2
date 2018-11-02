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
<<<<<<< HEAD
        'app.users',
        'app.milieudestages'
=======
        'app.regions',
        'app.users',
        'app.milieudestages',
        'app.etudiants',
        'app.etudiants_offres'
>>>>>>> 77ffb0775b5d26c8068c64ac1ea5246f3b0d27ab
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
