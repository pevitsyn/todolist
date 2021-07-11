<?php
include 'includes.php';
unset($_SESSION['id']);
unset($_SESSION['login']);
unset($_SESSION['password']);
header("Location: index.php");
exit();
?>