<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Male</title>
    <link rel="stylesheet" href="mstyle.css"/>
    
   
</head>
<body>
<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>
<?php
    require('db.php');
    $a = 0;
    $result=0;

    $today=$pulse = $o2 = $tempr = $hpress =$lpress = $sugar = $thy = $extra = $diff = $docname = $asx = $error = "";

    $pulseErr = $pulseErr1= $pulseErr2= $o2Err =  $o2Err1 =  $o2Err2 =  $temprErr  =  $temprErr1=   $temprErr2= $hpressErr =$lpressErr =$hpressErr1 =$lpressErr1 =$hpressErr2 =$lpressErr2  = $sugarErr =$sugarErr1 = $sugarErr2 =$thyErr =$thyErr1= $thyErr2 = $diffErr = $docnameErr = $docnameErr1 = "";

    // When form submitted, insert values into the database.
        // removes backslashes
    if(($_SERVER["REQUEST_METHOD"]) == "POST")
    {
        function clean_input($field)
        {
            $field = trim($field);
            $field = stripslashes($field);
            $field = htmlspecialchars($field);
            return $field;
        }
        $today = clean_input($_REQUEST['today']);
        $today = mysqli_real_escape_string($con, $today);

        $pulse = clean_input($_POST['pulse']);
        $pulse = mysqli_real_escape_string($con, $pulse);
        $o2 = clean_input($_POST['o2']);
        $o2 = mysqli_real_escape_string($con, $o2);
        $tempr = clean_input($_POST['tempr']);
        $tempr = mysqli_real_escape_string($con, $tempr);
        $hpress = clean_input($_POST['hpress']);
        $hpress = mysqli_real_escape_string($con, $hpress);
        $lpress = clean_input($_POST['lpress']);
        $lpress = mysqli_real_escape_string($con, $lpress);
        $sugar = clean_input($_POST['sugar']);
        $sugar = mysqli_real_escape_string($con, $sugar);
        $thy = clean_input($_POST['thy']);
        $thy = mysqli_real_escape_string($con, $thy);
        $extra = clean_input($_POST['extra']);
        $extra = mysqli_real_escape_string($con, $extra);
        $diff = clean_input($_POST['diff']);
        $diff = mysqli_real_escape_string($con, $diff);
        $docname = clean_input($_POST['docname']);
        $docname = mysqli_real_escape_string($con, $docname);
        $asx = clean_input($_POST['asx']);
        $asx = mysqli_real_escape_string($con, $asx);

        if(isset($pulse) && $pulse != "") 
        {
            //checking
            if(!preg_match("/^[0-9]*$/", $pulse))
            {
                $pulseErr = "*Pulse rate can only contain numbers... ";
                echo $pulseErr;
			    $a = 1;
            }
            if(in_array($pulse, range(60, 100)) ) { 
                $pulseErr1 = "||    Pulse rate is fine ";}
            else{
                    $pulseErr2 = "||     Pulse out of range (Normal Range: 60 to 100 beats per minute) ";
                    echo $pulseErr2;
                }
			    $a = 0;

        }
        

        if(isset($o2) && $o2 != "") 
        {
            //checking
            if(!preg_match("/^[0-9]*$/", $o2))
            {
                $o2Err = "||    Oxygen level can only contain numbers... ";
                echo $o2Err;
			    $a = 1;
            }
            if(in_array($o2, range(94, 100)) ) { 
                 $o2Err1 = "||   O2 is fine ";
            }
            else{
                    $o2Err2 = "||     Oxygen saturation out of range (Normal range : 94 to 100%)";
                    echo $o2Err2;
                }
			    $a = 0;
        }

        if(isset($tempr) && $tempr != "") 
        {
            //checking
            if(!preg_match("/^[0-9.]*$/", $tempr))
            {
                $temprErr = "*Temperature can only contain numbers... ";

                echo $temprErr;
			    $a = 1;
            }
            if((float)($tempr)>97.0 && (float)($tempr)<99.0) { 
                $temprErr1 = "  ||tempr is fine ";}
            else{
                    $temprErr2="    ||Temperature out of range(Normal range : 97 to 99 degrees Fahrenheit)";
                    echo $temprErr2;
                }
			    $a = 0;

        }
        

        if(isset($hpress) && $hpress != "") 
        {
           //checking
           if(!preg_match("/^[0-9]*$/", $hpress))
           {
               $hpressErr = "*Blood pressure Systole can only contain numbers  ";
               echo $hpressErr;
			   $a = 1;
            }
            if(in_array($hpress, range(100, 120)) ) { 
                $hpressErr1 = "    ||Systole alright";}
            else{
                    $hpressErr2="    ||Systole out of range(Normal range 100 to 120)";
                    echo $hpressErr2;
                }
			    $a = 0;
        }

        if(isset($lpress) && $lpress != "") 
        {
           //checking
           if(!preg_match("/^[0-9]*$/", $lpress))
           {
               $lpressErr = "*Blood pressure diastole can only contain numbers... ";
               echo $lpressErr;
			   $a = 1;
            }
            if(in_array($lpress, range(60, 80)) ) { 
                $lpressErr1 = "    ||Diastole alright";}
            else{
                    $lpressErr2="    ||Diastole out of range(Normal range 60 to 80)";
                    echo $lpressErr2;
                }
			    $a = 0;
        }

        if(isset($sugar) && $sugar != "") 
        {
        //checking
            if(!preg_match("/^[0-9]*$/", $sugar))
            {
                $sugarErr = "*Sugar level can only contain numbers... ";
                echo  $sugarErr;
			    $a = 1;
            }
            
            if(in_array($sugar, range(70, 140)) ) { 
                $SugarErr1 = "    ||Sugar fine";}
            else{
                    $sugarErr2="    ||Sugar out of range(Normal range 70 to 140)";
                    echo $sugarErr2;
                }
                $a = 0;
            }
        

        if(isset($thy) && $thy != "") 
        {
            //checking
            if(!preg_match("/^[0-9.]*$/", $thy))
            {
                $thyErr = "*Thyroid level can only contain numbers... ";
                echo $thyErr;
			    $a = 1;
            }
            if((float)($thy)>0.5 && (float)($thy)<4.2) { 
                $thyrErr1 = "    ||thy is fine ";}
            else{
                    $thyErr2 = "    ||Thyroid out of range (Normal range is 0.5 to 4.15 mU/L)";
                    echo $thyErr2;
                }
			    $a = 0;

        }

        if(isset($diff) && $diff == '0') 
        {
            //checking
            $diffErr = "Please select an option for medical assistance... ";
            echo $diffErr;
		    $a = 1;
        }

        if(isset($docname) && $docname != "") 
        {
            //checking
            if(!preg_match("/^[A-Za-z ]*$/", $docname))
            {
                $docnameErr = "*Doctor's name can only contain letters and white spaces... ";
                echo $docnameErr; 
			    $a = 1;
            }
            elseif(strlen($docname)<5)
            {
                $docnameErr1 = "*Doctor's name is too short... ";
                echo $docnameErr1; 
			    $a = 1;
            }
        }
        /*else 
        {
            $error = "You must fill all the required fields... ";
            $a = 1;
        }*/
    

        
       
        $user = $_SESSION["university_roll_no"];
      
if($a==0){

        $query    = "INSERT into `male` (muser,today,pulse,	o2, tempr, hpress, lpress, sugar, thy, extra, diff, docname, asx)	
                     VALUES ('$user','$today','$pulse', '$o2', '$tempr','$hpress','$lpress', '$sugar', '$thy', '$extra', '$diff', '$docname','$asx')";	
        $result   = mysqli_query($con, $query);
}
        if ($result) {
            echo "<div class='form'>
                  <h3>You have successfully updated your details.</h3><br/>
                  <p class='link'>Click here to <a href='dashboard.php'>return</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Please fill all fields correctly.</h3><br/>
                  <p class='link'>Click here to <a href='MaleValidation.php'>fill</a> again.</p>
                  </div>";
        }
    }
        else {

?>
    <form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <h1>REGULAR REPORT UPDATE FOR :</h1>
        <h1 class="login-title" style="font-family:Impact, monospace;  font-size: 30px;  text-align: center; color:cornsilk; background-color:midnightblue;">MALE STUDENTS</h1>

        <h2> Please fill your medical details accordingly</h2>
        
        <hr><hr>
        <br>
        <div>
            <label for="today"><b>Today's Date :</b></label>
            <input type="date" id="date" name="today">
        </div><br> 
        <br>
        <div>
            <label for="Pulse"><b>Pulse Rate :</b></label>
            <input type="text" class="login-input" placeholder="Enter Pulse Rate" name="pulse" required><p> Enter in beats per minute </p>
            <br>
            
            <?php
            if($pulseErr)
            {
                echo $pulseErr;
               
            
            }
            ?>
            <?php
            if($pulseErr1)
            {
                echo $pulseErr1;
            }
            ?> 
             <?php
            if($pulseErr2)
            {
                echo $pulseErr2;
            }
            ?> 
        </div> <br>  <hr>
        

        <div>
            <label for="Oxygen"><b>Oxygen Saturation level :</b></label>
            <input type="text" class="login-input" placeholder="Enter Oxygen Level" name="o2" required><p> Enter in percentage</p>
            <br>
            <!---<p>Normal Range: 94 to 100 percent</p> --->
            <?php
            if($o2Err)
            {
                echo $o2Err;
            }
            ?>
            <?php
            if($o2Err1)
            {
                echo $o2Err1;
            }
            ?> 
             <?php
            if($o2Err2)
            {
                echo $o2Err2;
            }
            ?> 
        </div><br>  <hr>

        <div>
            <label for="BodyTemp"><b>Average Body Temperature :</b></label>
            <input type="text" class="login-input" placeholder="Enter body temperature" name="tempr" required> <p> Input in Fahrenheit</p>
            <br>
             <!---<p>Normal Range: 97- 99 degrees Fahrenheit </p>--->
            <?php
            if($temprErr)
            {
                echo $temprErr;
            }
            ?>
            <?php
            if($temprErr1)
            {
                echo $temprErr1;
            }
            ?>
            <?php
            if($temprErr2)
            {
                echo $temprErr2;
            }
            ?>
        </div><br>  <hr>

        <div>
            <label for="BloodPr"><b>Blood Pressure :</b></label>
            <input type="text" class="login-input" placeholder="Enter Systole" name="hpress" required> 
            <input type="text" class="login-input" placeholder="Enter Diastole" name="lpress" required> <p> Enter in mm Hg</p>
            <br>
           <!--- <p>Normal Range: 119/70mm Hg</p>--->
            <?php
            if($hpressErr)
            {
                echo $hpressErr;
            }
            ?>
            <?php
            if($hpressErr1)
            {
                echo $hpressErr1;
            }
            ?>
            <?php
            if($hpressErr2)
            {
                echo $hpressErr2;
            }
            ?>
             <?php
            if($lpressErr)
            {
                echo $lpressErr;
            }
            ?>
             <?php
            if($lpressErr1)
            {
                echo $lpressErr1;
            }
            ?>
             <?php
            if($lpressErr2)
            {
                echo $lpressErr2;
            }
            ?>
        </div> <br>  <hr>

        <div>
            <label for="BloodSg"><b>Blood Sugar :</b></label>
            <p> Sugar levels without fasting: </p>
            <input type="text" class="login-input" placeholder="Enter blood sugar level" name="sugar" required><p> Enter in mg/dL</p>
            <br>
           <!-- <p>Normal Ranges:</p> <br>
           <p>Fasting: Less than 100 mg/dL</p> <br>
            <p>After Meal: Less than 180 mg/dL</p>--->
            <?php
            if($sugarErr)
            {
                echo $sugarErr;
            }
            ?>
             <?php
            if($sugarErr1)
            {
                echo $sugarErr1;
            }
            ?>
            <?php
            if($sugarErr2)
            {
                echo $sugarErr2;
            }
            ?>
        </div> <br>  <hr>

        <div>
            <p><b>If you have history of problems related to Thyroid Stimulating Hormonoes fill the following.</b></p>
            <label for="TSH"><b>TSH level :</b></label>
            <input type="text" class="login-input" placeholder="Enter TSH level" name="thy" ><br><p> Enter in mU/L</p>
           <!--- <p>Normal Range: 0.5 - 4.15 mU/L</p>--->
            <?php
            if($thyErr)
            {
                echo $thyErr;
            }
            ?>
             <?php
            if($thyErr1)
            {
                echo $thyErr1;
            }
            ?> 
             <?php
            if($thyErr2)
            {
                echo $thyErr2;
            }
            ?> 
        </div> <br>  <hr>

        <div>
            <label for="Extra"><b>Health problems faced (if any) :</b></label>
            <select name="extra" class="login-input" name="extra"> 
                <option value="">Select your option</option>
                <option value="YES">Yes</option>
                <option value="NO">No</option>
            </select>
        </div> <br>  <hr>

        <div>
            <label for="diff"><b>Did you seek medical assistance in the past 3 months? :</b></label>
            <select name="diff" class="login-input" name="diff"> 
                <option value="">Select your option</option>
                <option value="YES">Yes</option>
                <option value="NO">No</option>
            </select>
            <?php
            if($diffErr)
            {
                echo $diffErr;
            }
            ?>
        </div> <br>  <hr>

        <div>
            <label for="docname"><b>Doctor's name :(if not enter NA)</b></label>
            <input type="text" class="login-input" placeholder="Enter doctor's name" name="docname"> 
            <?php
            if($docnameErr)
            {
                echo $docnameErr;
            }
            if($docnameErr1)
            {
                echo $docnameErr1;
            }
            ?>
        </div> <br>  <hr>

        <div>
            <label for="asx"><b>Mention details (if any) :</b></label><br>
            <textarea name="asx" id="asx" cols="30" rows="10" placeholder="Mention details here. " value="<?php echo $allergies ?>"></textarea>

        </div> <br>  <hr>

        

        <div>
            <label for="submit"></label>
            <input type="submit" class="login-button" value="Update" name="submit" required> 
        </div> <br>  <hr>

        <div>
    
    <?php
    if($error)
    {
        echo $error;
    }
    ?>
    </div>
    </form>
    <?php
}
?>  

</body>
</html>

