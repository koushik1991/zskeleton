<?php
namespace Develop\Model;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\Validator\Digits;
class useraddresstodelivery
{
	public $delivery_address_id;
    public $user_id;
    public $d_address_1;
    public $d_address_2;
    public $d_address_land_mark;
    public $d_address_lat;
    public $d_address_lang;
    public $d_address_pincode;
    public $d_address_city;
    public $d_address_state;
    public $d_address_country;
    public $d_address_contact;
    public $d_address_verified;
    public $d_address_registered_date;
    public $d_address_verified_date;

    function exchangeArray($data)
	{
        $this->delivery_address_id = (!empty($data['delivery_address_id'])) ? $data['delivery_address_id'] : null;
        $this->user_id = (!empty($data['user_id'])) ? $data['user_id'] : null;
        $this->d_address_1 = (!empty($data['d_address_1'])) ? $data['d_address_1'] : null;
        $this->d_address_2 = (!empty($data['d_address_2'])) ? $data['d_address_2'] : null;
        $this->d_address_land_mark = (!empty($data['d_address_land_mark'])) ? $data['d_address_land_mark'] : null;
        $this->d_address_lat = (!empty($data['d_address_lat'])) ? $data['d_address_lat'] : null;
        $this->d_address_lang = (!empty($data['d_address_lang'])) ? $data['d_address_lang'] : null;
        $this->d_address_pincode = (!empty($data['d_address_pincode'])) ? $data['d_address_pincode'] : null;
        $this->d_address_city = (!empty($data['d_address_city'])) ? $data['d_address_city'] : null;
        $this->d_address_state = (!empty($data['d_address_state'])) ? $data['d_address_state'] : null;
        $this->d_address_country = (!empty($data['d_address_country'])) ? $data['d_address_country'] : null;
        $this->d_address_contact = (!empty($data['d_address_contact'])) ? $data['d_address_contact'] : null;
        $this->d_address_verified = (!empty($data['d_address_verified'])) ? $data['d_address_verified'] : null;
        $this->d_address_registered_date = (!empty($data['d_address_registered_date'])) ? $data['d_address_registered_date'] : null;
        $this->d_address_verified_date = (!empty($data['d_address_verified_date'])) ? $data['d_address_verified_date'] : null;

	}

    public function getArrayCopy()
    {
         return get_object_vars($this);
    }


}
?>
