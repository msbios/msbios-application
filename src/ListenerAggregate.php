<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Application;

// use Zend\EventManager\AbstractListenerAggregate;
// use Zend\EventManager\EventInterface;
// use Zend\EventManager\EventManagerInterface;
// use Zend\ModuleManager\Feature\BootstrapListenerInterface;
// use Zend\Mvc\MvcEvent;
use Laminas\EventManager\AbstractListenerAggregate;
use Laminas\EventManager\EventInterface;
use Laminas\EventManager\EventManagerInterface;
use Laminas\ModuleManager\Feature\BootstrapListenerInterface;
use Laminas\Mvc\MvcEvent;

/**
 * Class ListenerAggregate
 *
 * @package MSBios\Application
 */
class ListenerAggregate extends AbstractListenerAggregate implements BootstrapListenerInterface
{
    /**
     * @inheritdoc
     *
     * @param EventManagerInterface $events
     * @param int $priority
     */
    public function attach(EventManagerInterface $events, $priority = 1)
    {
        $this->listeners[] = $events
            ->attach(MvcEvent::EVENT_BOOTSTRAP, [$this, 'onBootstrap'], $priority);
    }

    /**
     * @inheritdoc
     *
     * @param EventInterface $e
     * @return array|void
     */
    public function onBootstrap(EventInterface $e)
    {
        /** @var array $config */
        $config = $e
            ->getTarget()
            ->getServiceManager()
            ->get(Module::class);

        // try to set system-internal variables
        error_reporting($config['error_reporting']);
        date_default_timezone_set($config['date_default_timezone_set']);

        if (php_sapi_name() === 'cli-server') {
            /**
             * @var string $varname
             * @var string $newvalue
             */
            foreach ($config['ini_set'] as $varname => $newvalue) {
                @ini_set($varname, $newvalue);
            }
        }

        mb_internal_encoding("UTF-8");

        // check some system variables
        if (version_compare(PHP_VERSION, $config['version_compare'], "<")) {
            /** @var string $message */
            $message = sprintf(
                "Application requires at least PHP version %s your PHP version is: %s",
                $config['version_compare'],
                PHP_VERSION
            );
        }

        if (get_magic_quotes_gpc()) {
            /** @var string $message */
            $message = "Application requires magic_quotes_gpc OFF";
        }
    }
}
