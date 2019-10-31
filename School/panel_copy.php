<?php
session_start();
include('userauthentication.php');
include ('header.php');
include ('connection.php');
?>
<?php



$color1="whitesmoke";
$color2="teal";
$color= $color1;

?>
<h2>Hello, <?php echo $_SESSION['username'];?>!</h2>
<h2><a href="logout.php">Logout</a></h2>

<html><head>
 <link rel="stylesheet" href="school.css"/>
<title>Course enrollment</title>

</head>
<body>
<div id="student">
<h3><p> Haven't you enrolled in a course yet?</p><h3>        
<p>Choose your options:</p>
<form name="courses" method="post" action="enroll_copy.php">
<select name="courses" > 
<?php

$result_courses=$conn->query("SELECT * FROM courses");
while($rows= $result_courses->fetch_assoc())
{
	$color == $color1 ? $color= $color2 : $color= $color1;
	
	$idcourse=$rows['idcourse'];
	$title= $rows['title'];
	
	echo "<option value='$idcourse' style='background:$color;'>$title</option>";
	
}

?>
<input  type="submit" name="submit" value="Enroll">
</form>
</div>

<div id="footer">
<?php  include ('footer.php');?>
   
 </div>
</body>
</html>
