<?php

/*
* To change this license header, choose License Headers in Project Properties.
* To change this template file, choose Tools | Templates
* and open the template in the editor.
*/

return array(
	'controllers' => array(
		'invokables' => array(
			'Superadmin\Controller\Login'     => 'Superadmin\Controller\LoginController',
            
		),
	),
	// The following section is new and should be added to your file
	'router' => array(
		'routes' => array(
			'Superadmin' => array(
				'type'    => 'segment',
				'options' => array(
					'route'    => '/superadmin/login[/:action][/:id][/:pId]',
					'constraints' => array(
						'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                     ),
					'defaults' => array(
						'controller' => 'Superadmin\Controller\Login',
						'action'     => 'index',
					),
				),
			),
            
		),
	),

	'view_manager' => array(
		'template_map' => array(
			'layout/layout' => __DIR__ . '/../view/layout/layoutadmin.phtml',
		),
		'template_path_stack' => array(
			__DIR__ . '/../view',
		),
		'strategies' => array(
			'ViewJsonStrategy',
		)
	),
);
