<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

return array(
    'controllers' => array(
        'invokables' => array(
            'Plugin\Controller\Logintest' => 'Plugin\Controller\LogintestController'
        ),
    ),
    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            // this is for controller
            'logintest' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/logintest[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        'controller' => 'Plugin\Controller\Logintest',
                        'action' => 'index',
                    ),
                ),
            ),
        // this is for test controller
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'Login' => __DIR__ . '/../view',
        ),
    ),
    'controller_plugins' => array(
        'invokables' => array(
              'modelplugin' => 'Plugin\Controller\Plugin\modelplugin',
              'routeplugin' => 'Plugin\Controller\Plugin\routeplugin',
              'imageuploadplugin' =>'Plugin\Controller\Plugin\imageuploadplugin'
        )
    ),
);
