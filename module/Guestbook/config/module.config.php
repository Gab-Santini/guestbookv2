<?php
return array(
    'router' => array(
        'routes' => array(
            'guestbook' => array(
                'type' => 'literal',
                'options' => array(
                    'route'    => '/guestbook',
                    'defaults' => array(
                        'controller' => 'guestbook-index',
                        'action'     => 'index',
                    ),
                ),
            ),
            'book' => array(
                'type' => 'literal',
                'options' => array(
                    'route'    => '/book',
                    'defaults' => array(
                        'controller' => 'guestbook-index',
                        'action'     => 'book',
                    ),
                ),
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'guestbook-index' => 'Guestbook\Controller\IndexController'
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'guestbook' => __DIR__ . '/../view',
        ),
    ),
);