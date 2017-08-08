<?php

namespace Corporateadmin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;
use Zend\Session\Container;
use Zend\Session\Config\StandardConfig;
use Zend\Session\SessionManager;

class AuthController extends AbstractActionController {


    public function indexAction() 
    {
        $this->layout('layout/corplayout.phtml');
        $modelPlugin = $this->modelplugin();
        $dynamicPath = $modelPlugin->dynamicPath();
        $currentPageURL = $modelPlugin->curPageURL();
        $href = explode("/", $currentPageURL);
        $controller = @$href[3];
        $action = @$href[4];
        $this->layout()->setVariables(array('controller' => $controller, 'action' => $action));
        return new ViewModel(array('dynamicPath' => $dynamicPath));
    }
    
    public function signupAction(){
        $response =array();
        parse_str($_POST['formValues'], $formValues);
        $modelPlugin = $this->modelplugin();
        $data = array('email'=>$formValues['email']);
        $checkemail = $modelPlugin->getcorporate_adminsTable()->selectdata($data);
        if($checkemail!=0){
            $response['error'] = 1;
            $response['errorMessage'] = "Same Email Exist! Please try with different.";
            echo json_encode($response);exit;
        }
        $data = array('username'=>$formValues['uname']);
        $checkemail = $modelPlugin->getcorporate_adminsTable()->selectdata($data);
        
        if($checkemail!=0){
            $response['error'] = 1;
            $response['errorMessage'] = "Same Username Exist! Please try with different.";
            echo json_encode($response);exit;
        }
        $password = password_hash($formValues['password'], PASSWORD_BCRYPT); 
        $currentDateTime = date("Y-m-d h:i:sa");
        $data = array('first_name'=>$formValues['fname'],'last_name'=>$formValues['lname'],'email'=>$formValues['email'],'phone1'=>$formValues['phone1'],'phone2'=>$formValues['phone2'],'status'=>"Activated",'created_date'=>$currentDateTime,'updated_date'=>$currentDateTime,'username'=>$formValues['uname'],'password'=>$password,'last_login'=>$currentDateTime);
        $checkemail = $modelPlugin->getcorporate_adminsTable()->insertdata($data);
        $user_session = new Container('userloginId');
        $user_session->userloginId = $checkemail;
        $response['succes'] = 1;
        $response['succesMessage'] = "Thank you for join with us";
        echo json_encode($response);exit;
        
    }
    public function signinAction(){
        $response =array();
        parse_str($_POST['formValues'], $formValues);
        $modelPlugin = $this->modelplugin();
        $dynamicPath = $modelPlugin->dynamicPath();
        $data = array('username'=>$formValues['uname']);
        $checkUser = $modelPlugin->getcorporate_adminsTable()->selectdata($data);
        if($checkUser!=0){
            $passcheck = password_verify($formValues['password'], $checkUser[0]['password']);
            if($passcheck == 1 )
            {
                $response['succes'] = 1;
                $user_session = new Container('userloginId');
                $user_session->userloginId = $checkUser[0]['corporate_admin_id'];
                echo json_encode($response);exit;
            }
            else
            {
              $response['error'] = 1;
              $response['errorMessage'] = "Wrong username! Please try with different."; 
              echo json_encode($response);exit;
            }
        }
        else
        {
            $response['error'] = 1;
            $response['errorMessage'] = "Wrong username! Please try with different.";
            echo json_encode($response);exit;
        }
    }
    public function logoutAction(){
        $user_session->userloginId = ($_SESSION['userloginId']);
        $user_session = new \Zend\Session\Container('userloginId');
        unset($user_session->userloginId);
        $plugin = $this->routeplugin();
        $dynamicPath = $plugin->dynamicPath();
        return $this->redirect()->toUrl($dynamicPath."/corp");
        
    }
}

?>
