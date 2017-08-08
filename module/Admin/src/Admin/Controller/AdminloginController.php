<?php
namespace Admin\Controller;
 use Zend\Mvc\Controller\AbstractActionController;
 use Zend\View\Model\ViewModel;
 use Zend\Session\Container;
 use Zend\Session\SessionManager;

 class AdminloginController extends AbstractActionController
 {

    public function loginAction(){
		$userSessionAdmin 	= 	new Container('username');
		$sessionidAdmin 	= 	$userSessionAdmin->offsetGet('admin_id');
        $plugin = $this->routeplugin();
		$dynamicPath = $plugin->dynamicPath();
        if($sessionidAdmin != "")
		{
			  return $this->redirect()->toRoute('banner', array(
				'controller' => 'banner',
				'action' => 'view'));
		}
		else{
			$this->layout('layout/loginlayout');
			$plugin = $this->routeplugin();
		    $currentPageURL = $plugin->curPageURL();
			$href = explode("/", $currentPageURL);
			$controller = @$href[3];
			$action = @$href[4];
			$this->layout()->setVariables(array('controller'=>$controller,'action'=>$action,'dynamicPath' => $dynamicPath));
			return new ViewModel();
		}
    }
    public function submitAction()
	{

        $modelPlugin = $this->modelplugin();
        $userName = $_POST['userId'];
        $password = $_POST['password'];
        $query = array('username'=>$userName,'password'=>$password);
		$checkLogin = $modelPlugin->getadminTable()->loginsubmit($query);
        if(!empty($checkLogin)){
		  if(isset($checkLogin[0]['admin_id'])) {
			 $userSessionAdmin 			    = 	new Container('username');
             $userSessionAdmin->username 	= 	$checkLogin[0]['username'];
			 $userSessionAdmin->admin_id 	= 	$checkLogin[0]['admin_id'];
          }
            echo 'ok';
		}
        else {
            echo 'error';
         }
        exit;
	}
    public function logoutAction()
	{
        $userSessionAdmin  = 	new Container('username');
		$userSessionAdmin->getManager()->destroy();
		unset($userSessionAdmin->admin_id);
		return $this->redirect()->toRoute('adminlogin', array(
					'controller' => 'adminlogin',
					'action' => 'login'
			));
	}
 }

?>
