<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 15.10.2015
 * Time: 19:37
 */
class test
{
    protected $_base = '1';

    public function __construct($base){
        $this->_base = $base;
    }

    public function setBase($outSetBase){
        $this->_base = $outSetBase;
    }

    public function getBase(){
        return $this->_base;
    }
}
class DBConnect
{
    protected $_mySqlConnect;
    protected $_host = 'localhost';
    protected $_user = 'root';
    protected $_pas = '';
    protected $_dbName = 'progectFormdb';

    public function __construct(){
        $this->_sqlConnect();
    }

    public function __destruct(){
        $this->_mySqlClose();
    }

    protected function _sqlConnect(){
        $this->_mySqlConnect = mysqli_connect($this->_host, $this->_user, $this->_pas, $this->_dbName);
    }

    protected function _mySqlClose(){
        mysqli_close($this->_mySqlConnect);
        $this->_mySqlConnect = null;
    }
}

class DBquery extends DBConnect
{
    public function sqlQueryInsert($sqlQuery){
        $result = mysqli_query($this->_mySqlConnect, $sqlQuery);
        return $result;
    }

    public function sqlQuerySelect(){
        $result = mysqli_query($this->_mySqlConnect, 'SELECT * FROM names WHERE id=1');
        $data =  mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $data;
    }
}

$a = new DBConnect();
$b = new DBquery();
$c = new Test(2);
var_dump($b->sqlQuerySelect());
echo $c->getBase();
unset($a);
unset($b);
//echo $a->getBase();
//$a->setBase("yo");
//echo $a->getBase(111);