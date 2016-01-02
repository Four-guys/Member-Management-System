<?php
/**
 * Created by PhpStorm.
 * User: luke
 * Date: 2016/1/2
 * Time: 13:19
 */
error_reporting(0);
header("Content-Type:text/html;charset=utf-8");
require_once 'commonfunc.php';
$username = $_POST['username'];
$reward = (int)$_POST['reward'];
$url = 'index.php';
//数据库连接模块
include("sqlconnect.php");

$sql = "select Points from userInfo where Username = '{$username}'";
$res=mysql_query($sql);
if($res && mysql_num_rows($res)>0){
    $row = mysql_fetch_array($res);
    $points=$row['Points'];
    $sql = "select requre_point from reward_info where id = {$reward}";
    $row = mysql_fetch_array(mysql_query($sql));
    $requires = $row['requre_point'];
    if($points<$requires){
        $mes = '积分不足';
        $url = 'recharge.html';
    }else{
        //减去积分
        $points = $points - $require;
        $sql = "update userInfo set Points = {$points} where Username = '{$username}'";
        $res=mysql_query($sql);
        //增加礼物
        $sql = "update userInfo set reward_id = {$reward} where Username = '{$username}'";
        $res=mysql_query($sql);
        if($res){
            $mes = '兑换成功';
            $url = 'index.php';
        }
        else{
            $mes = '兑换失败';
            $url = 'recharge.html';
        }
    }
}else{
    $mes = '用户不存在';
    $url = 'recharge.html';
}
alertMes($mes,$url);
?>