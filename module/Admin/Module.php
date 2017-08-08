<?php

namespace Admin;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ModuleManager\ModuleManager;
use Admin\Model\admin;
use Admin\Model\adminTable;
use Admin\Model\homePageBanner;
use Admin\Model\homePageBannerTable;
use Admin\Model\officeContact;
use Admin\Model\officeContactTable;

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
                'Admin\Model\adminTable' => function($sm) {
                    $tableGateway = $sm->get('adminTableGateway');
                    $table = new adminTable($tableGateway);
                    return $table;
                },
                'adminTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new admin());
                    return new TableGateway('admin', $dbAdapter, null, $resultSetPrototype);
                },
                'Admin\Model\homePageBannerTable' => function($sm) {
                    $tableGateway = $sm->get('homePageBannerTableGateway');
                    $table = new homePageBannerTable($tableGateway);
                    return $table;
                },
                'homePageBannerTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new homePageBanner());
                    return new TableGateway('homePageBanner', $dbAdapter, null, $resultSetPrototype);
                },
                'Admin\Model\officeContactTable' => function($sm) {
                    $tableGateway = $sm->get('officeContactTableGateway');
                    $table = new officeContactTable($tableGateway);
                    return $table;
                },
                'officeContactTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new officeContact());
                    return new TableGateway('officeContact', $dbAdapter, null, $resultSetPrototype);
                },
            ),
        );
    }

}

?>
