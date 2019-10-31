<?php
session_start();
include('userauthentication.php');
include('connection.php');


if(isset($_POST['courses']))
{ 

    /*.. do the query ... */
 $idstudent=$_SESSION['idstudent'];
 $idcourse=$_POST['courses'];
	
	 $query= "INSERT INTO enroll VALUES(null,'".$idstudent."','".$idcourse."')";
	 
	 $result=mysqli_query($conn,$query);
      
      if(!$result)
	  {
		 echo "INSERT failed<br><br>";
	  
	 header('Location:panel.php');
	  }
	
}

?>
