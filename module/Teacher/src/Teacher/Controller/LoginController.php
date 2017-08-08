<?php

namespace Login\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;
use Zend\Session\Container;
use Zend\Session\Config\StandardConfig;
use Zend\Session\SessionManager;

class LoginController extends AbstractActionController {


    public function indexAction() 
    {
        $this->layout('layout/layout.phtml');
        $modelPlugin = $this->modelplugin();
        $headerMenuList = $modelPlugin->getheaderMenuTable()->fetchAllHeaderMenu();
        $primaryFooterMenuList = $modelPlugin->getprimaryFooterMenuTable()->fetchAllPrimaryFooterMenu();
        $secondaryFooterMenuList = $modelPlugin->getsecondaryFooterMenuTable()->fetchAllSecondaryFooterMenu();
        
        $currentPage = $this->params('action');
        
        $this->layout()->setVariables(array('title' => 'Log In - Inbuzzup','currentPage' => $currentPage, 'headerNavigationMenu' => $headerMenuList, 'primaryFooterMenuList' => $primaryFooterMenuList, 'secondaryFooterMenuList' => $secondaryFooterMenuList));
    }
    
    public function registerAction()
    {
        $modelPlugin = $this->modelplugin();
        $data = array('role_id' => 1, 'email' => $_POST['email'], 'first_name' => $_POST['firstname'], 'last_name'=> $_POST['lastname'], 'phone_number' => $_POST['phonenumber'], 'password' => $_POST['password']);
        $status = $modelPlugin->usersTable()->checkandinsert($data); 
        return new JsonModel($status);
    }
    public function loginAction()
    {
        $modelPlugin = $this->modelplugin();
        $loginResponse = array();
        $data = array('email' => $_POST['email'],'password' => $_POST['password']);
        $status = $modelPlugin->usersTable()->userlogin($data); 
        
        if($status['userFound'] == 'YES')
        {
            $loginResponse['redirect'] = true;
            $user_session_1 = new Container('ID');
            $user_session_2 = new Container('user_email');
            $user_session_3 = new Container('loggedInStatus');
            $user_session_3->loggedInStatus = 'logged';
            $user_session_1->ID = $status['userDetails']->user_id;
            $user_session_2->user_email = $status['userDetails']->email;
        } else {
            $loginResponse['redirect'] = false;
        }
        return new JsonModel($loginResponse);
    }
    public function logoutAction()
    {
        $user_session_1 = new Container('ID');
        $user_session_2 = new Container('user_email');
        $user_session_3 = new Container('loggedInStatus');
        $user_session_3->loggedInStatus = '';
        $user_session_1->ID = '';
        $user_session_2->user_email = '';
        header('Location:/');
    }
    
}

?>
