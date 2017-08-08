<?php

namespace Corporateadmin;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Corporateadmin\Model\corporateadmins;
use Corporateadmin\Model\corporateadminsTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;


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
                'Corporateadmin\Model\corporateadminsTable' => function($sm) {
                    $tableGateway = $sm->get('corporateadminsTableGateway');
                    $table = new corporateadminsTable($tableGateway);
                    return $table;
                },
                'corporateadminsTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new corporateadmins());
                    return new TableGateway('corporateadmins', $dbAdapter, null, $resultSetPrototype);
                },
            ),
        );
    }

}

?>
