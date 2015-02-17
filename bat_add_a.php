<?php
$id = $_GET['id'];
$con = new mysqli("localhost", "root", "nana1013", "bath");
$con->query("SET NAMES utf8");
$sql = "INSERT INTO `bath`.`bathroom` (`id`, `state`, `time1`, `time2`, `time3`, `time4`, `time5`, `time6`, `time7`, `time8`, `time9`, `time10`, `time11`, `time12`, `time13`, `time14`, `time15`, `time16`, `time17`, `time18`, `time19`, `time20`) VALUES (NULL, 'true', '#', '#', '#', '#', '#', '#', '#', '#', '#', '#', '#', '#', '#', '#', '#', '#', '#', '#', '#', '#');";
$con->query($sql);
header("Location:bat_manage.php");
?>