<?php
/**
 * Created by PhpStorm.
 * User: luke
 * Date: 2015/11/8
 * Time: 20:02
 */
error_reporting(0);
session_start();
header("Content-Type:text/html;charset=utf-8");
require_once 'commonfunc.php';
session_unset();
session_destroy();
$mes='退出成功';
$url='index.php';
alertMes($mes,$url);
?>