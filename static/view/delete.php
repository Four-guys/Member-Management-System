<!DOCTYPE html>
<html>
<head>
	<title>用户删除</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
	<?php
  $Username = $_POST['Username'] ;

  $dbc = mysqli_connect('localhost','Eric','19950704w09','mms_t')
    or die('数据查询失败');

  $query = "DELETE from userInfo where Username = '$Username'";

  $result = mysqli_query($dbc,$query) or die('不存在该出版社');

  echo '<h2>数据删除成功</h2>';
?>

</body>
</html>
 
 