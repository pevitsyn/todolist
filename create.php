<?php
include 'includes.php';
if (isset($_POST['submit'])) {
    $name   = $_POST['name'];
    $email  = $_POST['email'];
    $task   = $_POST['task'];
    $query  = "INSERT INTO todolist(name, email, task)     VALUES ('$name', '$email', '$task')";
    $insert = mysqli_query($link, $query);
    if ($insert) {
        echo 'successfully';
    } else {
        echo mysqli_error($link);
    }
    mysqli_close($link);
    header("Location: index.php");
}
?> 