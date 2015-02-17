<?php 
    $id = $_COOKIE["id"];
    $fee = 1;
    $db = new mysqli("localhost","root","nana1013","bath");
    $db -> query("SET NAMES utf8");
	$stmt = $db->prepare("UPDATE `shower` SET `etime` =?, `charge` = ? WHERE `id`=? AND etime=''");
	$stmt -> bind_param("sss", time(), $fee, $id);
	$stmt -> execute();
	$stmt->close();
    echo "true";
?>