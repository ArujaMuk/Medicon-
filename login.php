<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="lstyle.css"/>
</head>
<body>
<?php
    require('db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['university_roll_no'])) {
        $university_roll_no = stripslashes($_REQUEST['university_roll_no']);    // removes backslashes
        $university_roll_no = mysqli_real_escape_string($con, $university_roll_no);
        $pass = stripslashes($_REQUEST['pass']);
        $pass = mysqli_real_escape_string($con, $pass);
        // Check user is exist in the database
        $query    = "SELECT * FROM `users` WHERE university_roll_no='$university_roll_no'
                     AND pass='$pass'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['university_roll_no'] = $university_roll_no;
            // Redirect to user dashboard page
            header("Location: dashboard.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect university_roll_no/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" method="post" name="login">
    <h2 class="login-title" style="font-family:Vibur;  font-size: 50px;  text-align: center; color:white; background-color:darkslateblue;">MEDICON</h2>
    
    <h1 class="login-title" style="font-family:Georgia;  font-size: 30px;  text-align: center; color:midnightblue; background-color:thistle;">LOGIN</h4>
        <hr>
        <label for="university_roll_no"><b>Enter username (university roll): </b></label> 
        <input type="text" class="login-input" name="university_roll_no" placeholder="university_roll_no" autofocus="true"/>
        <br>
        <br>
        <label for="password"><b>Enter passowrd: </b></label> 
        <input type="password" class="login-input" name="pass" placeholder="Password"/>
        <br>
        <input type="submit" value="Login" name="submit" class="login-button"/>
        <hr>
        <p class="link"; font-size: 20px> <a href="regV.php">Click to register</a></p>
  </form>
<?php
    }
?>
</body>
</html>