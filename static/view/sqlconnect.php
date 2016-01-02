<?php
/**
 * Created by PhpStorm.
 * User: luke
 * Date: 2016/1/2
 * Time: 13:32
 */
//数据库连接
$link = mysql_connect('localhost','root','6581526') or die("Mysql连接失败");
//mysql_set_charset('UTF8');
mysql_select_db('mms_t') or die('指定数据库打开失败');
?>