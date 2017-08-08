<?php
namespace Develop\Model;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\Validator\Digits;
class users
{
	public $user_id;
    public $user_fname;
    public $user_mname;
    public $user_lname;
    public $user_picture;
    public $user_date_of_birth;
    public $user_password;
    public $user_identification;
    public $user_gender;
    public $user_phone_number;
    public $user_altername_phone_number;
    public $user_email;
    public $user_status;  // ('Active','Inactive')
    public $user_register_date;
    public $user_register_medium;
    public $user_last_login;
    public $user_phone_number_validated;
    public $user_email_validated;

    function exchangeArray($data)
	{
        $this->user_id                          = (!empty($data['user_id'])) ? $data['user_id'] : null;
        $this->user_fname                       = (!empty($data['user_fname'])) ? $data['user_fname'] : null;
        $this->user_mname                       = (!empty($data['user_mname'])) ? $data['user_mname'] : null;
        $this->user_lname                       = (!empty($data['user_lname'])) ? $data['user_lname'] : null;
        $this->user_picture                     = (!empty($data['user_picture'])) ? $data['user_picture'] : null;
        $this->user_date_of_birth               = (!empty($data['user_date_of_birth'])) ? $data['user_date_of_birth'] : null;
        $this->user_password                    = (!empty($data['user_password'])) ? $data['user_password'] : null;
        $this->user_identification              = (!empty($data['user_identification'])) ? $data['user_identification'] : null;
        $this->user_gender                      = (!empty($data['user_gender'])) ? $data['user_gender'] : null;
        $this->user_phone_number                = (!empty($data['user_phone_number'])) ? $data['user_phone_number'] : null;
        $this->user_altername_phone_number      = (!empty($data['user_altername_phone_number'])) ? $data['user_altername_phone_number'] : null;
        $this->user_email                       = (!empty($data['user_email'])) ? $data['user_email'] : null;
        $this->user_status                      = (!empty($data['user_status'])) ? $data['user_status'] : null;
        $this->user_register_date               = (!empty($data['user_register_date'])) ? $data['user_register_date'] : null;
        $this->user_register_medium             = (!empty($data['user_register_medium'])) ? $data['user_register_medium'] : null;
        $this->user_last_login                  = (!empty($data['user_last_login'])) ? $data['user_last_login'] : null;
        $this->user_phone_number_validated      = (!empty($data['user_phone_number_validated'])) ? $data['user_phone_number_validated'] : null;
        $this->user_email_validated             = (!empty($data['user_email_validated'])) ? $data['user_email_validated'] : null;

	}

    public function getArrayCopy()
    {
         return get_object_vars($this);
    }


}
?>
