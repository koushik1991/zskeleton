<?php

namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;
use Zend\Session\Container;
use Zend\Session\Config\StandardConfig;
use Zend\Session\SessionManager;

class BannerController extends AbstractActionController {
    
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

     public function viewAction(){
              $this->layout('layout/adminlayout.phtml');
              $modelPlugin = $this->modelplugin();
              $plugin = $this->routeplugin();
		      $currentPageURL = $plugin->curPageURL();
              $dynamicPath = $modelPlugin->dynamicPath();
		      $href = explode("/", $currentPageURL);
		      $controller = @$href[3];
              $action = @$href[4];
		      $this->layout()->setVariables(array('controller'=>$controller,'action'=>$action));
              $bannerdata = $modelPlugin->gethomePageBannerTable()->fetchall();
		      return new ViewModel(array('bannerdata'=>$bannerdata,'dynamicPath'=>$dynamicPath));
     }
     public function editbannerAction(){
              $this->layout('layout/adminlayout.phtml');
              $modelPlugin = $this->modelplugin();
              $plugin = $this->routeplugin();
		      $currentPageURL = $plugin->curPageURL();
		      $href = explode("/", $currentPageURL);
		      $controller = @$href[3];
              $action = @$href[4];
		      $this->layout()->setVariables(array('controller'=>$controller,'action'=>$action));
              $id = $this->getEvent()->getRouteMatch()->getParam('id');
              $bannerdata = $modelPlugin->gethomePageBannerTable()->fetchall(array('banner_id'=>$id));
		      return new ViewModel(array('bannerdata'=>$bannerdata));
        
     }
     public function updatebannerAction(){
              $modelPlugin  = $this->modelplugin();
              $plugin       = $this->routeplugin();
              $uploadPlugin = $this->imageuploadplugin();
              $bannerImageLink = "";
         
              $dynamicPath  = $modelPlugin->dynamicPath();              
              $banrName     = $_POST['banrName'];              
              $visibility   = $_POST['visibility'];
              $bannerId     = $_POST['bannerId'];
              $banrLink     = $_POST['banrLink'];
              $prevImgPath  = $_POST['prevImgPath'];
              $request      = $this->getRequest()->getPost();
         
              $filename     = $request['fileupload'];
              $request      = $this->getRequest();
              $files        = $request->getFiles()->toArray();
              $folderName   = "/upload/bannerimg/";
            
              if(isset($_FILES['fileupload']) && $_FILES['fileupload'] != "")
              {
                    $banner_image_name = $files[$filename]['name'];
                    $banner_image_size = $files[$filename]['size'];
                    $result            = $uploadPlugin->upload($banner_image_size, $banner_image_name, 0 , $folderName);
                    $bannerImageUploadInfor  = json_decode($result, true);
                    $bannerImageLink         = (isset($bannerImageUploadInfor['originalPath'])) ? $bannerImageUploadInfor['originalPath'] : $prevImgPath;
              }
            
              $data = array(
                    'banner_image_path'=>$bannerImageLink,
                    'banner_alt_text'=>$banrName,
                    'banner_redirect'=>$banrLink,
                    'banner_isVisible'=>$visibility
              );       
              $where = array('banner_id'=>$bannerId);
              $updateData = $modelPlugin->gethomePageBannerTable()->updateData($data,$where);
              print_r($updateData); exit;

     }
     public function delbannerAction(){
              $modelPlugin = $this->modelplugin();
              $bannerId = $_POST['hidden_id'];
              $deleteuser = $modelPlugin->gethomePageBannerTable()->deleteData(array('banner_id'=>$bannerId));
              return $this->redirect()->toRoute('banner', array(
				      'controller' => 'banner',
				      'action'     => 'view'));
     }
     public function addbannerAction(){
              $this->layout('layout/adminlayout.phtml');
              $modelPlugin = $this->modelplugin();
              $plugin = $this->routeplugin();
		      $currentPageURL = $plugin->curPageURL();
		      $href = explode("/", $currentPageURL);
		      $controller = @$href[3];
              $action = @$href[4];
		      $this->layout()->setVariables(array('controller'=>$controller,'action'=>$action));
		      return new ViewModel();
         
     }
     public function uploadbannerAction(){
              $userSessionAdmin 	= 	new Container('username');
		      $sessionidAdmin 	= 	$userSessionAdmin->offsetGet('admin_id');
              $modelPlugin  = $this->modelplugin();
              $plugin       = $this->routeplugin();
              $uploadPlugin = $this->imageuploadplugin();
              $bannerImageLink = "";

              $dynamicPath  = $modelPlugin->dynamicPath();
              $banrName     = $_POST['banrName'];              
              $visibility   = $_POST['visibility'];
              $banrLink     = $_POST['banrLink'];
              $request1     = $this->getRequest()->getPost();
         
              $filename     = $request1['fileupload'];
              $request      = $this->getRequest();
              $files        = $request->getFiles()->toArray();
              $folderName   = "/upload/bannerimg/";

            if(isset($_FILES['fileupload']) && $_FILES['fileupload'] != "")
            {
                $banner_image_name = $files[$filename]['name'];
                $banner_image_size = $files[$filename]['size'];
                $result            = $uploadPlugin->upload($banner_image_size, $banner_image_name, 0 , $folderName);
                $bannerImageUploadInfor  = json_decode($result, true);
                $bannerImageLink         = (isset($bannerImageUploadInfor['originalPath'])) ? $bannerImageUploadInfor['originalPath'] : "";
            }
            $data = array(
                'banner_image_path'=>$bannerImageLink,
                'banner_alt_text'=>$banrName,
                'banner_isVisible'=>$visibility,
                'banner_redirect'=>$banrLink,
                'banner_created_by'=>$sessionidAdmin
            );
            $bannerdata = $modelPlugin->gethomePageBannerTable()->insertdata($data);
            print_r($bannerdata); exit;
     }
     public function hidebannerAction(){
            $modelPlugin = $this->modelplugin();
            $id          = $_POST['banrId'];
            $where       = array('banner_id'=>$id);
            $data        = array('banner_isVisible'=>'0');
            $updateData  = $modelPlugin->gethomePageBannerTable()->updateData($data,$where);
            echo $updateData; exit;
     }
     public function showbannerAction(){
            $modelPlugin = $this->modelplugin();
            $id          = $_POST['banrId'];
            $where       = array('banner_id'=>$id);
            $data        = array('banner_isVisible'=>'1');
            $updateData  = $modelPlugin->gethomePageBannerTable()->updateData($data,$where);
            echo $updateData; exit;
     }

}
