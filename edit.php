<?php
include 'includes.php';
   if ($_SESSION['id']=='1'){
    if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = "SELECT name, email, task, state FROM todolist WHERE id = '$id'";
    $result = mysqli_query($link, $query);
    if(mysqli_num_rows($result)==1){
        $row=mysqli_fetch_array($result);
        if($row){
            $name = $row['name'];
            $email = $row['email'];
			$task = $row['task'];
			$state = $row['state'];
			if($state=='0'){  
				$checked=''; 
			}
			else {
				$checked='checked';
			}
            echo "
                <h2>Edit Todolist</h2>
                
            <form action='edit.php?id=$id' method='post'>
            <p>name</p>
             <input type='text' name='name' value='$name'>
             <p>email</p>
             <input type='text' name='email' value='$email'>
			 <p>task</p>
             <input type='text' name='task' value='$task'>
			 <p>check if task is completed</p>
             <input type='checkbox' name='state' value='$state' $checked>
             <br>
             <input type='submit' name='submit' value='update'>
            </form>
            ";
        }
    }else{
        echo "no todo";
    }
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
		$task = $_POST['task'];
	    $state = $_POST['state'];
		if ($state=='0'){
			$state='1';
		}
        $query = "UPDATE todolist SET name = '$name', email = '$email', task = '$task', state = '$state'  WHERE id = '$id'";
        $insertEdited = mysqli_query($link, $query);
        if($insertEdited){
            echo "successfully updated";
			header("Location: ".$_SERVER['HTTP_REFERER']);
			header("Location: ".$_SERVER['HTTP_REFERER']);

			

        }
        else{
            echo mysqli_error($link);
        }
    }
}
 }
 else {
	 echo 'not accessed';
 }
?>