<?php
namespace Develop\Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Session\Container;
use Zend\Session\SessionManager;

class IndexController extends AbstractActionController
{
    public function indexAction() {
        $this->layout('layout/layout.phtml');
        // When the form will be submitted if block will be executed
        if(isset($_POST['userregistrationFirst'])) {
            $modelPlugin  = $this->modelplugin();
            $plugin       = $this->routeplugin();
            $uploadPlugin = $this->imageuploadplugin();
            $response = array();

            // folder path where profile picture will be stored in the server
            $folderName = "/upload/profilePicture/";
            $profilePictureImageLink = "";

            // Profile picture uploading block if the image is selected by the user
            if(isset($_FILES['user_picture']) && $_FILES['user_picture'] != "")
            {
                $profile_picture_image_name = $_FILES['user_picture']['name'];
                $profile_picture_image_size = $_FILES['user_picture']['size'];
                $result = $uploadPlugin->upload($profile_picture_image_size, $profile_picture_image_name, 0 , $folderName);
                $profilePictureImageUploadInfor  = json_decode($result, true);
                $profilePictureImageLink = (isset($profilePictureImageUploadInfor['originalPath'])) ? $profilePictureImageUploadInfor['originalPath'] : "";
            }

            // this variable will store the data which needs to stored in the database
            $data = array(
                'user_fname'                    => trim($_POST['user_fname']),
                'user_mname'                    => trim($_POST['user_mname']),
                'user_lname'                    => trim($_POST['user_lname']),
                'user_picture'                  => trim($profilePictureImageLink),
                'user_date_of_birth'            => trim($_POST['user_date_of_birth']),
                'user_password'                 => trim($_POST['user_password']),
                'user_gender'                   => trim($_POST['user_gender']),
                'user_phone_number'             => trim($_POST['user_phone_number']),
                'user_altername_phone_number'   => trim($_POST['user_altername_phone_number']),
                'user_email'                    => trim($_POST['user_email']),
                'user_status'                   => 'Inactive',
                'user_register_medium'          => 'web',
                'user_phone_number_validated'   => 0,
                'user_email_validated'          => 0
            );

            // this function is responsible to check the email address and phone numbers existance.
            // If there are no match then code will have value 1.
            // if there are match then code will be have different value 2, 3, 4.
            // to check the function please visit Develop/src/Develop/Model/usersTable.php

            if(trim($_POST['user_password']) == "" || $_POST['user_password'] != $_POST['user_confirm_password']) {
                $response['submittedValue'] = $data;
                $response['registerStatus'] = false;
                $response['code'] = 5; // means password and confirm password mismatched id is exists
                return new ViewModel(array('checkingResponse' => $response ));
            }
            else
            {
                $newUserRegisterResponse = $modelPlugin->getusersTable()->checkandinsert($data);
                if($newUserRegisterResponse['code'] != 1) {
                    // If any data matached then the it will go to the view with submitted data
                    // An erro message will display that <field name> is allready exists.
                    return new ViewModel(array('checkingResponse' => $newUserRegisterResponse ));
                } else {
                   // if user registered successfully will redirect to the delivery address add page
                    header('Location:/develop/userdeliveryaddressadd/'. $newUserRegisterResponse['userRegisterId']);
                }
            }
            exit;

        }
        // For first time visit else block code will be executed.
        else {
            return new ViewModel();
        }


    }

    public function userdeliveryaddressaddAction() {
        $this->layout('layout/layout.phtml');
        $modelPlugin  = $this->modelplugin();
        $plugin       = $this->routeplugin();

        $userRegisterId = $this->getEvent()->getRouteMatch()->getParam('id');
        if(!isset($userRegisterId) || $userRegisterId == "") {
            return $this->redirect()->toUrl("/develop");
        }

        $userIdExistanceCheck = $modelPlugin->getusersTable()->registrationIdExistanceCheck($userRegisterId);

        if($userIdExistanceCheck['userFound'] == 'NO') {
            return $this->redirect()->toUrl("/develop");
        }

        if(isset($_POST['userDeliveryAddressSubmission'])) {
            // this variable will store the data which needs to stored in the database
            $data = array(
                'user_id'               => trim($userRegisterId),
                'd_address_1'           => trim($_POST['d_address_1']),
                'd_address_2'           => trim($_POST['d_address_2']),
                'd_address_land_mark'   => trim($_POST['d_address_land_mark']),
                'd_address_lat'         => trim($_POST['d_address_lat']),
                'd_address_lang'        => trim($_POST['d_address_lang']),
                'd_address_pincode'     => trim($_POST['d_address_pincode']),
                'd_address_city'        => trim($_POST['d_address_city']),
                'd_address_state'       => trim($_POST['d_address_state']),
                'd_address_country'     => trim($_POST['d_address_country']),
                'd_address_contact'     => $_POST['d_address_contact'],
                'd_address_verified'    => 0
            );

            $usersdeliverAddressResponse = $modelPlugin->getuseraddresstodeliveryTable()->adddeliveryaddress($data);
            header('Location:/develop/userpickupaddressadd/'.$userRegisterId);
            exit;
        }
        else {
            return new ViewModel(array('user_registered_id' => $userRegisterId));
        }
    }

