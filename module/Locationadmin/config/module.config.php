<?php

/*
* To change this license header, choose License Headers in Project Properties.
* To change this template file, choose Tools | Templates
* and open the template in the editor.
*/

return array(
	'controllers' => array(
		'invokables' => array(
			'Login\Controller\Login' => 'Login\Controller\LoginController'
		),
	),
	// The following section is new and should be added to your file
	'router' => array(
		'routes' => array(
			'Login' => array(
				'type'    => 'segment',
				'options' => array(
					'route'    => '/login[/:action][/:id][/:pId]',
					'constraints' => array(
						'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                     ),
					'defaults' => array(
						'controller' => 'Login\Controller\Login',
						'action'     => 'index',
					),
				),
			),
		),
	),

	'view_manager' => array(
		'template_map' => array(
			'layout/layout' => __DIR__ . '/../../../../Front/view/layout/layout.phtml',
		),
		'template_path_stack' => array(
			__DIR__ . '/../view',
		),
	),
);
