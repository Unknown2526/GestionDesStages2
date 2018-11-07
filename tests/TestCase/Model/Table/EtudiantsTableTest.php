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
    
    public function testAdd()
    {
        $data = [
            'id' => 1,
            'nom' => 'Chow',
            'prenom' => 'Anthony',
            'telephone' => '911',
            'courriel' => 'anthonychow8@gmail.com',
            'info_supp' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'actif' => 1,
            'user_id' => 3,
            'created' => null,
            'modified' => null
        ];
        
        $data2 = [
            'id' => 1,
            'nom' => 'a',
            'prenom' => 'b',
            'telephone' => '911',
            'courriel' => 'ab@gmail.com',
            'info_supp' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'actif' => 1,
            'user_id' => 3,
            'created' => null,
            'modified' => null
        ];
        
        $firstCount = $this->Etudiants->find()->count();
        $firstEtud = $this->Etudiants->newEntity($data);
        $secondEtud = $this->Etudiants->newEntity($data2);
        $this->Etudiants->save($firstEtud);
        $this->Etudiants->save($secondEtud);
        $count = $this->Etudiants->find()->count();
    
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
    
    public function testFindEtudiant()
    {
        $query = $this->Etudiants->find('all');
        $result = $query->first()->toArray();
        $expected = [
                'id' => 1,
                'nom' => 'Chow',
                'prenom' => 'Anthony',
                'telephone' => '911',
                'courriel' => 'anthonychow8@gmail.com',
                'info_supp' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'actif' => 1,
                'user_id' => 3,
                'created' => null,
                'modified' => null
        ];

        $this->assertEquals($expected, $result);
    }
}
