<?php
namespace Corporateadmin\Model;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\Validator\Digits;
class corporateadmins
{
	public $corporate_admin_id;
    public $centre_id;
    public $role_id;
    public $first_name;
    public $last_name;
    public $email;
    public $phone1;
    public $phone2;
    public $status;
    public $misc;
    public $created_date;
    public $updated_date;
    public $username;
    public $password;
    public $last_login;

	function exchangeArray($data)
	{
        $this->corporate_admin_id          = (!empty($data['corporate_admin_id'])) ? $data['corporate_admin_id'] : null;
        $this->centre_id          = (!empty($data['centre_id'])) ? $data['centre_id'] : null;
        $this->role_id          = (!empty($data['role_id'])) ? $data['role_id'] : null;
        $this->first_name        = (!empty($data['first_name'])) ? $data['first_name'] : null;
        $this->last_name        = (!empty($data['last_name'])) ? $data['last_name'] : null;
        $this->email            = (!empty($data['email'])) ? $data['email'] : null;
        $this->phone1         = (!empty($data['phone1'])) ? $data['phone1'] : null;
        $this->phone2         = (!empty($data['phone2'])) ? $data['phone2'] : null;
        $this->status         = (!empty($data['status'])) ? $data['status'] : null;
        $this->misc = (!empty($data['misc'])) ? $data['misc'] : null;
        $this->created_date  = (!empty($data['created_date'])) ? $data['created_date'] : null;
        $this->updated_date     = (!empty($data['updated_date'])) ? $data['updated_date'] : null;
        $this->username= (!empty($data['username'])) ? $data['username'] : null;
        $this->password    = (!empty($data['password'])) ? $data['password'] : null;
        $this->last_login    = (!empty($data['last_login'])) ? $data['last_login'] : null;

	}

    public function getArrayCopy()
    {
         return get_object_vars($this);
    }


}
?>
