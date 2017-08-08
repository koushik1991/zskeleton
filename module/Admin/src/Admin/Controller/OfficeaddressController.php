<?php

namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;
use Zend\Session\Container;
use Zend\Session\Config\StandardConfig;
use Zend\Session\SessionManager;

class OfficeaddressController extends AbstractActionController {
    
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
        $modelPlugin    = $this->modelplugin();
        $dynamicPath    = $modelPlugin->dynamicPath();
        $currentPageURL = $modelPlugin->curPageURL();
        $href           = explode("/", $currentPageURL);
        $controller     = @$href[3];
        $action         = @$href[4];
        $this->layout()->setVariables(array('controller' => $controller, 'action' => $action));
        return new ViewModel(array('dynamicPath' => $dynamicPath));
    }
    public function viewAction()
    {
        $this->layout('layout/adminlayout.phtml');
        $modelPlugin    = $this->modelplugin();
        $dynamicPath    = $modelPlugin->dynamicPath();
        $currentPageURL = $modelPlugin->curPageURL();
        $href           = explode("/", $currentPageURL);
        $controller     = @$href[3];
        $action         = @$href[4];
        $this->layout()->setVariables(array('controller' => $controller, 'action' => $action));
        $fetchData      = $modelPlugin->getofficeContactTable()->fetchall();
        return new ViewModel(array('fetchData'=>$fetchData));
    }
    public function addAction()
    {
        $this->layout('layout/adminlayout.phtml');
        $modelPlugin    = $this->modelplugin();
        $dynamicPath    = $modelPlugin->dynamicPath();
        $currentPageURL = $modelPlugin->curPageURL();
        $href           = explode("/", $currentPageURL);
        $controller     = @$href[3];
        $action         = @$href[4];
        $this->layout()->setVariables(array('controller' => $controller, 'action' => $action));
        return new ViewModel(array('dynamicPath' => $dynamicPath));
    }
    public function saveaddressAction(){
        $modelPlugin = $this->modelplugin();
        $plugin      = $this->routeplugin();
        $dynamicPath = $plugin->dynamicPath();
        $offTitle    = $_POST['offTitle'];
        $addrOne     = $_POST['addrOne'];
        $addrTwo     = $_POST['addrTwo'];
        $offCity     = $_POST['offCity'];
        $offPin      = $_POST['offPin'];
        $offState    = $_POST['offState'];
        $offCon      = $_POST['offCon'];
        $landline    = $_POST['landline'];
        $phone1      = $_POST['phone1'];
        $phone2      = $_POST['phone2'];
        $offEmail    = $_POST['offEmail'];
        $latitude    = $_POST['latitude'];
        $longitude   = $_POST['longitude'];

        $data = array(
                'office_title'    =>$offTitle,
                'office_address_1'=>$addrOne,
                'office_address_2'=>$addrTwo,
                'office_city'     =>$offCity,
                'office_pincode'  =>$offPin,
                'office_state'    =>$offState,
                'office_country'  =>$offCon,
                'office_landline' =>$landline,
                'office_phone_1'  =>$phone1,
                'office_phone_2'  =>$phone2,
                'office_email'    =>$offEmail,
                'office_lat'      =>$latitude,
                'office_lang'     =>$longitude
        );
        $insertData = $modelPlugin->getofficeContactTable()->insertdata($data);
        return $this->redirect()->toRoute('officeaddress', array(
				    'controller' => 'officeaddress',
				    'action' => 'view'));

     }
     public function editAction()
     {
        $this->layout('layout/adminlayout.phtml');
        $modelPlugin    = $this->modelplugin();
        $dynamicPath    = $modelPlugin->dynamicPath();
        $currentPageURL = $modelPlugin->curPageURL();

        $href           = explode("/", $currentPageURL);
        $controller     = @$href[3];
        $action         = @$href[4];
        $this->layout()->setVariables(array('controller' => $controller, 'action' => $action));
        $id             = $this->getEvent()->getRouteMatch()->getParam('id');
        $where          = array('office_id'=>$id);
        $fetchAdrss     = $modelPlugin->getofficeContactTable()->fetchall($where);
        return new ViewModel(array('fetchAdrss'=>$fetchAdrss));

     }
     public function updateaddressAction(){
        $modelPlugin = $this->modelplugin();
        $plugin      = $this->routeplugin();
        $dynamicPath = $plugin->dynamicPath();

        $officeId    = $_POST['officeId'];
        $offTitle    = $_POST['offTitle'];
        $addrOne     = $_POST['addrOne'];
        $addrTwo     = $_POST['addrTwo'];
        $offCity     = $_POST['offCity'];
        $offPin      = $_POST['offPin'];
        $offState    = $_POST['offState'];
        $offCon      = $_POST['offCon'];
        $landline    = $_POST['landline'];
        $phone1      = $_POST['phone1'];
        $phone2      = $_POST['phone2'];
        $offEmail    = $_POST['offEmail'];
        $latitude    = $_POST['latitude'];
        $longitude   = $_POST['longitude'];

        $data = array(
                'office_title'    =>$offTitle,
                'office_address_1'=>$addrOne,
                'office_address_2'=>$addrTwo,
                'office_city'     =>$offCity,
                'office_pincode'  =>$offPin,
                'office_state'    =>$offState,
                'office_country'  =>$offCon,
                'office_landline' =>$landline,
                'office_phone_1'  =>$phone1,
                'office_phone_2'  =>$phone2,
                'office_email'    =>$offEmail,
                'office_lat'      =>$latitude,
                'office_lang'     =>$longitude
        );

        $where            = array('office_id'=>$officeId);
        $updateAdrss      = $modelPlugin->getofficeContactTable()->updateData($data,$where);

        return $this->redirect()->toRoute('officeaddress', array(
				    'controller' => 'officeaddress',
				    'action' => 'view'));

     }
     public function deladdressAction(){
              $modelPlugin = $this->modelplugin();
              $officeId    = $_POST['hidden_id'];
              $deleteuser  = $modelPlugin->getofficeContactTable()->deleteData(array('office_id'=>$officeId));

              return $this->redirect()->toRoute('officeaddress', array(
				      'controller' => 'officeaddress',
				      'action'     => 'view'));
     }

}
