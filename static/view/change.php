<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>用户修改</title>
</head>
<body>
<?php
error_reporting(0);
require_once 'commonfunc.php';
$url = 'index.php';
  $Username = $_POST['Username'];
  $Sex = $_POST['Sex'];
  $Phonenumber = $_POST['Phonenumber'];
  $Userlevel = $_POST['Userlevel'];

  $dbc = mysqli_connect('localhost','root','6581526','mms_t')
    or die('数据修改失败');

  $query = "UPDATE userInfo SET Username = '$Username', Sex = '$Sex', 
  Phonenumber='$Phonenumber', Userlevel = '$Userlevel' WHERE  Username = '$Username'";

  $res = mysqli_query($dbc,$query) ;

   if($res){
       $mes = '修改成功';
   }else{
       $mes = '修改失败';
   }
    alertMes($mes,$url);
    mysqli_close($dbc);
  
?>

</body>
</html>
