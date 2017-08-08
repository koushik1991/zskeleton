<?php
	namespace Develop\Model;
    use Zend\Db\TableGateway\TableGateway;
    use Zend\Db\ResultSet\ResultSet;
    use Zend\Session\Container;
    use Zend\Db\Sql\Sql;
    use Zend\Db\Sql\Predicate;
    use Zend\Db\Sql\Where;
    use Zend\Db\Sql\Select;
    class useraddressofpickupTable
    {
        protected $tableGateWay;
        public function __construct(TableGateway $tableGateway)
        {
            $this->tableGWay = $tableGateway;
        }

        public function addPickupAddress($data)
        {
            $response = array();
            $rowset = $this->tableGWay->insert($data);
            $response['userRegisterId'] = $this->tableGWay->lastInsertValue;
            $response['registerStatus'] = true;
            $response['code'] = 1;
            return $response;
        }

    }
?>
