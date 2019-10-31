<?php
session_start();
$_SESSION['alreadyEnroll'] = false;
include('userauthentication.php');
include('connection.php');


if(isset($_POST['courses']))
{ 

    /*.. do the query ... */
 $idstudent=$_SESSION['idstudent'];
 $idcourse=$_POST['courses'];
    
	$check= "SELECT * from enroll where idstudent= '".$idstudent."' AND idcourse= '".$idcourse."' ";
	$result=mysqli_query($conn,$check);
    $checkrows= mysqli_num_rows($result);
	
	if($checkrows >0)
	{
		
        //header( "refresh:3;url=panel.php" );
		$_SESSION['alreadyEnroll'] = true;
		$_SESSION['messEnroll'] = " You can't enroll in a same course twice.Please choose another course or logout!";
		
	}
	else  //insert results from the form input
	{
		$query= "INSERT INTO enroll VALUES(null,'".$idstudent."','".$idcourse."')";
	 
	 $result=mysqli_query($conn,$query);
	 $_SESSION['alreadyEnroll'] = false;
		$_SESSION['messEnroll'] = " You've been enrolled in a course";
	  
	   
      if(!$result)
	  {
		
	  
	  header( "refresh:3;url=panel.php" );
	  echo "INSERT failed<br><br>";
	  }
	  
	}
	header('Location:panel.php');
 }

?>