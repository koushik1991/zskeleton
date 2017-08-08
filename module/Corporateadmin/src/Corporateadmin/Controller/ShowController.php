<?php

namespace Corporateadmin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;
use Zend\Session\Container;
use Zend\Session\Config\StandardConfig;
use Zend\Session\SessionManager;

class ShowController extends AbstractActionController {


    public function indexAction(){
        $modelPlugin = $this->modelplugin();
        $dynamicPath = $modelPlugin->dynamicPath();
        $currentPageURL = $modelPlugin->curPageURL();
        $href = explode("/", $currentPageURL);
        $controller = @$href[3];
        $action = @$href[4];
        $this->layout()->setVariables(array('controller' => $controller, 'action' => $action));
        $this->layout('layout/corplayout.phtml');
        return new ViewModel(); 
    }
    public function viewpageAction(){
        $userSession = new Container('userloginId');
        $this->sessionid = $userSession->offsetGet('userloginId');
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $dynamicPath = $protocol . $_SERVER['HTTP_HOST'];
        if ($this->sessionid == "") {
            header("Location:" . $dynamicPath. "/corp");
            exit;
        }
        $this->layout('layout/corplayout.phtml');
        $modelPlugin = $this->modelplugin();
        $dynamicPath = $modelPlugin->dynamicPath();
        $currentPageURL = $modelPlugin->curPageURL();
        $href = explode("/", $currentPageURL);
        $controller = @$href[3];
        $action = @$href[4];
        $data = array('corporate_admin_id'=>$this->sessionid);
        $checkemail = $modelPlugin->getcorporate_adminsTable()->selectdata($data);
        $this->layout()->setVariables(array('controller' => $controller, 'action' => $action));
       return new ViewModel(array('dynamicPath' => $dynamicPath,'data'=>$checkemail)); 
    }
   
}

?>
