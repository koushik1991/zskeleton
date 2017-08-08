<?php
namespace Login\Model;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\Validator\Digits;
class users
{
	public $user_id;
    public $role_id;
    public $connected_artist_id;
    public $user_name;
    public $password;
    public $first_name;
    public $last_name;
    public $phone_number;
    public $email;
    public $fb_oauth;
    public $currency;
    public $language;
    public $mobile_validated;
    public $email_validated;
    public $created_date;
    public $updated_date;
    public $notification_pref;
    public $active_status;


	function exchangeArray($data)
	{
        $this->user_id          = (!empty($data['user_id'])) ? $data['user_id'] : null;
        $this->role_id          = (!empty($data['role_id'])) ? $data['role_id'] : null;
        $this->connected_artist_id          = (!empty($data['connected_artist_id'])) ? $data['connected_artist_id'] : null;
        $this->user_name        = (!empty($data['user_name'])) ? $data['user_name'] : null;
        $this->password         = (!empty($data['password'])) ? $data['password'] : null;
        $this->first_name       = (!empty($data['first_name'])) ? $data['first_name'] : null;
        $this->last_name        = (!empty($data['last_name'])) ? $data['last_name'] : null;
        $this->phone_number     = (!empty($data['phone_number'])) ? $data['phone_number'] : null;
        $this->email            = (!empty($data['email'])) ? $data['email'] : null;
        $this->fb_oauth         = (!empty($data['fb_oauth'])) ? $data['fb_oauth'] : null;
        $this->currency         = (!empty($data['currency'])) ? $data['currency'] : null;
        $this->language         = (!empty($data['language'])) ? $data['language'] : null;
        $this->mobile_validated = (!empty($data['mobile_validated'])) ? $data['mobile_validated'] : null;
        $this->email_validated  = (!empty($data['email_validated'])) ? $data['email_validated'] : null;
        $this->created_date     = (!empty($data['created_date'])) ? $data['created_date'] : null;
        $this->updated_date     = (!empty($data['updated_date'])) ? $data['updated_date'] : null;
        $this->notification_pref= (!empty($data['notification_pref'])) ? $data['notification_pref'] : null;
        $this->active_status    = (!empty($data['active_status'])) ? $data['active_status'] : null;

	}

    public function getArrayCopy()
    {
         return get_object_vars($this);
    }


}
?>
