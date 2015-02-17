<?php
    $id = $_COOKIE["id"];
	$con = new mysqli("localhost","root","nana1013","bath");
	$con->query("SET NAMES utf8");
    $sql = "select * from `user` where `id`=".$id;
    $result = $con -> query($sql);
    $row = mysqli_fetch_array($result);
    $user = $row ['username'];
?>
<div class="row">
    <div class="col-md-3">
        <div class="panel panel-info">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-user">
                </span>
                <?echo $user;?> 您好！
                <button class="btn btn-danger" type="button" id="logout" onclick="ajax('c','logout_a.php')">
                    登出
                </button>
            </div>
            <div class="list-group">
                <a class="list-group-item text-info" onclick="ajax('r','adm_welcome.php')">
                    <span class="glyphicon glyphicon-credit-card">
                    </span>
                    系统管理员
                </a>
                <a class="list-group-item text-info" onclick="ajax('r','adm_add.php')">
                    <span class="glyphicon glyphicon-plus">
                    </span>
                    添加用户
                </a>
                <a class="list-group-item text-info" onclick="ajax('r','adm_upgrade.php')">
                    <span class="glyphicon glyphicon-upload">
                    </span>
                    管理用户
                </a>
                <a class="list-group-item text-info" onclick="ajax('r','adm_delete.php')">
                    <span class="glyphicon glyphicon-trash">
                    </span>
                    删除用户
                </a>
                <a class="list-group-item text-info" onclick="ajax('r','bat_state.php')">
                    <span class="glyphicon glyphicon-tint">
                    </span>
                    浴室状态
                </a>
                <a class="list-group-item text-info" onclick="ajax('r','bat_manage.php')">
                    <span class="glyphicon glyphicon-th-list">
                    </span>
                    管理浴位
                </a>
                <a class="list-group-item text-info" onclick="ajax('r','bat_balance.php')">
                    <span class="glyphicon glyphicon-usd">
                    </span>
                    查看用户余额
                </a>
                <a class="list-group-item text-info" onclick="ajax('r','bat_credit.php')">
                    <span class="glyphicon glyphicon-thumbs-up">
                    </span>
                    信用积分重置
                </a>
                <a class="list-group-item text-info" onclick="ajax('r','all_password_modify.php')">
                    <span class="glyphicon glyphicon-repeat">
                    </span>
                    修改密码
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-8" id="r"><?require('adm_welcome.php');?>
    </div>
</div>