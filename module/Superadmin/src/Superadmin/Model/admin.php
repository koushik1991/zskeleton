<?php
namespace Admin\Model;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\Validator\Digits;
class admin
{
	public $id;
    public $name;
    public $userId;
    public $email;
    public $password;
    public $lastLogin;
    
	function exchangeArray($data)
	{
        $this->id       = (!empty($data['id'])) ? $data['id'] : null;
		$this->name     = (!empty($data['name'])) ? $data['name'] : null;
		$this->userId   = (!empty($data['userId'])) ? $data['userId'] : null;
        $this->email    = (!empty($data['email'])) ? $data['email'] : null;
		$this->password = (!empty($data['password'])) ? $data['password'] : null;
		$this->lastLogin= (!empty($data['lastLogin'])) ? $data['lastLogin'] : null;
	}

    public function getArrayCopy()
    {
         return get_object_vars($this);
    }


}
?>
