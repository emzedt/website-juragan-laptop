<?php 

session_start();
session_destroy();

header("Location: loginadmin.php");
setcookie("cookieUser", $user, time() - 5000);
?>