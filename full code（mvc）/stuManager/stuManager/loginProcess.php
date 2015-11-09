<?php

//recive the data form user's
//1.id
$id=$_POST['id'];
//2.password
$passwd=$_POST['password'];


$conn=mysql_connect("localhost","root","");
if(!conn){
    die("connect fail".mysql_errno());
	}

	//??????????
	mysql_query("set names utf8",$conn) or die (mysql_errno());



	//?????
	mysql_select_db("stuadminsystem",$conn) or die (mysql_errno());



$sql="select password,name from admin where id=$id";

$res=mysql_query($sql,$conn);
if($row=mysql_fetch_assoc($res)){
    //???
    //2.????????,????md5??  

    if($row['password']==md5($passwd)){

        //????
		$name=$row['name'];
        header("Location:stuManager.php?name=$name");
        exit();

    }
}
    header("Location:login.php?errno=1");
    exit();


    //????

    mysql_free_result($res);
    mysql_close($conn);
