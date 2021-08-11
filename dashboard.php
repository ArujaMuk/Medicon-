<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="dstyle1.css" />
</head>
<body>
    <div class="form">
        <p class="login-title" style="font-family:Copperplate;  font-size: 32px;  text-align: center; color:white; background-color:rebeccapurple;"><b>Hey, user <?php echo $_SESSION['university_roll_no']; ?> !</b></p>
        <p class="login-title" style="font-family:Bradley Hand, cursive; ">Welcome !</p><hr>
        <p class="login-title" style="font-family:Helvetica; color:Crimson;"> Choose what to do next: </p>
        <p>Click below to see previous reports :</p>
        <p><a href="report.php">Previous Reports</a></p>
        <p>Click below  to enter a new report :</p>
        <p><a href="update.php">UPDATE</a></p>
        <hr><hr>
        

        <p><a href="logout.php">Logout</a></p>
        


    </div>
</body>
</html>