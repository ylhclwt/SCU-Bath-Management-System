<?php
$time = $_GET['time'];
$id = $_COOKIE["id"];
$con = new mysqli("localhost", "root", "nana1013", "bath");
$con->query("SET NAMES utf8");
$sql = "select * from `appointment_state` where `user_id`='" . $id . "'";
$result = $con->query($sql);
$row = mysqli_fetch_array($result);
if ($row != null) echo "1";
else {
    $i = 1;
    $boolean = true;
    $sql2 = "select * from `bathroom`";
    $result = $con->query($sql2);
    while ($boolean && ($row2 = mysqli_fetch_array($result))) {
        if($row2['state']=='false')
        {
            $i++;
            continue;
        }
        for ($j = 1; $j <= 20; $j++) {
            if ($time == $row2['time' . $j]) {
                $i++;
                break;
            } else if ($row2['time' . $j] == '#') {
                $sql1 = "UPDATE `bathroom` SET `time" . $j . "` ='" . $time . "' WHERE `id`='" . $i . "'";
                $sql2 = "INSERT INTO `appointment_state`(`user_id`, `bathroom_id`, `appointment_time`) VALUES ('" . $id . "','" . $i . "','" . $time . "')";
                $con->query($sql1);
                $con->query($sql2);
                $boolean = false;
                echo "2";
                exit;
            }
        }
    }
    echo "3";
} 
?>