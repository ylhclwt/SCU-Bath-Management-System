<?php
	$name=$_GET["name"];
	$id=$_GET["id"];
	$role=$_GET["role"];
	$con = new mysqli("localhost","root","nana1013","bath");
	$con->query("SET NAMES utf8");
    $sql = "insert into user(username,id,password,role) values('".$name."','".$id."','".md5($id)."',".$role.")";
	$con->query($sql);
	$result = $con -> affected_rows;
	if($role==3){
		$sql = "insert into balance(id,balance) values('".$id."','100')";
		$con->query($sql);
		$result += $con -> affected_rows;
		$sql = "insert into credit(id,credit) values('".$id."','10')";
		$con->query($sql);
		$result += $con -> affected_rows;
	}
	if($result > 0)
    	echo "true";
	else
    	echo "false";
?>
