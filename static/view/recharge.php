<?php
/**
 * Created by PhpStorm.
 * User: luke
 * Date: 2016/1/2
 * Time: 12:42
 */

error_reporting(0);
header("Content-Type:text/html;charset=utf-8");
require_once 'commonfunc.php';
$username = $_POST['username'];
$balance = (float)$_POST['balance'];
$url = 'index.php';
if($balance<0){
    $url = 'charge.php';
    $mes = '充值金额不正确';
    alertMes($mes,$url);
}
//数据库连接
//数据库连接模块
include("sqlconnect.php");

$sql = "select Balance from userInfo where Username = '{$username}'";
$res=mysql_query($sql);
if($res && mysql_num_rows($res)>0){
    $row = mysql_fetch_array($res);
    $balance=$balance+$row['Balance'];
    //echo $balance;
    $sql = "update userInfo set Balance = {$balance} where Username = '{$username}'";
    $res=mysql_query($sql);
    if($res){
        $mes = '充值成功';
        $url = 'index.php';
    }
    else{
        $mes = '充值失败';
        $url = 'charge.php';
    }
}else{
    $mes = '用户不存在';
    $url = 'charge.php';
}
mysql_close($link);
alertMes($mes,$url);
?>