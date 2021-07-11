<?php
include 'includes.php'; 
$query = "SELECT name, email, task, id, state FROM todolist WHERE id";
$_SESSION['query']=$query;
if(isset($_POST['submit'])){
    $_SESSION['showcompleted']=$_POST['completed'];
	$_SESSION['showuncompleted']=$_POST['uncompleted'];
}
 
if ($_SESSION['showcompleted']=='1'&&!$_SESSION['showuncompleted']){ 
    $_SESSION['query']=$query." AND state=1"; ;
} 
else if (!$_SESSION['showcompleted']&&$_SESSION['showuncompleted']=='1'){ 		
	$_SESSION['query']=$query." AND state=0";; 
	}  
else {
	$_SESSION['query']="SELECT name, email, task, id, state FROM todolist WHERE id"; 
	$_SESSION['showcompleted']='1';
	$_SESSION['showuncompleted']='1'; 		 
	}
		  
if (isset ($_GET['email'])){
    $_SESSION['email']=$_GET['email'];
}
if (isset ($_GET['name'])){
    $_SESSION['name']=$_GET['name'];
}
		
if ($_SESSION['showcompleted']=='1'&&!$_SESSION['showuncompleted']){ 
	$checked1='checked';
	$checked2='';
}
else if (!$_SESSION['showcompleted']&&$_SESSION['showuncompleted']=='1'){ 
	$checked1='';
	$checked2='checked';
}
else {
    $checked1='checked';
	$checked2='checked';
}
		
if (isset($_SESSION['email'])){
	$ins=$_SESSION['email'];
	$sort = ' AND email ='.$ins;
	$_SESSION['query']=$_SESSION['query'].$sort;
		}
if (isset($_SESSION['name'])){
	$ins=$_SESSION['name'];
	$sort = ' AND name ='.$ins;
	$_SESSION['query']=$_SESSION['query'].$sort;
		}
		
if (!isset($_GET['page'])){	
	$_SESSION['page']='1';
}
 		
$page = $_GET['page'];
$from = $page*3;
$to=3; 
$pager=" LIMIT $from,$to";
		 		
$pag=mysqli_query($link, $_SESSION['query']);	    
$amnt = mysqli_num_rows($pag);
$_SESSION['query']=$_SESSION['query'].$pager;		
$result = mysqli_query($link, $_SESSION['query']);
	
?> 

<!doctype html> 
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title></title>
  </head>
  <body>
 <table class="table">
<tr> 
  <?php  
   if(mysqli_num_rows($result)>= 1){
 while($row = mysqli_fetch_array($result)){
 $name = $row['name'];
 $email = $row['email'];
 $task = $row['task'];
 $id = $row['id']; 
 $state = $row['state'];
 echo '<td>'; 
 echo $name;
 if ($state == '1'){
	 echo '<span class="badge badge-secondary badge-pill">done</span>';	
 }
 echo '<br>';
 if (!isset ($_SESSION['name'])){
 echo ("<a href=\"index.php?name='$name'\">Sort by name</a>");
}
 echo '<br>';
 echo $task;
 echo '<br>';
 echo $email;
 echo '<br>';
 if (!isset ($_SESSION['email'])){
 echo ("<a href=\"index.php?email='$email'\">Sort by email</a>");
}
 if ($_SESSION['id']=='1'){
 echo '<br>';
 echo ("<a href=\"edit.php?id=$id\">Edit</a>");
 echo '<br>';
 } 
 } 
}
 echo '</td>'; 
  ?> 
  </tr>
  </table>
  <p class="lead">
  <center>
  <?php
  $i=0;
while ($i<ceil(mysqli_num_rows($pag)/3)){
	echo ("<span class=\"badge badge-secondary badge-pill\"><a href=\"index.php?page=$i\">$i</a></span>");
	$i=$i+1;
}
 if (isset ($_SESSION['email'])){
	 echo ("<br>items with email $email are shown <a href=\"dropemail.php\">Show all emails</a>");
 }	
 if (isset ($_SESSION['name'])){
	 echo ("<br>items with name $name are shown <a href=\"dropname.php\">Show all names</a>");
 }	
 
 echo "
<form action='index.php' method='post'>
			 show compl.  
             <input type='checkbox' name='completed' value='1' $checked1>
             <br>
			 show incom.
			 <input type='checkbox' name='uncompleted' value='1' $checked2>
             <br>
             <input type='submit' name='submit' value='update'>
            </form>
			
			<form action='index.php' method='get'>
			 sort names  
            <input type='radio' id='asc'
            name='names' value='asc'>
            <label for='asc'>alphabet asc</label>

            <input type='radio' id='desc'
            name='names' value='desc'>
            <label for='desc'>alphabet desc</label>

            <input type='radio' id='ord'
            name='names' value='ord'>
            <label for='ord'>by order</label>
	
	
	        <button type='submit'>Submit</button>

            </form>
			";
 
?>  
</center>
</p>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>