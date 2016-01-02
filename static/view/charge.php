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
                <div class="form-group">
                    <label class="col-sm-2 control-label">用户</label>
                    <div class="col-sm-8 test">
                        <input type="text" name="username" class="form-control" placeholder="用户名">
                    </div>
                    <label class="col-sm-2 control-label">充值</label>
                    <div class="col-sm-8 test">
                        <input type="text" name="balance" class="form-control" placeholder="充值金额">
                    </div>
                    <div class="col-sm-2">
                        <input type="submit">
                    </div>
                </div>
            </div>
        </form>
	</div>

<!-- necessary for jQuery -->
<script type="text/javascript" src="../bower_components/jquery/dist/jquery.js"></script>

<!-- necessary for Bootstrap's javascript plugins -->
<script type="text/javascript" src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
<?php include("templates/_footer.html"); ?>