<?php

namespace Develop;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ModuleManager\ModuleManager;

use Develop\Model\users;
use Develop\Model\usersTable;

use Develop\Model\useraddresstodelivery;
use Develop\Model\useraddresstodeliveryTable;

use Develop\Model\useraddressofpickup;
use Develop\Model\useraddressofpickupTable;

class Module {

    public function onBootstrap(MvcEvent $e) {
        $eventManager = $e->getApplication()->getEventManager();
        $eventManager->attach('dispatch', array($this, 'loadConfiguration'), MvcEvent::EVENT_DISPATCH_ERROR, function($e) {
            $result = $e->getResult();
            $result->setTerminal(TRUE);
        }, 100);
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
    }

    public function loadConfiguration(MvcEvent $e) {
        $sm = $e->getApplication()->getServiceManager();
        $controller = $e->getRouteMatch()->getParam('controller');
        if (0 !== strpos($controller, __NAMESPACE__, 0)) {
            //if not this module
            return;
        }
        //if this module
        $exceptionstrategy = $sm->get('ViewManager')->getExceptionStrategy();
        $exceptionstrategy->setExceptionTemplate('error/index');
    }

    public function getAutoloaderConfig() {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getConfig() {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getServiceConfig() {
        return array(
            'factories' => array(
                'Develop\Model\usersTable' => function($sm) {
                    $tableGateway = $sm->get('usersTableGateway');
                    $table = new usersTable($tableGateway);
                    return $table;
                },
                'usersTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new users());
                    return new TableGateway('users', $dbAdapter, null, $resultSetPrototype);
                },
                'Develop\Model\useraddresstodeliveryTable' => function($sm) {
                    $tableGateway = $sm->get('useraddresstodeliveryTableGateway');
                    $table = new useraddresstodeliveryTable($tableGateway);
                    return $table;
                },
                'useraddresstodeliveryTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new useraddresstodelivery());
                    return new TableGateway('useraddresstodelivery', $dbAdapter, null, $resultSetPrototype);
                },
                'Develop\Model\useraddressofpickupTable' => function($sm) {
                    $tableGateway = $sm->get('useraddressofpickupTableGateway');
                    $table = new useraddressofpickupTable($tableGateway);
                    return $table;
                },
                'useraddressofpickupTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new useraddressofpickup());
                    return new TableGateway('useraddressofpickup', $dbAdapter, null, $resultSetPrototype);
                },
            ),
        );
    }

}

?>
