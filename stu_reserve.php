<div class="panel panel-success">
    <div class="panel-heading">
        <h3 class="panel-title">
            预约洗澡
        </h3>
    </div><div class="panel-body">
<?php 
    $id = $_COOKIE["id"];
    $con = new mysqli("localhost","root","nana1013","bath");
    $con->query("SET NAMES utf8");
    $sql = "select * from `credit` where `id`='".$id."'";
    $result = $con -> query($sql);
    $row = mysqli_fetch_array($result);
    if($row['credit']>0)
    {?><blockquote><p>您可以预约未来24小时内的时间段。</p></blockquote>
            <div class="form-group">
                <label for="dtp_input1" class="col-md-2 control-label">选择预约时间</label>
                <div class="input-group date form_datetime col-md-5" data-date="2014-12-20T05:25:07Z" data-date-format="yyyy/mm/dd p HH:ii" data-link-field="dtp_input1">
                    <input class="form-control" size="16" type="text" value="" id="time" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                </div>
                <input type="hidden" id="dtp_input1" value="" /><br/>
            </div>
            <div id="w"></div>
        <button class="btn btn-success btn-lg" type="button" onclick="reserve()">
            预约
        </button><?}else{?><div class="alert alert-danger">您当前信用积分为0，请至浴室管理员处重置！</div>
<?}?></div></div>