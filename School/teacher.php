<?php
session_start();
include('userauthentication.php');
include("connection.php");
include ('header.php');

       
?>
<html><head>
<title></title>
<link rel="stylesheet" href="school.css"/>
</head>
<body>
<h2>Hello, <?php echo $_SESSION['username'];?>!</h2>
<h2><a href="logout.php">Logout</a></h2>
<?php
 //delete my data
       if(isset($_POST['delete']) && isset($_POST['idcourse']))
       {
           $idcourse=get_post($conn,'idcourse');
           $query="DELETE FROM courses WHERE idcourse='$idcourse'";
         //  echo $query;      WHEN YOU WANT TO CHECK WHERE THE PROBLEM IS, TO DEBUG
           $result= $conn->query($query);
           if(!$result) echo "DELETE FAILED<br><br>";
       }
       
	    //insert command to savedata in mysql

       if(isset($_POST['title']) &&
          isset($_POST['lenght'])) 
          
    {
       $title=get_post($conn,'title');
       $lenght=get_post($conn,'lenght');
     
      $query= "INSERT INTO courses(title,lenght)VALUES('$title','$lenght')";

      $result=$conn->query($query);
      if(!$result) echo "INSERT failed<br><br>";
    }


	 function get_post($conn,$var)
   {
       return $conn->real_escape_string($_POST[$var]);
   }

?>

	<form action="teacher.php" method="post">
            Title:<input type="text" name="title"></br>
            Lenght:<input type="text" name="lenght"></br>
                  <input type="submit" value="ADD">
        </form>

<?php

    $query="SELECT * FROM courses";
   $result=$conn->query($query);

   if(!$result) die ('Database access failed');

   $rows= $result->num_rows;

 echo' <table id="mytable">';
   for($j=0; $j < $rows; ++$j)
   {
   $row= $result->fetch_array(MYSQLI_NUM);

   $r0= htmlspecialchars($row[0]);
   $r1= htmlspecialchars($row[1]);
   $r2= htmlspecialchars($row[2]);
  echo '<th>idcourse</th><th>Title</th><th>Lenght</th>';
  echo' <tr style= "border: 1px solid black">';
  echo '<td style= "border: 1px solid black" >'.$r0.'</td>';
  echo '<td style= "border: 1px solid black">'.$r1.'</td>';
  echo '<td style= "border: 1px solid black">'.$r2.'</td>';
  echo '<td style= "border: 1px solid black">';

 ?>
 
 
 <form action="teacher.php" method="post">
    <input type="hidden" name="delete" value="yes">
    <input type="hidden" name="idcourse" value="<?php echo $r0; ?>">
    <input type="submit" value="DELETE RECORD">
</form>



      <?php
  echo '</td>';
echo '</tr>';

   }


echo'</table>';

        ?>
<div id="footer">
            <?php
            include ('footer.php');
            ?>
         
        </div>
</body>
</html>