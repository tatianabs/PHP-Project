<?php
session_start();
include("connection.php");

$username=($_POST['username']);
$password=($_POST['password']);
$name=($_POST['name']);
$phone=($_POST['phone']);
$email=($_POST['email']);

 //insert command to savedata in mysql

       if(isset($_POST['username']) &&                                                                  
          isset($_POST['password']) &&
          isset($_POST['name']) &&
		  isset($_POST['phone']) &&
		  isset($_POST['email']))
  {
	       $query= "INSERT INTO students VALUES(null,'".$username."','".$password."','".$name."','".$phone."','".$email."')";
    
	$result=mysqli_query($conn,$query);
      

      if(!$result)
	  {
		  $_SESSION['failed'] = true;
		 
		  header('Location: signin.php');
		
		
		

	  }
	  else
	  { 
	  $_SESSION['success']= true;
	   header('Location: login.php');
		
		 //echo "<script type='text/javascript'>alert('Register successfully!')</script>";
		;
	  }
	  
 }
	  
     function get_post($conn,$var)  // to avoid injection attack
   {
       return $conn->real_escape_string($_POST[$var]);
   }

?>

 	
		 
