<?php
	namespace Login\Model;
    use Zend\Db\TableGateway\TableGateway;
    use Zend\Db\ResultSet\ResultSet;
    use Zend\Session\Container;
    use Zend\Db\Sql\Sql;
    use Zend\Db\Sql\Predicate;
    use Zend\Db\Sql\Where;
    use Zend\Db\Sql\Select;  
    class usersTable
    {
        protected $tableGateWay;
        public function __construct(TableGateway $tableGateway)
        {
            $this->tableGWay = $tableGateway;
        }
        public function checkandinsert($data)
        {
            $response = array();
            $sql = new Sql($this->tableGWay->adapter);
            $select = $sql->select()
                          ->from($this->tableGWay->getTable())
                          ->where(array('email'=>$data['email']));
            $resultSet = $this->tableGWay->selectWith($select);
            if(count($resultSet) == 0)
            {   
                $resultSet = $this->tableGWay->insert($data);
                $response['number'] = $this->tableGWay->lastInsertValue;
                
            } else {
                $response['number'] = 0;
                
            }
            return $response;
        }
        public function userlogin($data)
        {
            $response = array();
            $sql = new Sql($this->tableGWay->adapter);
            $select = $sql->select()
                          ->from($this->tableGWay->getTable())
                          ->where($data);
            $resultSet = $this->tableGWay->selectWith($select);
            
            if(count($resultSet) == 0)
            {   
                $response['userFound'] = 'NO';
                
            } else {
                $response['userFound'] = 'YES';
                foreach($resultSet as $rset)
                {    $response['userDetails'] = $rset;}
            }
            return $response;
        }
        public function allUsers()
        {
            $sql = new Sql($this->tableGWay->adapter);
            $select = $sql->select()->from($this->tableGWay->getTable());
            
            $resultSet = $this->tableGWay->selectWith($select);
            $returnArray = array();
            foreach($resultSet as $eachSet)
            {
                $returnArray[$eachSet->user_id] = $eachSet;
            }
            return $returnArray;
        }
    }
?>
