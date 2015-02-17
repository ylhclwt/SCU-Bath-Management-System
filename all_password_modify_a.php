<?php
	$id=$_COOKIE["id"];
	$used_pass=''.$_GET["used_pass"];
	$new_pass=''.$_GET["new_pass"];
	$con = new mysqli("localhost","root","nana1013","bath");
	$con->query("SET NAMES utf8");
    $sql = "select * from `user` where `id`='".$id."'";
	$result = $con -> query($sql);
    $row = mysqli_fetch_array($result);
    $password = $row ['password'];

	if(md5($used_pass)==$password){
		$sql = "UPDATE `user` SET `password`='".md5($new_pass)."' WHERE `id`='".$id."'";
	    $con -> query($sql);
		echo "true";
	}
	else
		echo "false";
?>