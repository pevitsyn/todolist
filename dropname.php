<?php
include 'includes.php';
unset($_SESSION['name']);


header("Location: index.php");
exit();
?>