<?php

namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;
use Zend\Session\Container;
use Zend\Session\Config\StandardConfig;
use Zend\Session\SessionManager;

class VanController extends AbstractActionController {
    
    public function __construct() {
        $userSessionAdmin 	= 	new Container('username');
		$sessionidAdmin 	= 	$userSessionAdmin->offsetGet('admin_id');
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $dynamicPath = $protocol.$_SERVER['HTTP_HOST'];
        if($sessionidAdmin == "")
		{
		header("Location:".$dynamicPath."/adminlogin/login");
			exit;
		}
    }


    public function indexAction()
    {
        $this->layout('layout/adminlayout.phtml');
        $modelPlugin = $this->modelplugin();
        $dynamicPath = $modelPlugin->dynamicPath();
        $currentPageURL = $modelPlugin->curPageURL();
        $href = explode("/", $currentPageURL);
        $controller = @$href[3];
        $action = @$href[4];
        $this->layout()->setVariables(array('controller' => $controller, 'action' => $action));
        return new ViewModel(array('dynamicPath' => $dynamicPath));
    }

}
