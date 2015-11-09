<?php
require_once 'SqlHelper.class.php';

class StuService{
	
	public function adduser($name,$grade,$email,$score){
	$sql="insert into student(name,grade,email,score)values('$name','$grade',$email,$score)";
	$sqlHelper=new SqlHelper();
	$res=$sqlHelper->execute_dml($sql);
	$sqlHelper->close_connect;
	return $res;
	}

	public function getPageCount($pageSize){
	$sql="select count(id) from student";
	$sqlHelper=new SqlHelper();
	$res=$sqlHelper->execute_dql($sql);

	//calcute
	if($row=mysql_fetch_row($res)){
		$pageCount=ceil($row[0]/$pageSize);
	}
	//free
	return $pageCount;
	}
	
	public function getStuListByPage($pageNow,$pageSize){
	$sql="select * from student limit ".($pageNow-1)*$pageSize.",$pageSize";
	$sqlHelper=new SqlHelper();
	$res2=$sqlHelper->execute_dql2($sql);
	
	//free
	return $res2;
	}
	
	
	public function showallstudents(){
	
	}

}
