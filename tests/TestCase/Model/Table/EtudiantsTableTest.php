<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EtudiantsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EtudiantsTable Test Case
 */
class EtudiantsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EtudiantsTable
     */
    public $Etudiants;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.etudiants',
        'app.users',
        'app.offres'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Etudiants') ? [] : ['className' => EtudiantsTable::class];
        $this->Etudiants = TableRegistry::getTableLocator()->get('Etudiants', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Etudiants);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
