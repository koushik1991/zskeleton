<?php

namespace Plugin\Controller\Plugin;

use Zend\Mvc\Controller\Plugin\AbstractPlugin;

class imageuploadplugin extends routeplugin {

//for admin banner-image
    public function bannerimg($tempname,$name)
     {
        //echo $name; exit;
        $res                        = array();
        $tmp_name                   = $tempname;
        $uploadfilename             = $name;
        $savedate                   = time();
        $value                      = pathinfo($uploadfilename, PATHINFO_EXTENSION);

        if ($value == 'png' || $value == 'jpg' || $value == 'jpeg' || $value == 'gif') {

            $newfilename = $_SERVER['DOCUMENT_ROOT'].'/upload/bannerimg/'.($uploadfilename);
            if (move_uploaded_file($tmp_name, $newfilename)) {
                   $res['filePath'] = $uploadfilename;
            } else {
                    $res['error']   = 0;
            }
        } else {
            $res['error']           = 1;

        }
        return json_encode($res);

     }
    public function upload($fileSize,$fileName,$files,$folderName)
     {
		$res = array();

        if (!is_dir($_SERVER['DOCUMENT_ROOT'] . $folderName)) {
            @mkdir($_SERVER['DOCUMENT_ROOT'] . $folderName, 0777, true);
            chmod($_SERVER['DOCUMENT_ROOT'] . $folderName, 0777);
        }

        $ext = pathinfo($fileName, PATHINFO_EXTENSION);
        $uploadObj = new \Zend\File\Transfer\Adapter\Http();
     	$uploadObj->setDestination($_SERVER['DOCUMENT_ROOT'].$folderName);
		$upload =  $this->dynamicPath();
		$newfilename = time()."_".str_replace(" ", "_", $fileName);
        $uploadObj->addFilter('Rename', array('target' =>$_SERVER['DOCUMENT_ROOT'].$folderName.$newfilename,'overwrite' => true));
     	$ups = $folderName.$newfilename;
     	if($uploadObj->receive($fileName)) {
            $res['originalPath'] = $ups;
			$res['exterror'] = 0;
			return json_encode($res);
        }
		else
		{
			$res['exterror'] = "Error in image recieve";
            $res['data'] = $fileSize."-".$fileName."-".$files."-".$folderName;
			return json_encode($res);
			exit;
		}
     }
    
}


