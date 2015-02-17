<?php 
setcookie("id", "", time()-3600);
header("Location: login_a.php");
?>