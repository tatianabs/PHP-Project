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
 

<?php

 $sql_inner= " SELECT * from courses 
 inner join enroll on courses.idcourse = enroll.idcourse
 where idstudent=  " .$_SESSION['idstudent'];


$result= mysqli_query($conn,$sql_inner);

if(mysqli_num_rows($result )>0)
{   echo <<<END
		<h3><p>----- These are your courses ------</p><h3> 
<div class="display">
<table id="display_table">
<tr>
	<th>IdCourse</th>
	<th>Title</th>
	<th>Lenght</th>
</tr>
END;

	while($row=mysqli_fetch_array($result))
	{
		
		?>
		<tr>
	<td><?php echo $row["idcourse"]; ?></td>
	<td><?php echo $row["title"]; ?></td>
	<td><?php echo $row["lenght"]; ?></td>
		</tr>
		<?php
	}
} 
else
{
	echo "<h3><p> Haven't you enrolled in a course yet?</p><h3>";
}
?>

</table>
</div>     
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
<p>
<?php
if( isset($_SESSION['alreadyEnroll']) && $_SESSION['alreadyEnroll'] == true)
{
	echo $_SESSION['messEnroll'];
	unset($_SESSION['alreadyEnroll']);
}
else if( isset($_SESSION['alreadyEnroll']) && $_SESSION['alreadyEnroll'] == false)
{
	echo $_SESSION['messEnroll'];
	unset($_SESSION['alreadyEnroll']);
}
 ?>

</p>
</div>

<div id="footer">
<?php  include ('footer.php');?>
   
 </div>
</body>
</html>



