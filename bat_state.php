<?
    $db = new mysqli("localhost","root","nana1013","bath");
    $db -> query("SET NAMES utf8");
    $db -> query("select * from `shower` where `etime`=''");
	$num = $db -> affected_rows;
?><div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">
                    浴室状态
                </h3>
            </div>
            <div class="panel-body">
                <p>当前共有 <strong><?echo $num<0?0:$num;?></strong> 人洗澡</p>
            </div>
        </div>