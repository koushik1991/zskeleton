<?php
	namespace Corporateadmin\Model;
    use Zend\Db\TableGateway\TableGateway;
    use Zend\Db\ResultSet\ResultSet;
    use Zend\Session\Container;
    use Zend\Db\Sql\Sql;
    use Zend\Db\Sql\Predicate;
    use Zend\Db\Sql\Where;
    use Zend\Db\Sql\Select;
    class corporateadminsTable
    {
        protected $tableGateWay;
        public function __construct(TableGateway $tableGateway)
        {
            $this->tableGWay = $tableGateway;
        }
        public function insertdata($data)
        {
            $result = $this->tableGWay->insert($data);
            return $this->tableGWay->lastInsertValue;
        }
        public function selectdata($data)
        {
          $array = array();
          $result = $this->tableGWay->select($data);
           $getRow = $result->count();
            if($getRow>0){
               foreach ($result as $rSet) {
                $array[] = array(
                    'corporate_admin_id'=>$rSet->corporate_admin_id,
                    'first_name' => $rSet->first_name,
                    'last_name' => $rSet->last_name,
                    'password' =>$rSet->password
                );
            }
            return $array;  
            }
            else
            {
               return 0; 
            }
        }
        public function updatedata($data,$where)
        {
            $rowsetupdate = $this->tableGWay->update($data,$where);
        }
    }
?>
