<!DOCTYPE html>
<html>
<head>
	<title>用户充值</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<link rel="stylesheet" type="text/css" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="mms.css">

</head>
<body>
    <?php include("templates/navbar.html"); ?>
	<div class="chargeBox">
        <form action="recharge.php" method="post">
            <div class="userCreditBox">
                <br/>
                <!-- <div class="form-group">
                        <label class="col-sm-2 control-label" style="vertical-align:middle">用户</label>
                    <div class="col-sm-9 test">
                        <input type="text" name="username" class="form-control" placeholder="用户名">
                    </div>
                        <label class="col-sm-2 control-label">充值</label>
                    <div class="col-sm-9 test">
                        <input type="text" name="balance" class="form-control" placeholder="充值金额">
                    </div>
                    <div class="col-sm-12">
                        <input type="submit">
                    </div>
                </div> -->
                <div class="input-group input-group-lg">
                    <span class="input-group-addon" id="basic-addon1">用户</span>
                    <input type="text" id="username" name="username" class="form-control" placeholder="用户名" aria-describedby="basic-addon1">
                </div>
                <div class="input-group input-group-lg">
                    <span class="input-group-addon" id="basic-addon1">充值</span>
                    <input type="text" id="balance" name="balance" class="form-control" placeholder="充值金额" aria-describedby="basic-addon1">
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit" style="margin-top:30px" onclick="return check()"> 确 认 充 值</button>
            </div>
        </form>
	</div>
<script type="text/javascript">
    function check(){
        var user = document.getElementById("username").value;
        var balance = document.getElementById("balance").value;
        if(user == ""){
            alert("请填写用户名");
            return false;
        }
        else if((balance == "") || (parseFloat(balance) < 0) {
            alert("请填写充值金额");
            return false;
        }
        else{
            alert(parseFloat(balance) == -1);
            return true;
        }
    }
</script>
</body>
</html>
<?php include("templates/_footer.html"); ?>