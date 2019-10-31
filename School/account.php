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
	  $sql_u= "SELECT * FROM students WHERE username= '$username'";
	  $sql_e= "SELECT * FROM students WHERE email= '$email'";
	  $res_u= mysqli_query($conn,$sql_u) or die(mysqli_error($conn));
	  $res_e= mysqli_query($conn,$sql_e) or die(mysqli_error($conn));
	  
	  if (mysqli_num_rows($res_u)>0){
		  
		  $name_error="Sorry, username already taken!";
	  }else if(mysqli_num_rows($res_e)>0){
		  $email_error= "Sorry, email already taken!";
	  }else{
		  
	   $query= "INSERT INTO students VALUES(null,'".$username."','".$password."','".$name."','".$phone."','".$email."')";
    
	   $result=mysqli_query($conn,$query);
       
	   echo" Your account has been created!You can login now!";
	 
	  }
	  
  
	  
 }
	  
     function get_post($conn,$var)  // to avoid injection attack
   {
       return $conn->real_escape_string($_POST[$var]);
   }

?>
