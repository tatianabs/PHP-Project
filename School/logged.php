<?php
session_start();
?>

<?php
$_SESSION['username']= $_POST['username'];
$_SESSION['password']= $_POST['password'];

if(isset($_SESSION['username']) && isset($_SESSION['password'])){
	header("location:student.php");
}elseif($_SESSION['username']=="magister") && isset($_SESSION['password']=="signum"){
	header("location:teacher.php");

}else{
	echo "Username and/or password invalid!";
	header("location:login.php");
}

?>
if (condition) {
    code to be executed if this condition is true;
} elseif (condition) {
    code to be executed if this condition is true;
} else {
    code to be executed if all conditions are false;
}