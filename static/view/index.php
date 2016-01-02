<!doctype html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no" />
    <title>会员管理系统</title>
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="mms.css">
    <script type="text/javascript" src="assets/jquery-1.11.3.min.js"/></script>
    <script type="text/javascript" src="assets/bootstrap/js/bootstrap.js"/></script>
    <!-- 2.CSS样式 -->
</head>
<body>
<?php include("templates/navbar.html"); ?>
<!--not login-->
<?php
if($username == null){
?>
<div class="requireLogin background">
    <form action="doAction.php" method="post">
        <div class="form-group">
            <h1 class="textCenter">请登录</h1>
            <label>管理员用户名</label>
            <input type="text" class="form-control" name="username">
            <br/>
            <label>密码</label>
            <input type="password" class="form-control" name="password">
            <br>
            <input type="submit" align="center">
        </div>
    </form>
</div>
<?php
}else{
?>
<!--after login-->
<div class="indexInfoBox">
    <table class="table table-hover table-bordered table-condensed">
        <thead>
        <tr>
            <th>ID</th>
            <th>姓名</th>
            <th>性别</th>
            <th>电话</th>
            <th>等级</th>
            <th>余额</th>
            <th>积分</th>
        </tr>
        </thead>
        <tbody>

        <?php

        include("sqlconnect.php");

        $query = "SELECT * from userInfo";
        $result = mysql_query($query) or die('数据查询失败');

        while ($row = mysql_fetch_array($result)){
            echo '<tr data-toggle="modal" data-target="#myModal">';

            echo '<td calss="ID">'.$row['Id'].'</td>';
            echo '<td class="name>'.$row['Username'].'</td>';
            echo '<td class="name>'.$row['Username'].'</td>';
            echo '<td class="sex">'.$row['Sex'].'</td>';
            echo '<td class="tel">'.$row['Phonenumber'].'</td>';
            echo '<td class="level">'.$row['Userlevel'].'</td>';
            echo '<td>'.$row['Balance'].'</td>';
            echo '<td>'.$row['Points'].'</td>';

            echo '</tr>';

        }

        mysql_close($link);
        ?>

        </tbody>
    </table>
</div>

<div class="addInfo textCenter">
    <h4>增加会员</h4>
    <button data-toggle="modal" data-target="#myModal" class="add">添加</button>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" class="modalBox">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">修改资料</h4>
                <h4 class="ID"></h4>
            </div>
            <form method = "post" action="add.php" class="select">
                <div class="modal-body modalBody">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">姓名</label>
                        <div class="col-sm-10 test">
                            <input  type="text" id="Username" name="Username" class="form-control name">
                        </div>
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">性别</label>
                        <div class="col-sm-10">
                            <input  type="text" id="Sex" name="Sex" class="form-control sex">
                        </div>
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">电话</label>
                        <div class="col-sm-10">
                            <input  type="text" id="Phonenumber" name="Phonenumber" class="form-control tel">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">等级</label>
                        <div class="col-sm-10">
                            <input  type="text" id="Userlevel" name="Userlevel" class="form-control level">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">返回</button>
                    <button type="submit" class="btn btn-primary">保存</button>
                    <button type="submit" class="btn btn-primary btn-delete">删除</button>
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
        var ID = $(test).find('.ID').text();
        var name = $(test).find('.name').text();
        var sex = $(test).find('.sex').text();
        var tel = $(test).find('.tel').text();
        var level = $(test).find('.level').text();

        if (test.tagName == "BUTTON")
        {
            $('#myModal').find('.btn-delete').attr('disabled','disabled');
            $('#myModal').find('.select').attr('action','add.php');
        } else {
            $('#myModal').find('.btn-delete').removeAttr("disabled");
            $('#myModal').find('.select').attr('action','change.php');
        }

        $('#myModal').find('.ID').text("ID : " + ID);
        $('#myModal').find('.name').attr('placeholder', name);
        $('#myModal').find('.sex').attr('placeholder', sex);
        $('#myModal').find('.tel').attr('placeholder', tel);
        $('#myModal').find('.level').attr('placeholder',level);

        $('.btn-delete').click(function(){
            $('#myModal').find('.select').attr('action','delete.php');
        });
    });
</script>
<?php
}
?>
</body>
</html>
<?php include("templates/_footer.html"); ?>
