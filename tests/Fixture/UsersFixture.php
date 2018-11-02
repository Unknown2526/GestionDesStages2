<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 *
 */
class UsersFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'username' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'password' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'role_id' => ['type' => 'string', 'length' => 30, 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'file_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'uuid' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'verify' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
<<<<<<< HEAD
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
=======
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
>>>>>>> 77ffb0775b5d26c8068c64ac1ea5246f3b0d27ab
        '_indexes' => [
            'role_id' => ['type' => 'index', 'columns' => ['role_id'], 'length' => []],
            'image_id' => ['type' => 'index', 'columns' => ['file_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'users_ibfk_1' => ['type' => 'foreign', 'columns' => ['role_id'], 'references' => ['roles', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'users_ibfk_2' => ['type' => 'foreign', 'columns' => ['file_id'], 'references' => ['files', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
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
                'id' => 1,
<<<<<<< HEAD
                'username' => 'Lorem ipsum dolor sit amet',
                'password' => 'Lorem ipsum dolor sit amet',
                'role_id' => 'Lorem ipsum dolor sit amet',
                'file_id' => 1,
                'uuid' => 'Lorem ipsum dolor sit amet',
                'verify' => 1,
                'created' => '2018-10-10 03:31:06',
                'modified' => '2018-10-10 03:31:06'
=======
                'username' => 'milieu',
                'password' => 'milieu',
                'role_id' => 'milieu',
                'file_id' => null,
                'uuid' => '',
                'verify' => 1,
                'created' => null,
                'modified' => null
            ],
            [
                'id' => 2,
                'username' => 'admin',
                'password' => 'admin',
                'role_id' => 'admin',
                'file_id' => null,
                'uuid' => '',
                'verify' => 1,
                'created' => null,
                'modified' => null
            ],
            [
                'id' => 3,
                'username' => 'etudiant',
                'password' => 'etudiant',
                'role_id' => 'etudiant',
                'file_id' => null,
                'uuid' => '',
                'verify' => 1,
                'created' => null,
                'modified' => null
>>>>>>> 77ffb0775b5d26c8068c64ac1ea5246f3b0d27ab
            ],
        ];
        parent::init();
    }
}
