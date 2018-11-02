<?php
namespace App\Test\TestCase\Controller;

<<<<<<< HEAD
use App\Controller\UsersController;
=======
>>>>>>> 77ffb0775b5d26c8068c64ac1ea5246f3b0d27ab
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
<<<<<<< HEAD
        'app.roles',
        'app.administrateurs',
=======
        //'app.roles',
        //'app.administrateurs',
>>>>>>> 77ffb0775b5d26c8068c64ac1ea5246f3b0d27ab
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
<<<<<<< HEAD
        $this->markTestIncomplete('Not implemented yet.');
=======
        $this->get('/users');
        $this->assertResponseSuccess();
>>>>>>> 77ffb0775b5d26c8068c64ac1ea5246f3b0d27ab
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
<<<<<<< HEAD
        $this->markTestIncomplete('Not implemented yet.');
=======
        $this->get('/users/view/1');
        $this->assertResponseSuccess();
>>>>>>> 77ffb0775b5d26c8068c64ac1ea5246f3b0d27ab
    }

    /**
     * Test add method
     *
     * @return void
     */
<<<<<<< HEAD
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
=======
    /*public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }*/
>>>>>>> 77ffb0775b5d26c8068c64ac1ea5246f3b0d27ab

    /**
     * Test edit method
     *
     * @return void
     */
<<<<<<< HEAD
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
=======
    /*public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }*/
>>>>>>> 77ffb0775b5d26c8068c64ac1ea5246f3b0d27ab

    /**
     * Test delete method
     *
     * @return void
     */
<<<<<<< HEAD
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
=======
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
>>>>>>> 77ffb0775b5d26c8068c64ac1ea5246f3b0d27ab
    }
}
