<?php
namespace App\Test\TestCase\Controller;

use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\UsersController Test Case
 */
class UsersControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.users',
        //'app.roles',
        //'app.administrateurs',
        'app.etudiants',
        'app.milieudestages',
        'app.offres'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->get('/users');
        $this->assertResponseSuccess();
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->get('/users/view/1');
        $this->assertResponseSuccess();
    }

    /**
     * Test add method
     *
     * @return void
     */
    /*public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }*/

    /**
     * Test edit method
     *
     * @return void
     */
    /*public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }*/

    /**
     * Test delete method
     *
     * @return void
     */
    /*public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }*/
    
    /*public function testLogin()
    {
        $this->enableCsrfToken();
        $this->enableSecurityToken();
        
        $this->post('/', [
            'username' => 'milieu',
            'password' => 'milieu'
        ]);

        $expected = [
            'id' => 10,
            'username' => 'milieu',
            'password' => 'milieu',
            'role_id' => 'milieu',
            'file_id' => null,
            'uuid' => '',
            'verify' => 1,
            'created' => '2018-09-23 03:17:22',
            'modified' => '2018-10-10 04:09:49'
        ];
        $this->assertSession($expected, 'Auth.User');

        $expected = [
            'controller' => 'Offres',
            'action' => 'index'
        ];
        $this->assertRedirect($expected);
    }*/
    
    public function testLoginFailure()
    {
        $this->enableCsrfToken();
        $this->enableSecurityToken();

        $this->post('/', [
            'username' => 'milieu',
            'password' => 'admin'
        ]);

        $this->assertNull($this->_requestSession->read('Auth.User'));

        $this->assertNoRedirect();
    }
}
