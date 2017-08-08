<?php
	namespace Admin\Model;
    use Zend\Db\TableGateway\TableGateway;
    use Zend\Db\ResultSet\ResultSet;
    use Zend\Db\Sql\Sql;
    class homePageBannerTable
    {
        protected $tableGateWay;
        public function __construct(TableGateway $tableGateway)
        {
            $this->tableGWay = $tableGateway;
        }
        public function fetchall($query=null)
        {
            $resultSet = $this->tableGWay->select($query);
            $array = array();
            foreach ($resultSet as $rSet) {
                $array[] = array(
                    'banner_id' => $rSet->banner_id,
                    'banner_image_path' => $rSet->banner_image_path,
                    'banner_alt_text' => $rSet->banner_alt_text,
                    'banner_create_date'=>$rSet->banner_create_date,
                    'banner_isVisible' => $rSet->banner_isVisible,
                    'banner_redirect' => $rSet->banner_redirect
                    );
            }
            return $array;
        }
        public function insertdata($data)
        {
            return $rowset = $this->tableGWay->insert($data);
        }
        public function updateData($data,$where)
        {
            $res = $this->tableGWay->update($data,$where);
            return $res;
        }
        public function deleteData($where)
        {
            $rowset = $this->tableGWay->select($where);
            $res = $this->tableGWay->delete($where);
            return $res;
        }
    }
?>
