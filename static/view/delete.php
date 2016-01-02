<!DOCTYPE html>
<html>
<head>
	<title>用户删除</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
	<?php
    error_reporting(0);
    require_once 'commonfunc.php';
    $url = 'index.php';
     $Username = $_POST['Username'] ;

    $dbc = mysqli_connect('localhost','root','6581526','mms_t')
        or die('数据查询失败');

     $query = "DELETE from userInfo where Username = '$Username'";

     $res = mysqli_query($dbc,$query);

    if($res){
        $mes = '删除成功';
    }else{
        $mes = '删除失败';
    }
    alertMes($mes,$url);
    mysqli_close($dbc);
?>

</body>
</html>
 
 