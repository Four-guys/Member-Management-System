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
$reward = $_POST['reward'];
$url = 'index.php';
//数据库连接模块
include("sqlconnect.php");

$sql = "select Points,reward_name from userInfo where Username = '{$username}'";
$res=mysql_query($sql);
if($res && mysql_num_rows($res)>0){
    $row = mysql_fetch_array($res);
    $points=$row['Points'];
    $reward_list = $row['reward_name'];
    $sql = "select require_point from reward_info where reward_name = '{$reward}'";
    $res = mysql_query($sql);
    if($res && mysql_num_rows($res)>0)
    {
        $row = mysql_fetch_array($res);
        $requires = $row['require_point'];
        if($points<$requires){
            $mes = '积分不足';
            $url = 'exchange.html';
        }else{
            //减去积分
            $points = $points - $requires;
            //echo $points;
            $sql = "update userInfo set Points = {$points} where Username = '{$username}'";
            $res=mysql_query($sql);
            //增加礼物
            $reward_list = $reward_list.'|'.$reward;
            $sql = "update userInfo set reward_name = '{$reward_list}' where Username = '{$username}'";
            $res=mysql_query($sql);
            if($res){
                $mes = '兑换成功';
                $url = 'index.php';
            }
            else{
                $mes = '兑换失败';
                $url = 'exchange.php';
            }
        }
    }else{
        $mes = '商品不存在';
        $url = 'exchange.php';
    }
}else{
    $mes = '用户不存在';
    $url = 'exchange.php';
}
mysql_close($link);
alertMes($mes,$url);
?>