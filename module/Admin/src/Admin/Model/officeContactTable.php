<?php
	namespace Admin\Model;
    use Zend\Db\TableGateway\TableGateway;
    use Zend\Db\ResultSet\ResultSet;
    use Zend\Db\Sql\Sql;
    class officeContactTable
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
                    'office_id' => $rSet->office_id,
                    'office_title' => $rSet->office_title,
                    'office_address_1' => $rSet->office_address_1,
                    'office_address_2'=>$rSet->office_address_2,
                    'office_city' => $rSet->office_city,
                    'office_pincode' => $rSet->office_pincode,
                    'office_state' => $rSet->office_state,
                    'office_country' => $rSet->office_country,
                    'office_lat' => $rSet->office_lat,
                    'office_lang' => $rSet->office_lang,
                    'office_landline' => $rSet->office_landline,
                    'office_phone_1' => $rSet->office_phone_1,
                    'office_phone_2' => $rSet->office_phone_2,
                    'office_email' => $rSet->office_email
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
