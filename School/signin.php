<?php
session_start();
?>
<html>
    <head>
        <title>Create account</title>
		 <link rel="stylesheet" href="school.css"/>
    </head>
    <body>
	<div id="header">
        <?php
        include ('header.php');
        ?>  
        </div>
		 <?php
	     if(isset($_SESSION['failed'])):
		?>
		<div class="failed">
		 <p>ERROR: Username or email already exists.</p>
		</div>
		<?php
		endif;
		unset($_SESSION['failed']);
        ?>
		 <?php
	     if(isset($_SESSION['success'])):
		?>
		<div class="success">
		 <p> Register successfully!!</p>
		</div>
		<?php
		endif;
		unset($_SESSION['success']);
        ?>
		<div id="account">
		<fieldset>
		<legend>Create your account</legend>
        <form name="signin" method="post" action="createaccount.php">
            Username: <input type="text" name="username" required /><br>
            Password: <input type="password" name="password" required/><br>
            Name: <input type="text" name="name" required /> <br>
            Phone: <input type="number" name="phone" required/><br>
            Email: <input type="text" name="email" required/><br>
            <input type="submit" name="submit" value="Submit">
        </form>
        </div>
       </fieldset>
	    <div id="footer">
            <?php
            include ('footer.php');
            ?>
        </div>
    </body>
</html>


