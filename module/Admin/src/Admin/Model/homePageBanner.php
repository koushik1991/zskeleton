<?php
namespace Admin\Model;
class homePageBanner
{
	public $banner_id;
    public $banner_image_path;
    public $banner_alt_text;
    public $banner_create_date;
    public $banner_isVisible;
    public $banner_redirect;

	function exchangeArray($data)
	{
		$this->banner_id = (!empty($data['banner_id'])) ? $data['banner_id'] : null;
		$this->banner_image_path = (!empty($data['banner_image_path'])) ? $data['banner_image_path'] : null;
		$this->banner_alt_text = (!empty($data['banner_alt_text'])) ? $data['banner_alt_text'] : null;
		$this->banner_create_date = (!empty($data['banner_create_date'])) ? $data['banner_create_date'] : null;
		$this->banner_isVisible = (!empty($data['banner_isVisible'])) ? $data['banner_isVisible'] : null;
		$this->banner_redirect = (!empty($data['banner_redirect'])) ? $data['banner_redirect'] : null;
	}

    public function getArrayCopy()
    {
         return get_object_vars($this);
    }

}
?>
