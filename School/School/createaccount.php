<?php
$host="localhost";
$user="root";
$password="admin";
$database="school";

$conn= mysqli_connect($host,$user,$password,$database);
if($conn->connect_error)die("Fatal Error");


?>

<?php
$username=$_POST['username'];
$password=$_POST['password'];
$query= mysql_query("SELECT username,password FROM students WHERE username='$username' and password='$password'");

if($row >0)
{
	
	session_start();
$_SESSION['username']=$_POST['username'];
$_SESSION['password']=$_POST['password'];
echo "You are logged in!";
	
}







?>
