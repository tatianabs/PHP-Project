<?php
session_start();
include('userauthentication.php');
include('connection.php');

?>
<html>
<head>
<title></title>
</head>
<body>
<div class="display">
<table id="display_table">
<tr>
	<th>IdCourse</th>
	<th>Title</th>
	<th>Lenght</th>
</tr>
<?php

 $sql_inner= " SELECT * from courses 
 inner join enroll on courses.idcourse = enroll.idcourse
 where idstudent=  " .$_SESSION['idstudent'];


$result= mysqli_query($conn,$sql_inner);

if(mysqli_num_rows($result )>0)
{     
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
?>


</table>
</div>
</body>
</html>