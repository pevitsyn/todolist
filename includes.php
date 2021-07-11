<?php
session_start();
global $link;
$link = mysqli_connect('host','user','password','database') or die("not connected");
echo ('<center>');
echo ('<a href="index.php">WIEW TASKS </a>');
echo ('<a href="form.php">ADD ONE </a>');
if (!isset($_SESSION['id'])){
	echo ('<a href="enter.php">LOGIN </a>');
}
else{  
    echo ('<a href="exit.php">LOGOUT </a>');  
}
echo ('</center>');


	?>