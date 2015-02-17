<?php
    $id = $_COOKIE["id"];
	$con = new mysqli("localhost","root","nana1013","bath");
    $con->query("SET NAMES utf8");
    $sql = "select * from `appointment_state` where `user_id`='".$id."'";
    $result = $con -> query($sql);
    $row = mysqli_fetch_array($result);
	$bathroom_id = $row['bathroom_id'];
	$time = $row['appointment_time'];
?>
<div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">
                    预约查询
                </h3>
            </div>
            <div class="panel-body">
            <?
                if($time==null)
                    echo "<p><strong>您当前无预约记录</strong></p>";
                else
                    echo "<p>您的预约时间为：<strong>".$time."</strong></br>浴位：<strong>".$bathroom_id."</strong></p>
                        <button class=\"btn btn-danger\" type=\"button\" onclick=\"ajax('r','stu_reserve_cancle.php')\">取消预约</button>

        <button class=\"btn btn-danger\" type=\"button\" onclick=\"ajax('r','stu_reserve_default.php')\">模拟违约</button>";
            ?>
            </div>
        </div>