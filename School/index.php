<?php
// Start the session
session_start();

?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
         <link rel="stylesheet" href="school.css"/>
        <title>Education School</title>
    </head>
    <body>
        <div id="header">
           <?php
        include ('header.php');
        ?>  
        </div>
		 <?php
	     if(isset($_SESSION['not_user'])):
		?>
		<div class="notification">
		 <p>ERROR: Username or password are wrong.</p>
		</div>
		<?php
		endif;
		unset($_SESSION['not_user']);
        ?>
		 <div id="login">
            <form name="loginform" method="post" action="login.php">  
                Username: <input type="text" name="username" autofocus="" required //><br>
                Password: <input type="password" name="password" required /><br>
                <input  type="submit" name="submit" value="Login">
                <p>Doesn't have an account yet? <a href="signin.php">Create an account</a></p>
            </form>
            
        </div>

        <div id="footer">
            <?php
            include ('footer.php');
            ?>
         
        </div>
       
    </body>
</html>
