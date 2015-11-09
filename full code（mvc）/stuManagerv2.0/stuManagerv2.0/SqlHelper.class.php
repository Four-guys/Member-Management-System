<?php 
    class SqlHelper {

    public $conn;
    public $dbname="stuadminsystem";
    public $username="root";
    public $password="";
    public $host="localhost";


    public function __construct(){

        $this->conn=mysql_connect($this->host,$this->username,$this->password);
        if(!$this->conn){
            die("????".mysql_error());
        }
        mysql_select_db($this->dbname,$this->conn);
    }


    //??dql??
    public function execute_dql($sql){

        $res=mysql_query($sql,$this->conn) or die(mysql_error());
        return $res;

    }

	public function execute_dql2($sql){
		$arr=array();
		$i=0;

		$res=mysql_query($sql,$this->conn) or die (mysql_error());

		while($row=mysql_fetch_assoc($res)){
			$arr[$i++]=$row;
            //可以直接写成$arr[]=$row,这样赋值，自动++
		}

		return $arr;
		mysql_free_result($res);
		
	}
    //??dml??

    public function execute_dml($sql){
        $b=mysql_query($sql,$this->conn);
        if(!$b){
            return 0;
        }else{
            if(mysql_affected_rows($this->conn>0)){
                return 1;
            }else{
				return 2;
			}
        }

    }

    //???????
    public function close_connect(){
        if(!empty($this->conn))
			mysql_close($this->conn);
    }


}
