<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OffresTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OffresTable Test Case
 */
class OffresTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OffresTable
     */
    public $Offres;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.offres',
        'app.regions',
        'app.users',
        'app.milieudestages'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Offres') ? [] : ['className' => OffresTable::class];
        $this->Offres = TableRegistry::getTableLocator()->get('Offres', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Offres);

        parent::tearDown();
    }
    
    public function testAdd()
    {
        $data = [
            'id' => 1,
            'titre' => 'Concierge',
            'region_id' => 1,
            'tache' => 'Lorem ipsum dolor sit amet',
            'responsabilite' => 'Lorem ipsum dolor sit amet',
            'user_id' => 1,
            'milieudestage_id' => 1,
            'created' => null,
            'modified' => null
        ];
        
        $data2 = [
            'id' => 2,
            'titre' => 'Concierge2',
            'region_id' => 1,
            'tache' => 'Lorem ipsum dolor sit amet',
            'responsabilite' => 'Lorem ipsum dolor sit amet',
            'user_id' => 1,
            'milieudestage_id' => 1,
            'created' => null,
            'modified' => null
        ];
        
        $firstCount = $this->Offres->find()->count();
        $firstOffre = $this->Offres->newEntity($data);
        $secondOffre = $this->Offres->newEntity($data2);
        $this->Offres->save($firstOffre);
        $this->Offres->save($secondOffre);
        $count = $this->Offres->find()->count();
    
        $this->assertEquals($count, $firstCount + 2);
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
