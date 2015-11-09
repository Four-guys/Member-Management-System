<?php
//show all the student
echo "<meta http-equiv='content-type' content='text/html;charset=utf-8' />";


require_once 'StuService.class.php';
$pageNow=1;
$pageCount=0;
$rowCount=0;
$pageSize=3;

if($_GET['pageNow']>1){
	$pageNow=$_GET['pageNow'];	
}

$stuService=new StuService();
$pageCount=$stuService->getPageCount($pageSize);
$res2=$stuService->getStuListByPage($pageNow,$pageSize);

echo "<table border='1px' width='700px'>";
    echo "<tr>
            <th>ID</td>
            <th>name</th>
            <th>grade</th>
            <th>email</th>
            <th>score</th>
         </tr>";

for($i=0;$i<count($res2);$i++)
{
    $row=$res2[$i];
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
$rowCount=$pageCount*$pageSize;
?>

<form action="stuList.php">
<input type="text" name="pageNow" />
<input type="submit" value="go" />
</form>
<?php
echo "all data is:".$rowCount."<br>";
echo "now:$pageNow/all :{$pageCount}page";

