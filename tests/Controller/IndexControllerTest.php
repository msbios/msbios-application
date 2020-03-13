<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBiosTest\Application\Controller;

use Laminas\Stdlib\ArrayUtils;
use Laminas\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;
use MSBios\Application\Controller\IndexController;

// use Zend\Stdlib\ArrayUtils;
// use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

/**
 * Class IndexControllerTest
 * @package MSBiosTest\Application\Controller
 */
class IndexControllerTest extends AbstractHttpControllerTestCase
{
    /**
     *
     */
    protected function setUp(): void
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

    /**
     * @return $this
     * @throws \Exception
     */
    public function testIndexActionCanBeAccessed(): self
    {
        $this->dispatch('/', 'GET');
        $this->assertResponseStatusCode(200);
        $this->assertModuleName('MSBios');
        $this->assertControllerName(IndexController::class);
        $this->assertControllerClass('IndexController');
        $this->assertMatchedRouteName('home');

        return $this;
    }

    /**
     * @return $this
     * @throws \Exception
     */
    public function testIndexActionViewModelTemplateRenderedWithinLayout(): self
    {
        $this->dispatch('/', 'GET');
        $this->assertQuery('.container .jumbotron');

        return $this;
    }

    /**
     * @return $this
     * @throws \Exception
     */
    public function testInvalidRouteDoesNotCrash(): self
    {
        $this->dispatch('/invalid/route', 'GET');
        $this->assertResponseStatusCode(404);

        return $this;
    }
}
