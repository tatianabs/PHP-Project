<?php
session_start();
include('connection.php');

if(empty($_POST['username']) || empty($_POST['password'])) {
	header('Location: index.php');
	exit();
}
else{
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

$query = "select username ,idstudent from students where username = '{$username}' and password = '{$password}'";

$result = mysqli_query($conn, $query);

$row = mysqli_num_rows($result); //for integer
$line=mysqli_fetch_assoc($result);         // **when its a string or $line= $result->fetch_assoc();

if($row ==1 || ($username=="magister" && $password=="signum"))
{
	$_SESSION['username'] = $username;
	
    
}



if(isset($_SESSION['username'])) 
{
	if( $_SESSION['username']== "magister")
	{
		 header('Location: teacher.php');
		 
	} 
	 else
	 {
		 $_SESSION['idstudent']= $line['idstudent'];
		header('Location: panel.php');
	
		
	 } 
}
else
{
	
$_SESSION['not_user'] = true;
header('Location: index.php');
}

}
?>

