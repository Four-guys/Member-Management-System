<?php

require_once 'AdminService.class.php';
$id=$_POST['id'];
$password=$_POST['password'];


$adminService=new AdminService();
$name=$adminService->checkAdmin($id,$password);
if($name!=""){

//??
        header("Location:stuManager.php?name=$name");
        exit();
}else{

//??
        header("Location:login.php?errno=1");
        exit();

}
