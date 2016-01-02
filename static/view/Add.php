<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>新增用户</title>
</head>
<body>
  <?php

  $Username = $_POST['Username'];
  $Sex = $_POST['Sex'];
  $Phonenumber = $_POST['Phonenumber'];
  $Userlevel = $_POST['Userlevel'];

  $dbc = mysqli_connect('localhost','Eric','19950704w09','mms_t')
    or die('数据插入失败，请重新插入');


  $query = "INSERT INTO userinfo ( Username,Sex,Phonenumber,Userlevel ) Values ('$Username','$Sex','$Phonenumber','Userlevel')";
    

  $result = mysqli_query($dbc,$query) or die('数据插入失败，请重新插入');

  mysqli_close($dbc);

  echo '数据成功插入';
  
?>
</body>
</html>



