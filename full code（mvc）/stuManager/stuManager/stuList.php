<?php
//show all the student
echo "<meta http-equiv='content-type' content='text/html;charset=utf-8' />";
$conn=mysql_connect("localhost","root","") or die(mysql_error());


mysql_query("set names utf8",$conn);
mysql_select_db("stuadminsystem",$conn);

$pageNow=1;
$pageCount=0;
$rowCount=0;
$pageSize=3;


$sql="select count(id) from student";
$res1=mysql_query($sql);

if($row=mysql_fetch_row($res1)){
    $rowCount=$row[0];
}


if(!empty($_GET['pageNow'])){
	$pageNow=$_GET['pageNow'];
}
$pageCount=ceil($rowCount/$pageSize);
$sql="select * from student limit ".($pageNow-1)*$pageSize.",$pageSize";
$res=mysql_query($sql,$conn);

echo "<table border='1px' width='700px'>";
    echo "<tr>
            <th>ID</td>
            <th>name</th>
            <th>grade</th>
            <th>email</th>
            <th>score</th>
         </tr>";



while($row=mysql_fetch_assoc($res)){
    echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['name']}</td>
            <td>{$row['grade']}</td>
            <td>{$row['email']}</td>
            <td>{$row['score']}</td>
            <td><a href='#'>删除用户</a></td>
            <td><a href='#'>修改用户</a></td>

         </tr>";
    }           

echo "<h1>student message</h1>";
echo "</table>";

echo "all data is:".$rowCount."<br>";
echo "echo now$pageNow/all {$pageCount}page";

