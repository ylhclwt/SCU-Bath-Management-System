<div class="panel panel-success">
    <div class="panel-heading">
        <h3 class="panel-title">
            模拟洗澡
        </h3>
    </div>
    <div class="panel-body"><?php 
    $id = $_COOKIE["id"];
    $db = new mysqli("localhost","root","nana1013","bath");
    $db -> query("SET NAMES utf8");
    $stmt = $db->prepare("SELECT * FROM `shower` WHERE `id`=? AND `etime`=''");
    $stmt -> bind_param("s",$id);
    $stmt -> execute();
    $result = $stmt -> fetch();
    $stmt->close();
    if($result){?><blockquote>
            <p>
                此页面模拟学生洗澡的操作，用于测试系统是否正常工作。
            </p>
        </blockquote>
        <div id="w">
        </div>
        <button id="start" class="btn btn-success" style="display:none" type="button" onclick="ajax('r','stu_shower_a.php','6','start')">
            开始洗澡
        </button>
		<button id="stop" class="btn btn-danger" type="button" onclick="ajax('r','stu_shower_b.php','6','stop')">
            停止洗澡
        </button><?}else{?><blockquote>
            <p>
                此页面模拟学生洗澡的操作，用于测试系统是否正常工作。
            </p>
        </blockquote>
        <div id="w">
        </div>
        <button id="start" class="btn btn-success" type="button" onclick="ajax('r','stu_shower_a.php','6','start')">
            开始洗澡
        </button>
        <button id="stop" class="btn btn-danger" style="display:none" type="button" onclick="ajax('r','stu_shower_b.php','6','stop')">
            停止洗澡
        </button><?}?>
    </div>
</div>