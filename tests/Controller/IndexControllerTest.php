<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBiosTest\Application\Controller;

use MSBios\Application\Controller\IndexController;
use Zend\Stdlib\ArrayUtils;
use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

/**
 * Class IndexControllerTest
 * @package MSBiosTest\Application\Controller
 */
class IndexControllerTest extends AbstractHttpControllerTestCase
{
    /**
     *
     */
    public function setUp()
    {
        // The module configuration should still be applicable for tests.
        // You can override configuration here with test case specific values,
        // such as sample view templates, path stacks, module_listener_options,
        // etc.
        $configOverrides = [];

        $this->setApplicationConfig(ArrayUtils::merge(
            include __DIR__ . '/../../config/application.config.php',
            $configOverrides
        ));

        parent::setUp();
    }

    public function testIndexActionCanBeAccessed()
    {
        $this->dispatch('/', 'GET');
        $this->assertResponseStatusCode(200);
        // $this->assertModuleName('Zend\Application');
        // $this->assertControllerName(IndexController::class); // as specified in router's controller name alias
        // $this->assertControllerClass(IndexController::class);
        $this->assertMatchedRouteName('home');
    }

//    public function testIndexActionViewModelTemplateRenderedWithinLayout()
//    {
//        $this->dispatch('/', 'GET');
//        $this->assertQuery('.container .jumbotron');
//    }

//    public function testInvalidRouteDoesNotCrash()
//    {
//        $this->dispatch('/invalid/route', 'GET');
//        $this->assertResponseStatusCode(404);
//    }
}
