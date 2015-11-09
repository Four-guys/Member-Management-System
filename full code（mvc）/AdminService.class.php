<?php 
require_once 'SqlHelper.class.php';

class AdminService{

        public function checkAdmin($id,$password){
        $sql="select password,name from admin where id=$id";
        //????SqlHelper??
        $sqlHelper=new SqlHelper();
        $res=$sqlHelper->execute_dql($sql);
        if($row=mysql_fetch_assoc($res)){

            //????
            if(md5($password)==$row['password']){
                return $row['name'];
            }
        }

        //????
        mysql_free_result($free);
        //????
        $sqlHelper->close_connect();

        return false;
    }
    }
