<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         1.2.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Test\TestCase\Controller;

use App\Controller\PagesController;
use Cake\Core\App;
use Cake\Core\Configure;
use Cake\Http\Response;
use Cake\Http\ServerRequest;
use Cake\TestSuite\IntegrationTestCase;
use Cake\View\Exception\MissingTemplateException;

/**
 * PagesControllerTest class
 */
class PagesControllerTest extends IntegrationTestCase
{
    /**
     * testMultipleGet method
     *
     * @return void
     */
<<<<<<< HEAD
    public function testMultipleGet()
=======
    /*public function testMultipleGet()
>>>>>>> 77ffb0775b5d26c8068c64ac1ea5246f3b0d27ab
    {
        $this->get('/');
        $this->assertResponseOk();
        $this->get('/');
        $this->assertResponseOk();
<<<<<<< HEAD
    }
=======
    }*/
>>>>>>> 77ffb0775b5d26c8068c64ac1ea5246f3b0d27ab

    /**
     * testDisplay method
     *
     * @return void
     */
<<<<<<< HEAD
    public function testDisplay()
=======
    /*public function testDisplay()
>>>>>>> 77ffb0775b5d26c8068c64ac1ea5246f3b0d27ab
    {
        $this->get('/pages/home');
        $this->assertResponseOk();
        $this->assertResponseContains('CakePHP');
        $this->assertResponseContains('<html>');
<<<<<<< HEAD
    }
=======
    }*/
>>>>>>> 77ffb0775b5d26c8068c64ac1ea5246f3b0d27ab

    /**
     * Test that missing template renders 404 page in production
     *
     * @return void
     */
<<<<<<< HEAD
    public function testMissingTemplate()
=======
    /*public function testMissingTemplate()
>>>>>>> 77ffb0775b5d26c8068c64ac1ea5246f3b0d27ab
    {
        Configure::write('debug', false);
        $this->get('/pages/not_existing');

        $this->assertResponseError();
        $this->assertResponseContains('Error');
<<<<<<< HEAD
    }
=======
    }*/
>>>>>>> 77ffb0775b5d26c8068c64ac1ea5246f3b0d27ab

    /**
     * Test that missing template in debug mode renders missing_template error page
     *
     * @return void
     */
<<<<<<< HEAD
    public function testMissingTemplateInDebug()
=======
    /*public function testMissingTemplateInDebug()
>>>>>>> 77ffb0775b5d26c8068c64ac1ea5246f3b0d27ab
    {
        Configure::write('debug', true);
        $this->get('/pages/not_existing');

        $this->assertResponseFailure();
        $this->assertResponseContains('Missing Template');
        $this->assertResponseContains('Stacktrace');
        $this->assertResponseContains('not_existing.ctp');
<<<<<<< HEAD
    }
=======
    }*/
>>>>>>> 77ffb0775b5d26c8068c64ac1ea5246f3b0d27ab

    /**
     * Test directory traversal protection
     *
     * @return void
     */
<<<<<<< HEAD
    public function testDirectoryTraversalProtection()
=======
    /*public function testDirectoryTraversalProtection()
>>>>>>> 77ffb0775b5d26c8068c64ac1ea5246f3b0d27ab
    {
        $this->get('/pages/../Layout/ajax');
        $this->assertResponseCode(403);
        $this->assertResponseContains('Forbidden');
<<<<<<< HEAD
    }
=======
    }*/
>>>>>>> 77ffb0775b5d26c8068c64ac1ea5246f3b0d27ab
}
