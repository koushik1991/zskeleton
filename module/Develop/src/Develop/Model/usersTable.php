<?php
	namespace Develop\Model;
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
            $result_check_alternate_phone_number = array();
            $result_check_email = array();
            $result_check_phone_number = array();

            $sql = new Sql($this->tableGWay->adapter);

            $check_email = $sql->select()
                          ->from($this->tableGWay->getTable())
                          ->where(array('user_email'=>$data['user_email']));

            $check_phone_number = $sql->select()
                          ->from($this->tableGWay->getTable())
                          ->where( array('user_phone_number'=> $data['user_phone_number']));

            if($data['user_altername_phone_number'] != "") {
                $check_alternate_phone_number = $sql->select()
                    ->from($this->tableGWay->getTable())
                    ->where( array('user_altername_phone_number'=>$data['user_altername_phone_number']));
                $result_check_alternate_phone_number = $this->tableGWay->selectWith($check_alternate_phone_number);
            }

            $result_check_email = $this->tableGWay->selectWith($check_email);
            $result_check_phone_number = $this->tableGWay->selectWith($check_phone_number);

            if(count($result_check_email) == 0 &&
               count($result_check_phone_number) == 0 &&
               count($result_check_alternate_phone_number) == 0) {
                $rowset = $this->tableGWay->insert($data);
                $response['userRegisterId'] = $this->tableGWay->lastInsertValue;
                $response['registerStatus'] = true;
                $response['code'] = 1;
            } else if(count($result_check_email) != 0) {
                $response['submittedValue'] = $data;
                $response['registerStatus'] = false;
                $response['code'] = 2; // means email id is exists
            } else if(count($result_check_phone_number) != 0) {
                $response['submittedValue'] = $data;
                $response['registerStatus'] = false;
                $response['code'] = 3; // means phone number is exists
            } else if(count($result_check_alternate_phone_number) != 0) {
                $response['submittedValue'] = $data;
                $response['registerStatus'] = false;
                $response['code'] = 4; // means phone number is exists
            }

            return $response;
        }

        public function registrationIdExistanceCheck($user_id)
        {
            $response = array();
            $sql = new Sql($this->tableGWay->adapter);
            $select = $sql->select()
                          ->from($this->tableGWay->getTable())
                          ->where(array('user_id' => $user_id));

            $resultSet = $this->tableGWay->selectWith($select);

            if(count($resultSet) == 0) {
                $response['userFound'] = 'NO';
            } else {
                $response['userFound'] = 'YES';
            }
            return $response;
        }

        public function weblogin($data)
        {
            $response = array();
            $sql = new Sql($this->tableGWay->adapter);
            $select = $sql->select()
                          ->from($this->tableGWay->getTable())
                          ->where($data);

            $resultSet = $this->tableGWay->selectWith($select);

            if(count($resultSet) == 0) {
                $response['userFound'] = 'NO';
            } else {
                $update =array('user_last_login' => date('Y-m-d h:i:s'));
                $resultSetUpdate = $this->tableGWay->update($update,$data);
                $response['userFound'] = 'YES';
                $response['userdetails'] = $resultSet;
            }
            return $response;
        }

    }
?>
