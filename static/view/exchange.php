<!DOCTYPE html>
<html>
<head>
	<title>积分兑换</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<link rel="stylesheet" type="text/css" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="mms.css">

</head>
<body>
    <?php include("templates/navbar.html"); ?>
    <?php
    error_reporting(0);
    header("Content-Type:text/html;charset=utf-8");
    require_once 'commonfunc.php';
    include("sqlconnect.php");
    $sql = "select * from reward_info";
    $res = mysql_query($sql);
    ?>
	<div class="chargeMain">
		<table class="table table-hover table-bordered table-condensed">
		<thead>
			<tr>
				<th>商品名</th>
				<th>所需积分</th>
			</tr>
		</thead>
		<tbody>
        <?php
        if($res && mysql_num_rows($res)>0){
                while($row = mysql_fetch_array($res))
                {
                    echo '
                        <tr data-toggle="modal" data-target="#myModal">
                        <th class="name">'.$row['reward_name'].'</th>
                        <td class="price">'.$row['require_point'].'</td>
                        </tr>';
                }
            }else{
                $mes = '无可兑换商品';
                $url = 'index.php';
                alertMes($mes,$url);
            }
            mysql_close($link);

        ?>
		</tbody>
	</table>
	</div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" class="modalBox">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">确认购买</h4>
      </div>
        <form action="doexchange.php" method="post">
            <div class="modal-body modalBuyBody">
                <div class="name"></div>
                <div class="price"></div>
                用户：<input type="text" name="username" id="Username" />
                <input type="hidden" name="reward" class="reward" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                <input type="submit" onclick="return check()" class="btn btn-primary">
            </div>
        </form>
    </div>
  </div>
</div>
<!-- necessary for jQuery -->
<script type="text/javascript" src="../bower_components/jquery/dist/jquery.js"></script>

<!-- necessary for Bootstrap's javascript plugins -->
<script type="text/javascript" src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<script>
	$('#myModal').on('show.bs.modal', function (event) {
		var test = event.relatedTarget;
		var name = $(test).find('.name').text();
		var price = $(test).find('.price').text();
		$('#myModal').find('.name').text("兑换商品：" + name);
		$('#myModal').find('.price').text("所需积分：" + price);
        $('.reward').attr("value",name);
	});
    function check() {
        var name = document.getElementById("Username").value;
        if (name == "") {
            alert("请输入用户名");
            return false;
        }
        else {
            return true;
        }
    }
</script>
</body>
</html>