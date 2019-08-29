<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
return [

    'navigation' => [
        'default' => [
            'home' => [
                'label' => 'Home',
                'route' => 'home',
            ],
            'page-1' => [
                'label' => 'Page #1',
                'uri' => '#page1',
            ],
            'page-2' => [
                'label' => 'Page #2',
                'uri' => '#page2',
                'pages' => [
                    'page-2-1' => [
                        'label' => 'Page #2.1',
                        'uri' => '#page2.1',
                    ],
                ]
            ],
        ],
    ],

    \MSBios\Assetic\Module::class => [
        'maps' => [
            // css
            'default/css/bootstrap.min.css' =>
                __DIR__ . '/../../themes/default/public/css/bootstrap.min.css',
            'default/css/bootstrap-theme.min.css' =>
                __DIR__ . '/../../themes/default/public/css/bootstrap-theme.min.css',
            'default/css/style.css' =>
                __DIR__ . '/../../themes/default/public/css/style.css',
            // js
            'default/js/jquery-3.1.0.min.js' =>
                __DIR__ . '/../../themes/default/public/js/jquery-3.1.0.min.js',
            'default/js/bootstrap.min.js' =>
                __DIR__ . '/../../themes/default/public/js/bootstrap.min.js',
            // imgs
            'default/img/zf-logo-mark.svg' =>
                __DIR__ . '/../../themes/default/public/img/zf-logo-mark.svg',
        ],
    ],

    'view_manager' => [
        'strategies' => [
            'ViewJsonStrategy',
        ],
    ],
];
