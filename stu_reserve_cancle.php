<?php
	$id = $_COOKIE["id"];
	$db = new mysqli("localhost","root","nana1013","bath");
	$db->query("SET NAMES utf8");
	
	//从appointment_state表取到预约的时间和浴室号
	$stmt = $db->prepare("select appointment_time, bathroom_id from `appointment_state` where `user_id`=?");
	$stmt -> bind_param("s",$id);
	$stmt -> execute();
	$stmt -> bind_result($time, $bath_id);
	$stmt -> fetch();
	$stmt -> close();

	//从appointment_state表中删除记录
	$stmt = $db->prepare("delete from `appointment_state` where `user_id`=?");
	$stmt -> bind_param("s",$id);
	$stmt -> execute();
	$stmt -> close();
	
	//取回bathroom表
	$sql = "select * from `bathroom`";
	$result = $db -> query($sql);
	$flag = true;

	while ($flag && ($row = mysqli_fetch_array($result))) {
		for ($j = 1; $j <= 20; $j++) {
            if ($time == $row['time' . $j]) {
				$sql = "UPDATE `bathroom` SET `time".$j."` ='#' WHERE `id`='".$bath_id."'";
				$db -> query($sql);
				$flag = false;
                break;
            } 
        }
	}
    header("Location: stu_record.php");
?>
	