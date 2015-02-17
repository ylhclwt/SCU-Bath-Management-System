<?php
	$id=$_GET["id"];
	$con = new mysqli("localhost","root","nana1013","bath");
	$con->query("SET NAMES utf8");

	$sql = "select * from `appointment_state` where `user_id`='".$id."'";
	$result = $con -> query($sql);
	$row = mysqli_fetch_array($result);

	$time = $row['appointment_time'];
	$bath_id = $row['bathroom_id'];

    $sql = "delete from `appointment_state` where `user_id`='".$id."'";
	$con -> query($sql);

	$sql = "select * from `bathroom`";
	$result = $con -> query($sql);
	$flag = true;

	while ($flag && ($row = mysqli_fetch_array($result))) {
		for ($j = 1; $j <= 20; $j++) {
            if ($time == $row['time' . $j]) {
                $sql = "UPDATE `bathroom` SET `time".$j."` ='#' WHERE `id`='".$bath_id."'";
				$con -> query($sql);
				$flag = false;
                break;
            } 
        }
	}

    $sql = "delete from user where id='".$id."'";
	$con->query($sql);
	$sql = "delete from balance where id='".$id."'";
	$con->query($sql);
	$sql = "delete from credit where id='".$id."'";
	$con->query($sql);
	header("Location: adm_delete.php");
?>