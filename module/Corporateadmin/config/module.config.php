<?php

/*
* To change this license header, choose License Headers in Project Properties.
* To change this template file, choose Tools | Templates
* and open the template in the editor.
*/

return array(
	'controllers' => array(
		'invokables' => array(
			'Corporateadmin\Controller\Auth' => 'Corporateadmin\Controller\AuthController',
            'Corporateadmin\Controller\Show' => 'Corporateadmin\Controller\ShowController'
		),
	),
	// The following section is new and should be added to your file
	'router' => array(
		'routes' => array(
            'home' => array(
                'type' => 'Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Corporateadmin\Controller',
                        'controller' => 'Corporateadmin\Controller\Show',
                        'action'     => 'index',
                    ),
                ),
            ),
			'Auth' => array(
				'type'    => 'segment',
				'options' => array(
					'route'    => '/corp[/:action][/:id][/:pId]',
					'constraints' => array(
						'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                     ),
					'defaults' => array(
						'controller' => 'Corporateadmin\Controller\Auth',
						'action'     => 'index',
					),
				),
			),
        'Show' => array(
				'type'    => 'segment',
				'options' => array(
					'route'    => '/show[/:action][/:id][/:pId]',
					'constraints' => array(
						'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                     ),
					'defaults' => array(
						'controller' => 'Corporateadmin\Controller\Show',
						'action'     => 'index',
					),
				),
			),
		),
	),

	'view_manager' => array(
		'template_map' => array(
			'layout/layout' => __DIR__ . '/../view/layout/',
		),
		'template_path_stack' => array(
			__DIR__ . '/../view',
		),
	),
    'controller_plugins' => array(
        'invokables' => array(
              'modelplugin' => 'Plugin\Controller\Plugin\modelplugin'
        )
    ),
);
