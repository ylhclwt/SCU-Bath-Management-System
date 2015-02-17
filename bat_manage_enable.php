<?php
   $id = $_GET['id'];
   $con = new mysqli("localhost","root","nana1013","bath");
   $con->query("SET NAMES utf8");
   $sql = "UPDATE `bathroom` SET `state`='true' WHERE `id`='".$id."'";
   $con -> query($sql);
   header("Location: bat_manage.php");
?>