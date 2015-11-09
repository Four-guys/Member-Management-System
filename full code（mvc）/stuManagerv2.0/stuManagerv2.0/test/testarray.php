<?php

require_once '../SqlHelper.class.php';

$sqlHelper=new SqlHelper();

$sql="select * from student limit 0,200";
$x=$sqlHelper->execute_dql2($sql);
print_r($x);
