<?php
/**
 * Created by PhpStorm.
 * User: luke
 * Date: 2015/11/7
 * Time: 14:03
 */
error_reporting(0);
header("Content-Type:text/html;charset=utf-8");
require_once 'commonfunc.php';
$username = $_POST['username'];
$password = $_POST['password'];
//$fileInfo = $_FILES['myFile'];
$act = $_GET['act'];
//数据库连接模块
include("sqlconnect.php");
//$password=md5($password);
$sql ="select * from admin where Username = '{$username}'and Passwd='{$password}'";
$res=mysql_query($sql);
if($res && mysql_num_rows($res)>0){
    Session_Start();
    $_SESSION['user_id']=$res['id'];
    $_SESSION['username']=$username;
    $mes = '登录成功';
    $url = 'index.php';
}else{
    $mes = '登录失败';
$url = 'login.html';
}
mysql_close($link);
alertMes($mes,$url);
?>