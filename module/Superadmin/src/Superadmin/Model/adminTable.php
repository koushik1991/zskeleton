<?php
	namespace Admin\Model;
    use Zend\Db\TableGateway\TableGateway;
    use Zend\Db\ResultSet\ResultSet;
    use Zend\Session\Container;
    use Zend\Db\Sql\Sql;
    use Zend\Db\Sql\Predicate;
    use Zend\Db\Sql\Where;
    use Zend\Db\Sql\Select;  
    class adminTable
    {
        protected $tableGateWay;
        public function __construct(TableGateway $tableGateway)
        {
            $this->tableGWay = $tableGateway;
        }
        public function fetchAllWithActiveStatus()
        {
            $sql = new Sql($this->tableGWay->adapter);
            $select = $sql->select()
                          ->from($this->tableGWay->getTable())
                          ->where(array('status'=>1))
                          ->order('rank ASC');
            
            $resultSet = $this->tableGWay->selectWith($select);
            return $resultSet;
        }
        
    }
?>
