<?php
   $id = $_COOKIE["id"];
   $con = new mysqli("localhost","root","nana1013","bath");
   $con->query("SET NAMES utf8");
   $sql = "select * from `user` where `id`=".$id;
   $result = $con -> query($sql);
   $row = mysqli_fetch_array($result);
   $user = $row ['username'];
   $sql = "select * from `balance` where `id`=".$id;
   $result = $con -> query($sql);
   $row = mysqli_fetch_array($result);
   $balance = $row ['balance'];
?>
<div class="row">
    <div class="col-md-3">
        <div class="panel panel-info">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-user">
                </span>
                <?echo $user;?> 您好！
                <button class="btn btn-danger" type="button" onclick="ajax('c','logout_a.php')">
                    登出
                </button>
            </div>
            <div class="panel-body text-info">
                <span class="glyphicon glyphicon-credit-card">
                </span>
                账户余额： <?echo $balance;?> 元
                <button type="button" class="btn btn-success right" data-toggle="modal" data-target="#charge">充值</button>
            </div>
            <div class="list-group">
                <a class="list-group-item text-info" onclick="ajax('r','stu_reserve.php','2')">
                    <span class="glyphicon glyphicon-tint">
                    </span>
                    预约洗澡
                </a>
                <a class="list-group-item text-info" onclick="ajax('r','stu_record.php')">
                    <span class="glyphicon glyphicon-th-list">
                    </span>
                    预约查询
                </a>
                <a class="list-group-item text-info" onclick="ajax('r','stu_list.php')">
                    <span class="glyphicon glyphicon-search">
                    </span>
                    消费记录
                </a>
                <a class="list-group-item text-info" onclick="ajax('r','stu_credit.php')">
                    <span class="glyphicon glyphicon-thumbs-up">
                    </span>
                    信用积分
                </a>
                <a class="list-group-item text-info" onclick="ajax('r','all_password_modify.php')">
                    <span class="glyphicon glyphicon-repeat">
                    </span>
                    修改密码
                </a>
                <a class="list-group-item text-info" onclick="ajax('r','stu_shower.php')">
                    <span class="glyphicon glyphicon-play">
                    </span>
                    模拟洗澡
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-8" id="r">
      <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">
                    预约洗澡
                </h3>
            </div>
            <div class="panel-body">
               <blockquote><p>为方便同学洗澡我们引入了网上预约系统，</br>
                  但这样可能会出现浴室被预约但是预约人不能按时消费造成浴室资源浪费的情况。</br>
                  为了减少这种情况的发生，我们引入了信用积分系统。</br>
                  每人每学期初始积分为10分，持卡人第一次发生预约未能按时消费扣1分，</br>
                  第二次扣2分，以此类推，直至第四次积分会降为0分。</br>
                  当积分归零时，该校园卡会被冻结，一个月内该卡不能在浴室消费。</br>
                  校园卡的积分会在每个学期开始时恢复为初始值十分。</p>
                  <small><abbr title="Sichuan University Bathroom Management System" class="initialism">SCUBMS</abbr> 开发组</small>
               </blockquote>
                <button class="btn btn-success btn-lg" type="button" onclick="ajax('r','stu_reserve.php','2')">
                    点击预约
                </button>
            </div>
        </div>
     </div>
</div>

<!-- Modal -->
<div class="modal fade" id="charge" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">关闭</span></button>
        <p class="modal-title" id="myModalLabel">扫描二维码充值</p>
      </div>
      <div class="modal-body">
        <img src="images/qrcode.jpg">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">完成</button>
      </div>
    </div>
  </div>
</div>