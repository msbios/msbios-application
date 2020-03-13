<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Application;

// use Zend\Router\Http\Literal;
// use Zend\Router\Http\Segment;
// use Zend\ServiceManager\Factory\InvokableFactory;

use Laminas\Router\Http\Literal;
use Laminas\Router\Http\Segment;
use Laminas\ServiceManager\Factory\InvokableFactory;

return [
    'service_manager' => [
        'factories' => [
            ListenerAggregate::class =>
                InvokableFactory::class
        ]
    ],
    'router' => [
        'routes' => [
            'home' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action' => 'index',
                    ],
                ],
            ],
            'application' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/application[/:action]',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action' => 'index',
                    ],
                ],
            ],
        ],
    ],

    'controllers' => [
        'factories' => [
            Controller\IndexController::class =>
                InvokableFactory::class,
        ]
    ],

    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => [
            'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],

    Module::class => [
        'error_reporting' => E_ALL & ~E_NOTICE & ~E_STRICT,
        'date_default_timezone_set' => 'Europe/Kiev',
        'mb_internal_encoding' => "UTF-8",
        'ini_set' => [
            'memory_limit' => "512M",
            'short_open_tag' => 1,
            'magic_quotes_gpc' => 0,
            'magic_quotes_runtime' => 0,

            // this is for simple_dom_html
            'pcre.recursion-limit' => 100000,
            'session.save_path' => './data/session'
        ],
        'version_compare' => '5.3.0'
    ],

    'listeners' => [
        ListenerAggregate::class
    ]
];