    public function userpickupaddressaddAction() {
        $this->layout('layout/layout.phtml');
        $modelPlugin  = $this->modelplugin();
        $plugin       = $this->routeplugin();

        $userRegisterId = $this->getEvent()->getRouteMatch()->getParam('id');
        if(!isset($userRegisterId) || $userRegisterId == "") {
            return $this->redirect()->toUrl("/develop");
        }

        $userIdExistanceCheck = $modelPlugin->getusersTable()->registrationIdExistanceCheck($userRegisterId);

        if($userIdExistanceCheck['userFound'] == 'NO') {
            return $this->redirect()->toUrl("/develop");
        }
        if(isset($_POST['userPickupAddressSubmission'])) {
            // this variable will store the data which needs to stored in the database
            $data = array(
                'user_id'               => trim($userRegisterId),
                'p_address_1'           => trim($_POST['p_address_1']),
                'p_address_2'           => trim($_POST['p_address_2']),
                'p_address_land_mark'   => trim($_POST['p_address_land_mark']),
                'p_address_lat'         => trim($_POST['p_address_lat']),
                'p_address_lang'        => trim($_POST['p_address_lang']),
                'p_address_pincode'     => trim($_POST['p_address_pincode']),
                'p_address_city'        => trim($_POST['p_address_city']),
                'p_address_state'       => trim($_POST['p_address_state']),
                'p_address_country'     => trim($_POST['p_address_country']),
                'p_address_contact'     => $_POST['p_address_contact'],
                'p_address_verified'    => 0
            );

            $usersdeliverAddressResponse = $modelPlugin->getuseraddressofpickupTable()->addPickupAddress($data);
            header('Location:/develop/login');
            exit;
        }
        else {
            return new ViewModel(array('user_registered_id' => $userRegisterId));
        }
    }

    public function loginAction() {
        $this->layout('layout/layout.phtml');

        if(isset($_POST['login'])) {
            $modelPlugin  = $this->modelplugin();
            $response = array();
            if (filter_var(trim($_POST['emailorphone']), FILTER_VALIDATE_EMAIL) && trim($_POST['loginpassword']) != "") {
                $data = array (
                    'user_email'    => trim($_POST['emailorphone']),
                    'user_password' => trim($_POST['loginpassword'])
                );
                $userLogin = $modelPlugin->getusersTable()->weblogin($data);
                if($userLogin['userFound'] == 'NO') {
                    $response['submittedValue'] = array('emailorphone'=> trim($_POST['emailorphone']));
                    $response['registerStatus'] = false;
                    $response['code'] = 3; // Invalid credentials
                    return new ViewModel(array('checkingResponse' => $response ));
                } else {
                    print_r($userLogin); exit;
                }
            } else if(preg_match("/^[0-9]{10}$/", $_POST['emailorphone']) && trim($_POST['loginpassword']) != "") {
                $data = array (
                    'user_phone_number'    => trim($_POST['emailorphone']),
                    'user_password' => trim($_POST['loginpassword'])
                );
                $userLogin = $modelPlugin->getusersTable()->weblogin($data);
                if($userLogin['userFound'] == 'NO') {
                    $response['submittedValue'] = array('emailorphone'=> trim($_POST['emailorphone']));
                    $response['registerStatus'] = false;
                    $response['code'] = 3; // phone number not found
                    return new ViewModel(array('checkingResponse' => $response ));
                } else {
                    print_r($userLogin); exit;
                }
            } else {
                $response['submittedValue'] = array('emailorphone'=> trim($_POST['emailorphone']));
                $response['registerStatus'] = false;
                $response['code'] = 2; // inserted data not correct
                return new ViewModel(array('checkingResponse' => $response ));
            }
        } else {
            return new ViewModel();
        }
    }
}

?>
