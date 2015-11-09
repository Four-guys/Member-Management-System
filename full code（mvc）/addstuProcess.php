<?php
require_once 'StuService.class.php';

$name=$_GET['name'];
$grade=$_GET['grade'];
$email=$_GET['email'];
$score=$_GET['score'];


$stuService=new StuService();
$res=$stuService->adduser($name,$grade,$email,$score);
echo $res;
