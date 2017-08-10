<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
return [
    'identifier' => 'default',
    'title' => 'Default Application Theme',
    'description' => 'Default Application Theme Description',

    'template_map' => [
        // Template Map
    ],

    'template_path_stack' => [
        __DIR__ . '/view/',
    ],

    'assetic_manager' => [

        'collections' => [
        ],

        'paths' => [
            __DIR__ . '/public/'
        ],

        'maps' => [
        ],
    ],

    'widget_manager' => [
        'template_map' => [
        ],
        'template_path_stack' => [
            __DIR__ . '/widget/'
        ],
    ],
];