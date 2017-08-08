<?php

namespace Plugin\Controller\Plugin;

use Zend\Mvc\Controller\Plugin\AbstractPlugin;

class modelplugin extends routeplugin {
    public $corporateadminsTable;
    public $adminTable;
    public $homePageBannerTable;
    public $officeContactTable;
    public $usersTable;
    public $useraddresstodeliveryTable;
    public $useraddressofpickupTable;

    public function getcorporate_adminsTable() {
        if (!$this->corporateadminsTable) {
            $sm = $this->getController()->getServiceLocator();
            $this->corporateadminsTable = $sm->get('Corporateadmin\Model\corporateadminsTable');
        }
        return $this->corporateadminsTable;
    }

    public function getadminTable() {
        if (!$this->adminTable) {
            $sm = $this->getController()->getServiceLocator();
            $this->adminTable = $sm->get('Admin\Model\adminTable');
        }
        return $this->adminTable;
    }

    public function gethomePageBannerTable() {
        if (!$this->homePageBannerTable) {
            $sm = $this->getController()->getServiceLocator();
            $this->homePageBannerTable = $sm->get('Admin\Model\homePageBannerTable');
        }
        return $this->homePageBannerTable;
    }

    public function getofficeContactTable() {
        if (!$this->officeContactTable) {
            $sm = $this->getController()->getServiceLocator();
            $this->officeContactTable = $sm->get('Admin\Model\officeContactTable');
        }
        return $this->officeContactTable;
    }

    public function getusersTable() {
        if (!$this->usersTable) {
            $sm = $this->getController()->getServiceLocator();
            $this->usersTable = $sm->get('Develop\Model\usersTable');
        }
        return $this->usersTable;
    }

    public function getuseraddresstodeliveryTable() {
        if (!$this->useraddresstodeliveryTable) {
            $sm = $this->getController()->getServiceLocator();
            $this->useraddresstodeliveryTable = $sm->get('Develop\Model\useraddresstodeliveryTable');
        }
        return $this->useraddresstodeliveryTable;
    }
    
    public function getuseraddressofpickupTable() {
        if (!$this->useraddressofpickupTable) {
            $sm = $this->getController()->getServiceLocator();
            $this->useraddressofpickupTable = $sm->get('Develop\Model\useraddressofpickupTable');
        }
        return $this->useraddressofpickupTable;
    }

}
