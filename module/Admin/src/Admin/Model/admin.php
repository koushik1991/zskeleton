<?php
namespace Admin\Model;
class admin
{
	public $admin_id;
    public $username;
    public $password;
	function exchangeArray($data)
	{
		$this->admin_id = (!empty($data['admin_id'])) ? $data['admin_id'] : null;
		$this->username = (!empty($data['username'])) ? $data['username'] : null;
		$this->password = (!empty($data['password'])) ? $data['password'] : null;
	}
    public function getArrayCopy()
    {
         return get_object_vars($this);
    }
}
?>
