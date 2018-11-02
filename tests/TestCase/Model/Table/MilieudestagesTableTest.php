<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MilieudestagesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MilieudestagesTable Test Case
 */
class MilieudestagesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MilieudestagesTable
     */
    public $Milieudestages;

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
        'app.missions',
        'app.typeclienteles',
        'app.typeetablissements'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Milieudestages') ? [] : ['className' => MilieudestagesTable::class];
        $this->Milieudestages = TableRegistry::getTableLocator()->get('Milieudestages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Milieudestages);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
<<<<<<< HEAD
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
=======
    /*public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }*/
>>>>>>> 77ffb0775b5d26c8068c64ac1ea5246f3b0d27ab

    /**
     * Test validationDefault method
     *
     * @return void
     */
<<<<<<< HEAD
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
=======
    /*public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }*/
>>>>>>> 77ffb0775b5d26c8068c64ac1ea5246f3b0d27ab

    /**
     * Test buildRules method
     *
     * @return void
     */
<<<<<<< HEAD
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
=======
    /*public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }*/
>>>>>>> 77ffb0775b5d26c8068c64ac1ea5246f3b0d27ab
}
