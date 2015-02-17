<?php
   $id = $_COOKIE["id"];
   $con = new mysqli("localhost","root","nana1013","bath");
   $con->query("SET NAMES utf8");
   $sql = "select * from `credit` where `id`=".$id;
   $result = $con -> query($sql);
   $row = mysqli_fetch_array($result);
   $credit = $row ['credit'];
?>
<div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">
                    信用积分
                </h3>
            </div>
            <div class="panel-body">
                您当前的信用积分为： <strong><?echo $credit;?></strong>
            </div>
</div>