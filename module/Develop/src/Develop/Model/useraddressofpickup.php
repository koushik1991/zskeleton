<?php
namespace Develop\Model;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\Validator\Digits;
class useraddressofpickup
{
	public $pickup_address_id;
    public $user_id;
    public $p_address_1;
    public $p_address_2;
    public $p_address_land_mark;
    public $p_address_lat;
    public $p_address_lang;
    public $p_address_pincode;
    public $p_address_city;
    public $p_address_state;
    public $p_address_country;
    public $p_address_contact;
    public $p_address_verified;
    public $p_address_registered_date;
    public $p_address_verified_date;

    function exchangeArray($data)
	{
        $this->pickup_address_id = (!empty($data['pickup_address_id'])) ? $data['pickup_address_id'] : null;
        $this->user_id = (!empty($data['user_id'])) ? $data['user_id'] : null;
        $this->p_address_1 = (!empty($data['p_address_1'])) ? $data['p_address_1'] : null;
        $this->p_address_2 = (!empty($data['p_address_2'])) ? $data['p_address_2'] : null;
        $this->p_address_land_mark = (!empty($data['p_address_land_mark'])) ? $data['p_address_land_mark'] : null;
        $this->p_address_lat = (!empty($data['p_address_lat'])) ? $data['p_address_lat'] : null;
        $this->p_address_lang = (!empty($data['p_address_lang'])) ? $data['p_address_lang'] : null;
        $this->p_address_pincode = (!empty($data['p_address_pincode'])) ? $data['p_address_pincode'] : null;
        $this->p_address_city = (!empty($data['p_address_city'])) ? $data['p_address_city'] : null;
        $this->p_address_state = (!empty($data['p_address_state'])) ? $data['p_address_state'] : null;
        $this->p_address_country = (!empty($data['p_address_country'])) ? $data['p_address_country'] : null;
        $this->p_address_contact = (!empty($data['p_address_contact'])) ? $data['p_address_contact'] : null;
        $this->p_address_verified = (!empty($data['p_address_verified'])) ? $data['p_address_verified'] : null;
        $this->p_address_registered_date = (!empty($data['p_address_registered_date'])) ? $data['p_address_registered_date'] : null;
        $this->p_address_verified_date = (!empty($data['p_address_verified_date'])) ? $data['p_address_verified_date'] : null;

	}

    public function getArrayCopy()
    {
         return get_object_vars($this);
    }


}
?>
