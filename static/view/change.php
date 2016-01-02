<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>用户修改</title>
</head>
<body>
  <h2>成功修改！！</h2>

<?php
  $Username = $_POST['Username'];
  $Sex = $_POST['Sex'];
  $Phonenumber = $_POST['Phonenumber'];
  $Userlevel = $_POST['Userlevel'];

  $dbc = mysqli_connect('localhost','Eric','19950704w09','mms_t')
    or die('数据插入失败，请重新插入1');

  $query = "UPDATE userInfo SET Username = '$Username', Sex = '$Sex', 
  Phonenumber='$Phonenumber', Userlevel = '$Userlevel' WHERE  Username = '$Username'";

  $result = mysqli_query($dbc,$query) or die('数据插入失败，请重新插入2');

  mysqli_close($dbc);


  echo '<h2>感谢您参与.数据修改成功</h2>';
  
?>

</body>
</html>
