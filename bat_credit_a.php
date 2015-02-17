<?php
$id = $_GET['id'];
$con = new mysqli("localhost", "root", "nana1013", "bath");
$con->query("SET NAMES utf8");
$sql = "SELECT * FROM `credit` WHERE `id`='" . $id . "'";
$con->query($sql);
$result = $con->affected_rows;
if ($result > 0) {
    echo "true";
    $sql = "UPDATE `credit` SET `credit`='10' WHERE `id`='" . $id . "'";
    $con->query($sql);
} else echo "false";
?>