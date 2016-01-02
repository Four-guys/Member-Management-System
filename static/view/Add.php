<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>新增用户</title>
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
    or die('数据插入失败，请重新插入');


  $query = "INSERT INTO userinfo ( Username,Sex,Phonenumber,Userlevel ) Values ('$Username','$Sex','$Phonenumber','Userlevel')";
    

  $res = mysqli_query($dbc,$query) or die('数据插入失败，请重新插入');
  if($res){
      $mes = '添加成功';
  }else{
      $mes = '添加失败';
  }
  alertMes($mes,$url);
  mysqli_close($dbc);
?>
</body>
</html>



