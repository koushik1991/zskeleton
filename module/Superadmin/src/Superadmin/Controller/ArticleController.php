<?php

namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;
use Zend\Session\Container;
use Zend\Session\Config\StandardConfig;
use Zend\Session\SessionManager;        

class ArticleController extends AbstractActionController {
	
    protected $ADMINID;
    protected $ADMINEMAIL;
    protected $ADMINLOGGEDINSTATUS;
    
    public function __construct() {
        
        $user_session_1 = new Container('ADMINID');
        $user_session_2 = new Container('ADMINEMAIL');
        $user_session_3 = new Container('ADMINLOGGEDINSTATUS');
        $this->ADMINID = $user_session_1->offsetGet('ADMINID');
        $this->ADMINEMAIL = $user_session_2->offsetGet('ADMINEMAIL');
        $this->ADMINLOGGEDINSTATUS = $user_session_3->offsetGet('ADMINLOGGEDINSTATUS');
        
        if($this->ADMINLOGGEDINSTATUS != 'logged'){
            header('Location:/admin/login');
            exit;
        }
    }
    
    public function listAction(){
        $this->layout('layout/adminInnerpage.phtml');
		$currentPage = $this->params('action');
		$modelPlugin = $this->modelplugin();
        $articleList = $modelPlugin->backstageTable()->fetchAll();
        
        $this->layout()->setVariables(array('title' => 'Inbuzzup | Article management','currentPage' => $currentPage));
        return new ViewModel(array("articleList"=>$articleList));
    }
    
    public function addarticleAction(){
        $this->layout('layout/adminInnerpage.phtml');
		$currentPage = $this->params('action');
        
        $modelPlugin = $this->modelplugin();
        $categories = $modelPlugin->eventCategoriesTable()->fetchAll();
        
        $this->layout()->setVariables(array('title' => 'Inbuzzup | Add article','currentPage' => $currentPage));
        return new ViewModel(array('categories'=>$categories));
    }
    
    public function editarticleAction(){
        $this->layout('layout/adminInnerpage.phtml');
        $modelPlugin = $this->modelplugin();
		$currentPage = $this->params('action');
        $articleId = $this->getEvent()->getRouteMatch()->getParam('id');
        if(!isset($articleId) || $articleId == "")
        {
            return $this->redirect()->toUrl("/article");
        }
        $article = $modelPlugin->backstageTable()->fetchTheArticleById($articleId);
        if($article['articleFound'] == 'NO')
        {
            return $this->redirect()->toUrl("/article");
        }
        
        $categories = $modelPlugin->eventCategoriesTable()->fetchAll();
        
        $this->layout()->setVariables(array('title' => 'Inbuzzup | edit article '.$article['articleDetails']->article_title,'currentPage' => $currentPage));
        return new ViewModel(array('article'=>$article['articleDetails'], 'categories'=>$categories));
    }
    
    public function savearticleAction(){
        $modelPlugin = $this->modelplugin();
		$uploadPlugin = $this->imageupload();
        $folderName =   '/upload/article/';
        $homePageFeatureImageLink = "";
        $detailImageLink = "";
        if(isset($_FILES['homePageFeatureImage']) && $_FILES['homePageFeatureImage'] != "")
        {
            $article_feature_home_page_image_name     = $_FILES['homePageFeatureImage']['name'];
            $article_feature_home_page_image_size     = $_FILES['homePageFeatureImage']['size'];
            $result                     = $uploadPlugin->upload($article_feature_home_page_image_size, $article_feature_home_page_image_name, 0 , $folderName);
            $homePageFeatureImageUploadInfor      = json_decode($result, true);
            $homePageFeatureImageLink   = (isset($homePageFeatureImageUploadInfor['originalPath'])) ? $homePageFeatureImageUploadInfor['originalPath'] : "";
        }
        if(isset($_FILES['detailImage']) && $_FILES['detailImage'] != "")
        {
            $article_detail_image_name = $_FILES['detailImage']['name'];
            $article_detail_image_size = $_FILES['detailImage']['size'];
            $result1                 = $uploadPlugin->upload($article_detail_image_size, $article_detail_image_name, 0 , $folderName);
            $detailImageUploadInfor  = json_decode($result1, true);
            $detailImageLink = (isset($detailImageUploadInfor['originalPath'])) ? $detailImageUploadInfor['originalPath'] : "";
        }
        $data = array(
            "article_title"             => $_POST['article_title'], 
            "article_desc"              => $_POST['article_desc'], 
            "article_detail_image"      => $detailImageLink,
            "article_featured_image"    => $homePageFeatureImageLink, 
            "article_featured"          => $_POST['optionSlider'], 
            "article_fb"                => $_POST['article_facebook'], 
            "article_twitter"           => $_POST['article_twitter'], 
            "article_email"             => $_POST['article_email'], 
            "category_id"               => $_POST['article_category'], 
            "status"                    => 1, 
            "article_trending"          => $_POST['optionTrending']
        );
        $article = $modelPlugin->backstageTable()->saveit($data);
        header('Location:/article');
        exit;
    }
    public function updatearticleAction() {
        $modelPlugin = $this->modelplugin();
		$uploadPlugin = $this->imageupload();
        $folderName =   '/upload/article/';
        $homePageFeatureImageLink = $_POST['homePageFeatureImageHidden'];
        $detailImageLink = $_POST['detailImageHidden'];
        if(isset($_FILES['homePageFeatureImage']) && $_FILES['homePageFeatureImage'] != "")
        {
            $article_feature_home_page_image_name     = $_FILES['homePageFeatureImage']['name'];
            $article_feature_home_page_image_size     = $_FILES['homePageFeatureImage']['size'];
            $result                     = $uploadPlugin->upload($article_feature_home_page_image_size, $article_feature_home_page_image_name, 0 , $folderName);
            $homePageFeatureImageUploadInfor      = json_decode($result, true);
            $homePageFeatureImageLink   = (isset($homePageFeatureImageUploadInfor['originalPath'])) ? $homePageFeatureImageUploadInfor['originalPath'] : $homePageFeatureImageLink;
        }
        if(isset($_FILES['detailImage']) && $_FILES['detailImage'] != "")
        {
            $article_detail_image_name = $_FILES['detailImage']['name'];
            $article_detail_image_size = $_FILES['detailImage']['size'];
            $result1                 = $uploadPlugin->upload($article_detail_image_size, $article_detail_image_name, 0 , $folderName);
            $detailImageUploadInfor  = json_decode($result1, true);
            $detailImageLink = (isset($detailImageUploadInfor['originalPath'])) ? $detailImageUploadInfor['originalPath'] : $detailImageLink;
        }
        $data = array(
            "article_title"             => $_POST['article_title'], 
            "article_desc"              => $_POST['article_desc'], 
            "article_detail_image"      => $detailImageLink,
            "article_featured_image"    => $homePageFeatureImageLink, 
            "article_featured"          => $_POST['optionSlider'], 
            "article_fb"                => $_POST['article_facebook'], 
            "article_twitter"           => $_POST['article_twitter'], 
            "article_email"             => $_POST['article_email'], 
            "category_id"               => $_POST['article_category'], 
            "status"                    => 1, 
            "article_trending"          => $_POST['optionTrending']
        );
        $article = $modelPlugin->backstageTable()->updateit($data, $_POST['article_id']);
        header('Location:/article');
        exit;
    }
}