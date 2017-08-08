<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Plugin\Controller;

 use Zend\Mvc\Controller\AbstractActionController;
 use Zend\View\Model\ViewModel;

 class LogintestController extends AbstractActionController
 {
     public function indexAction()
     {
         //echo date('y-m-d');exit;
         //print_r($_SERVER);exit;
        $userid= 'abcd';
        //$link ="63058b00a142ae606-GiveAway";
        $link =0;
        $plugin = $this->attachmentplugin();
		$dynamicPath =  $plugin->attachfile(1091);
		//print_r($dynamicPath);exit;
                echo $dynamicPath;exit;
                
                 
     }

 }
