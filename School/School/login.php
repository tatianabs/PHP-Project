  <html>
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="school.css"/>
    </head>
    <body>
        <div id="header">
            <?php
            include ('header.php');
            
            ?>
        </div>
        <div id="login">
            <form name="loginform" method="post" action="enroll.php">  
                Username: <input type="text" name="username" /><br>
                Password: <input type="password" name="password" /><br>
                <input  type="submit" value="Login">
                <p>Doesn't have an account yet? <a href="signin.php">Create an account.</a></p>
            </form>
            
        </div>
    </body>
  </html>
