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
        'app.users'
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
=======
    /*public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }*/
    
    public function testFindEtudiant()
    {
        $query = $this->Etudiants->find('etudiant');
        $this->assertInstanceOf('Cake\ORM\Query', $query);
        $result = $query->hydrate(false)->toArray();
        $expected = [
            [
                'id' => 1,
                'nom' => 'Lorem ipsum dolor sit amet',
                'prenom' => 'Lorem ipsum dolor sit amet',
                'telephone' => 'Lorem ipsum dolor sit amet',
                'courriel' => 'Lorem ipsum dolor sit amet',
                'info_supp' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'actif' => 1,
                'user_id' => 1,
                'created' => null,
                'modified' => null
            ]
        ];

        $this->assertEquals($expected, $result);
>>>>>>> 77ffb0775b5d26c8068c64ac1ea5246f3b0d27ab
    }
}
