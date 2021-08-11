<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>update</title>
    <link rel="stylesheet" href="ustyle3.css"/>
    
   
</head>
<body>
<?php
    require('db.php');
    // When form submitted, insert values into the database.
        // removes backslashes
    if(isset($_REQUEST['teston'])){
       
        $teston = stripslashes($_REQUEST['teston']);
        $teston = mysqli_real_escape_string($con, $teston);
        $reporton = stripslashes($_REQUEST['reporton']);
        $reporton = mysqli_real_escape_string($con, $reporton);
        $medname = stripslashes($_REQUEST['medname']);
        $medname = mysqli_real_escape_string($con, $medname);
       // $gender = stripslashes($_REQUEST['gender']);
       // $gender = mysqli_real_escape_string($con, $gender);
       

      


        $query    = "INSERT into `update` (teston, reporton, medname)	
        VALUES ( '$teston', '$reporton', '$medname')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You have successfully updated your details.</h3><br/>
                  <h4>SELECT GENDER TO CONTINUE:</h4>
                  <p class='link'> <a href='MaleValidation.php'>MALE</a></p>
                  <p class='link'> <a href='FemaleValidation.php'>FEMALE</a></p>

                  </div>";

        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='update.php'>fill</a> again.</p>
                  </div>";
        }
    }  else {



?>
    <form class="form" action="" method="post">
     
    <h1 class="login-title" style="font-family:Helvetica;  font-size: 35px;  text-align: center; color:midnightblue; background-color:thistle;"><b>UPDATE</b></h4>
     
    <br><br>
    
    <label for="teston"><b>Test Date: </b></label>
    <input type="date" id="date" name="teston">
    <br>
    <br>
    <label for="reporton"><b>Report Date: </b></label>
    <!--<input type="text" class="login-input" name="reporton" placeholder="report date" required>-->
    <input type="date" id="date" name="reporton">
    <br>
    <br>
    <label for="medname"><b>Name of Medical Otganisation: </b></label>
    <input type="text" class="login-input" name="medname" placeholder="name of med organisation" required>
    <br>
    <br>
    <!--<label for="gender"><b>Gender: </b></label>
        <select name="gender" class="login-input"  required>
            <option value="Select Gender" selected>Select Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            
            </select>
    <br>
    <br>-->
   

        
        <input type="submit" name="submit" value="next" class="login-button">
        <p class="link"><a href="dashboard.php">Click to return</a></p>
    </form>
<?php
    }
?>
</body>
</html>
