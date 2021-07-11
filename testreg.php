<?php
include 'includes.php';
$login = $_POST['login']; 
$password=$_POST['password']; 
$result = mysqli_query($link,"SELECT * FROM users WHERE login='$login'"); 
$row = mysqli_fetch_array($result);
    if ($row['password']==$password) {
    $_SESSION['login']=$row['login']; 
    $_SESSION['id']=$row['id'];
    header("Location: index.php");
    }
 else {
    exit ("Try again");
    }
    ?>