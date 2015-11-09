<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf8"/>
</head>
<h1>student admin system</h1>
<form action="loginProcess.php" method="post">
<?php 

	

	if(!empty($_GET['errnum'])){
	$errnum=$_GET['errnum'];
	 if($errnum==1){
	echo "<font color='red' size='3'>密码错误</font>";
	}
	}
?>
<table>
<tr><td>user's id</td><td><input type="text" name="id"/></td></tr>
<tr><td>user's password</td><td><input type="password" name="password"/></td
</tr>
<tr>
<td><input type="submit" value="log in"></td>
<td><input type="reset" value="reset"></td>
</tr>
</table>
</form>
</html>
