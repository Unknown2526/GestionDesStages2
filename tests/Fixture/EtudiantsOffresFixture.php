<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EtudiantsOffresFixture
 *
 */
class EtudiantsOffresFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'etudiant_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'offre_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'offre_id' => ['type' => 'index', 'columns' => ['offre_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['etudiant_id', 'offre_id'], 'length' => []],
            'etudiants_offres_ibfk_1' => ['type' => 'foreign', 'columns' => ['etudiant_id'], 'references' => ['etudiants', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'etudiants_offres_ibfk_2' => ['type' => 'foreign', 'columns' => ['offre_id'], 'references' => ['offres', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_unicode_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'etudiant_id' => 1,
                'offre_id' => 1,
                'created' => '2018-10-24 13:47:13',
                'modified' => '2018-10-24 13:47:13'
            ],
        ];
        parent::init();
    }
}
