<?php

/*
* To change this license header, choose License Headers in Project Properties.
* To change this template file, choose Tools | Templates
* and open the template in the editor.
*/

return array(
	'controllers' => array(
		'invokables' => array(
			'Admin\Controller\Adminlogin' => 'Admin\Controller\AdminloginController',
			'Admin\Controller\Banner' => 'Admin\Controller\BannerController',
			'Admin\Controller\Contact' => 'Admin\Controller\ContactController',
			'Admin\Controller\Carrer' => 'Admin\Controller\CarrerController',
			'Admin\Controller\User' => 'Admin\Controller\UserController',
			'Admin\Controller\Driver' => 'Admin\Controller\DriverController',
			'Admin\Controller\Officeaddress' => 'Admin\Controller\OfficeaddressController',
			'Admin\Controller\Coupon' => 'Admin\Controller\CouponController',
			'Admin\Controller\Officelist' => 'Admin\Controller\OfficelistController',
			'Admin\Controller\Payment' => 'Admin\Controller\PaymentController',
			'Admin\Controller\Van' => 'Admin\Controller\VanController',
			'Admin\Controller\Finance' => 'Admin\Controller\FinanceController',
			'Admin\Controller\Order' => 'Admin\Controller\OrderController'
		),
	),
	// The following section is new and should be added to your file
	'router' => array(
		'routes' => array(

            //For Adminlogin Controller
			'adminlogin' => array(
				'type'    => 'segment',
				'options' => array(
					'route'    => '/adminlogin[/:action][/:id][/:pId]',
					'constraints' => array(
						'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                     ),
					'defaults' => array(
						'controller' => 'Admin\Controller\Adminlogin',
						'action'     => 'index',
					),
				),
			),

            //For Contact Controller
			'contact' => array(
				'type'    => 'segment',
				'options' => array(
					'route'    => '/contact[/:action][/:id][/:pId]',
					'constraints' => array(
						'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                     ),
					'defaults' => array(
						'controller' => 'Admin\Controller\Contact',
						'action'     => 'index',
					),
				),
			),

            //For Banner Controller
			'banner' => array(
				'type'    => 'segment',
				'options' => array(
					'route'    => '/banner[/:action][/:id][/:pId]',
					'constraints' => array(
						'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                     ),
					'defaults' => array(
						'controller' => 'Admin\Controller\Banner',
						'action'     => 'index',
					),
				),
			),

            //For Carrer Controller
			'carrer' => array(
				'type'    => 'segment',
				'options' => array(
					'route'    => '/carrer[/:action][/:id][/:pId]',
					'constraints' => array(
						'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                     ),
					'defaults' => array(
						'controller' => 'Admin\Controller\Carrer',
						'action'     => 'index',
					),
				),
			),

            //For User Controller
			'user' => array(
				'type'    => 'segment',
				'options' => array(
					'route'    => '/user[/:action][/:id][/:pId]',
					'constraints' => array(
						'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                     ),
					'defaults' => array(
						'controller' => 'Admin\Controller\User',
						'action'     => 'index',
					),
				),
			),

            //For Driver Controller
			'driver' => array(
				'type'    => 'segment',
				'options' => array(
					'route'    => '/driver[/:action][/:id][/:pId]',
					'constraints' => array(
						'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                     ),
					'defaults' => array(
						'controller' => 'Admin\Controller\Driver',
						'action'     => 'index',
					),
				),
			),

            //For Officeaddress Controller
			'officeaddress' => array(
				'type'    => 'segment',
				'options' => array(
					'route'    => '/officeaddress[/:action][/:id][/:pId]',
					'constraints' => array(
						'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                     ),
					'defaults' => array(
						'controller' => 'Admin\Controller\Officeaddress',
						'action'     => 'index',
					),
				),
			),

            //For Coupon Controller
			'coupon' => array(
				'type'    => 'segment',
				'options' => array(
					'route'    => '/coupon[/:action][/:id][/:pId]',
					'constraints' => array(
						'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                     ),
					'defaults' => array(
						'controller' => 'Admin\Controller\Coupon',
						'action'     => 'index',
					),
				),
			),

            //For Officelist Controller
			'officelist' => array(
				'type'    => 'segment',
				'options' => array(
					'route'    => '/officelist[/:action][/:id][/:pId]',
					'constraints' => array(
						'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                     ),
					'defaults' => array(
						'controller' => 'Admin\Controller\Officelist',
						'action'     => 'index',
					),
				),
			),

            //For Payment Controller
			'payment' => array(
				'type'    => 'segment',
				'options' => array(
					'route'    => '/payment[/:action][/:id][/:pId]',
					'constraints' => array(
						'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                     ),
					'defaults' => array(
						'controller' => 'Admin\Controller\Payment',
						'action'     => 'index',
					),
				),
			),

            //For Van Controller
			'van' => array(
				'type'    => 'segment',
				'options' => array(
					'route'    => '/van[/:action][/:id][/:pId]',
					'constraints' => array(
						'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                     ),
					'defaults' => array(
						'controller' => 'Admin\Controller\Van',
						'action'     => 'index',
					),
				),
			),

            //For Finance Controller
			'finance' => array(
				'type'    => 'segment',
				'options' => array(
					'route'    => '/finance[/:action][/:id][/:pId]',
					'constraints' => array(
						'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                     ),
					'defaults' => array(
						'controller' => 'Admin\Controller\Finance',
						'action'     => 'index',
					),
				),
			),

            //For Order Controller
			'order' => array(
				'type'    => 'segment',
				'options' => array(
					'route'    => '/order[/:action][/:id][/:pId]',
					'constraints' => array(
						'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                     ),
					'defaults' => array(
						'controller' => 'Admin\Controller\Order',
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
