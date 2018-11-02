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
    /*public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }*/

    /**
     * Test validationDefault method
     *
     * @return void
     */
    /*public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }*/

    /**
     * Test buildRules method
     *
     * @return void
     */
    /*public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }*/
}
