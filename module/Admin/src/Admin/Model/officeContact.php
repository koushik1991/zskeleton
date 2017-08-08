<?php
namespace Admin\Model;
class officeContact
{
	public $office_id;
    public $office_title;
    public $office_address_1;
    public $office_address_2;
    public $office_city;
    public $office_pincode;
    public $office_state;
    public $office_country;
    public $office_lat;
    public $office_lang;
    public $office_landline;
    public $office_phone_1;
    public $office_phone_2;
    public $office_email;
	function exchangeArray($data)
	{
		$this->office_id        = (!empty($data['office_id'])) ? $data['office_id'] : null;
		$this->office_title     = (!empty($data['office_title'])) ? $data['office_title'] : null;
		$this->office_address_1 = (!empty($data['office_address_1'])) ? $data['office_address_1'] : null;
		$this->office_address_2 = (!empty($data['office_address_2'])) ? $data['office_address_2'] : null;
		$this->office_city      = (!empty($data['office_city'])) ? $data['office_city'] : null;
		$this->office_pincode   = (!empty($data['office_pincode'])) ? $data['office_pincode'] : null;
		$this->office_state     = (!empty($data['office_state'])) ? $data['office_state'] : null;
		$this->office_country   = (!empty($data['office_country'])) ? $data['office_country'] : null;
		$this->office_lat       = (!empty($data['office_lat'])) ? $data['office_lat'] : null;
		$this->office_lang      = (!empty($data['office_lang'])) ? $data['office_lang'] : null;
		$this->office_landline  = (!empty($data['office_landline'])) ? $data['office_landline'] : null;
		$this->office_phone_1   = (!empty($data['office_phone_1'])) ? $data['office_phone_1'] : null;
		$this->office_phone_2   = (!empty($data['office_phone_2'])) ? $data['office_phone_2'] : null;
		$this->office_email     = (!empty($data['office_email'])) ? $data['office_email'] : null;
	}
    public function getArrayCopy()
    {
         return get_object_vars($this);
    }
}
?>
