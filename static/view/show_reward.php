<?php
/**
 * Created by PhpStorm.
 * User: luke
 * Date: 2016/1/2
 * Time: 15:19
 */
error_reporting(0);
header("Content-Type:text/html;charset=utf-8");
include("sqlconnect.php");
$sql = "select * from reward_info";
$res = mysql_query($sql);
if($res && mysql_num_rows($res)>0){
    while($row = mysql_fetch_array($res))
    {
        echo "{$row['Id']},{$row['reward_name']},{$row['require_point']} <br>";
    }
}else{
    $mes = '无可兑换商品';
    $url = 'index.php';
}
mysql_close($link);
alertMes($mes,$url);
?>