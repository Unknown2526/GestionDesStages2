<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EtudiantsOffresTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EtudiantsOffresTable Test Case
 */
class EtudiantsOffresTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EtudiantsOffresTable
     */
    public $EtudiantsOffres;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.etudiants_offres',
        'app.etudiants',
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
        $config = TableRegistry::getTableLocator()->exists('EtudiantsOffres') ? [] : ['className' => EtudiantsOffresTable::class];
        $this->EtudiantsOffres = TableRegistry::getTableLocator()->get('EtudiantsOffres', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->EtudiantsOffres);

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
     * Test buildRules method
     *
     * @return void
     */
    /*public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }*/
}
