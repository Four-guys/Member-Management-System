<?php
/**
 * Created by PhpStorm.
 * User: luke
 * Date: 2015/11/8
 * Time: 14:07
 */
error_reporting(0);
session_start();
$username = $_SESSION['username'];
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no" />
    <title>会员管理系统</title>
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.css">
    <style type="text/css">
    </style>
    <script type="text/javascript" src="assets/jquery-1.11.3.min.js"/></script>
    <script type="text/javascript" src="assets/bootstrap/js/bootstrap.js"/></script>
    <!-- 2.CSS样式 -->
</head>
<body>
<?php include("templates/navbar.html"); ?>

</body>
</html>
<?php include("templates/_footer.html"); ?>
