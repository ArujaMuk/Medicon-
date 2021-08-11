<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Female</title>
    <link rel="stylesheet" href="fstyle.css"/>
    
   
</head>
<body>
<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>
<?php
    require('db.php');
    $a = 0;
    $result = 0;

    $today=$pulse = $o2 = $tempr = $hPress = $lPress = $Sugar = $Thy = $extra = $diff = $docname = $asx = $from1 = $to1 = $from2 = $to2 = $from3 = $to3 = $diffa = $diffx = "";

    $pulseErr_0 = $pulseErr_1 = $pulseErr_2 = $o2Err_0 = $o2Err_1 = $o2Err_2 = $temprErr_0 = $temprErr_1 = $temprErr_2 = $hPressErr_0 = $hPressErr_1 =$hPressErr_2 =$lPressErr_0 = $lPressErr_1  =$lPressErr_2 = $SugarErr_0 = $SugarErr_1= $SugarErr_2 = $ThyErr_0 = $ThyErr_1 = $ThyErr_2 = $diffErr_0 = $docnameErr_0 = $docnameErr_1 = $error = "";

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

        $pulse = clean_input($_POST['Pulse']);
        $pulse = mysqli_real_escape_string($con, $pulse);

        $o2 = clean_input($_POST['o2']);
        $o2 = mysqli_real_escape_string($con, $o2);

        $tempr = clean_input($_POST['tempr']);
        $tempr = mysqli_real_escape_string($con, $tempr);

        $hPress = clean_input($_POST['hPress']);
        $hPress = mysqli_real_escape_string($con, $hPress);

        $lPress = clean_input($_POST['lPress']);
        $lPress = mysqli_real_escape_string($con, $lPress);

        $Sugar = clean_input($_POST['Sugar']);
        $Sugar = mysqli_real_escape_string($con, $Sugar);

        $Thy = clean_input($_POST['Thy']);
        $Thy = mysqli_real_escape_string($con, $Thy);

        $extra = clean_input($_POST['extra']);
        $extra = mysqli_real_escape_string($con, $extra);

        $diff = clean_input($_POST['diff']);
        $diff = mysqli_real_escape_string($con, $diff);

        $docname = clean_input($_POST['docname']);
        $docname = mysqli_real_escape_string($con, $docname);

        $asx = clean_input($_POST['asx']);
        $asx = mysqli_real_escape_string($con, $asx);

        $from1 = clean_input($_POST['from1']);
        $from1 = mysqli_real_escape_string($con, $from1);
        $to1 = clean_input($_POST['to1']);
        $to1 = mysqli_real_escape_string($con, $to1);

        $from2 = clean_input($_POST['from2']);
        $from2 = mysqli_real_escape_string($con, $from2);
        $to2 = clean_input($_POST['to2']);
        $to2 = mysqli_real_escape_string($con, $to2);

        $from3 = clean_input($_POST['from3']);
        $from3 = mysqli_real_escape_string($con, $from3);
        $to3 = clean_input($_POST['to3']);
        $to3 = mysqli_real_escape_string($con, $to3);

        $diffa = clean_input($_POST['diffa']);
        $diffa = mysqli_real_escape_string($con, $diffa);

        $diffx = clean_input($_POST['diffx']);
        $diffx = mysqli_real_escape_string($con, $diffx);

        if(isset($pulse) && $pulse != "")
        {
            //checking
            if(!preg_match("/^[0-9]*$/", $pulse))
            {
                $pulseErr_0 = "|| *Pulse rate can only contain numbers... ";
                echo $pulseErr_0;
			    $a = 1;
            }
            if(in_array($pulse, range(60, 100)))
            {
                $pulseErr_1 = "||    Pulse rate is fine ";
            }
            else
            {
                $pulseErr_2 = "||    Pulse out of range (Normal Range: 60 to 100 beats per minute) ";
                echo $pulseErr_2;
            }
            $a = 0;
        }
        
        if(isset($o2) && $o2 != "")
        {
            //checking
            if(!preg_match("/^[0-9]*$/", $o2))
            {
                $o2Err_0 = "|| *Oxygen level can only contain numbers... ";
                echo $o2Err_0;
			    $a = 1;
            }
            if(in_array($o2, range(94, 100)))
            {
                $o2Err_1 = "||    O2 is fine ";
            }
            else
            {
                $o2Err_2 = "||    Oxygen saturation out of range (Normal range 94 to 100%)";
                echo $o2Err_2;
            }
            $a = 0;
        }

        if(isset($tempr) && $tempr != "")
        {
            //checking
            if(!preg_match("/^[0-9.]*$/", $tempr))
            {
                $temprErr_0 = "|| *Temperature can only contain numbers... ";
                echo $temprErr_0;
			    $a = 1;
            }
            if((float)($tempr)>97.0 && (float)($tempr)<99.0)
            {
                $temprErr_1 = "    ||temperature is fine ";;
            }
            else
            {
                $temprErr_2 = "    ||Temperature out of range(Normal range 97 to 99 degrees Fahrenheit)";
                echo $temprErr_2;
            }
            $a = 0;
        }

        if(isset($hPress) && $hPress != "") 
        {
           //checking
           if(!preg_match("/^[0-9]*$/", $hPress))
           {
                $hPressErr_0 = "|| *Blood pressure systole can only contain numbers ... ";
                echo $hPressErr_0;
			    $a = 1;
            }
            if(in_array($hPress, range(100, 120)) ) { 
                $hPressErr_1 = "    ||Systole alright";}
            else{
                    $hPressErr_2 = "    ||Systole is out of range(Normal range 100 to 120)";
                    echo $hPressErr_2;
                }
			    $a = 0;
        }

        if(isset($lPress) && $lPress != "") 
        {
           //checking
           if(!preg_match("/^[0-9]*$/", $lPress))
           {
                $lPressErr_0 = "*Blood pressure diastole can only contain numbers...";
                echo $lPressErr_0;
			    $a = 1;
            }
            if(in_array($lPress, range(60, 80)) ) { 
                $lPressErr_1 = "    ||Diastole alright";}
            else{
                    $lPressErr_2 = "    ||Diastole out of range(Normal range 60 to 80)";
                    echo $lPressErr_2;
                }
			    $a = 0;
        }

        if(isset($Sugar) && $Sugar != "") 
        {
        //checking
            if(!preg_match("/^[0-9]*$/", $Sugar))
            {
                $SugarErr_0 = "|| *Sugar level can only contain numbers... ";
                echo  $SugarErr_0;
			    $a = 1;
            }
            if(in_array($Sugar, range(70, 140)) ) { 
                $SugarErr_1 = "    ||Sugar fine";}
            else{
                    $SugarErr_2="    ||Sugar out of range(Normal range 70 to 140)";
                    echo $SugarErr_2;
                }
			    $a = 0;
        }

        if(isset($Thy) && $Thy != "") 
        {
            //checking
            if(!preg_match("/^[0-9.]*$/", $Thy))
            {
                $ThyErr_0 = "|| *Thyroid level can only contain numbers... ";
                echo $ThyErr_0;
			    $a = 1;
            }
            if((float)($Thy)>0.5 && (float)($Thy)<4.2){
                $ThyErr_1 = "    ||thy is fine ";
            }
            else
            {
                $ThyErr_2 = "    ||Thyroid out of range (Normal range id 0.5 to 4.15 mU/L)";
                echo $ThyErr_2;
            }
			$a = 0;

        }

        if(isset($diff) && $diff == '0') 
        {
            //checking
            $diffErr_0 = "|| *Please select an option for medical assistance... ";
            echo $diffErr_0;
		    $a = 1;
        }

        if(isset($docname) && $docname != "") 
        {
            //checking
            if(!preg_match("/^[A-Za-z ]*$/", $docname))
            {
                $docnameErr_0 = "|| *Doctor's name can only contain letters and white spaces... ";
                echo $docnameErr_0; 
			    $a = 1;
            }
            elseif(strlen($docname)<6)
            {
                $docnameErr_1 = "||    Doctor's name too short... ";
                echo $docnameErr_1; 
			    $a = 1;
            }
        }

       
        $user = $_SESSION["university_roll_no"];
        if($a == 0)
        {
            $query    = "INSERT into `female` (fuser,today, Pulse,	o2, tempr, hPress, lPress, Sugar, Thy, extra,	diff, docname, asx, from1, to1, from2, to2, from3, to3, diffa, diffx)	
                     VALUES ('$user','$today','$pulse', '$o2', '$tempr','$hPress','$lPress', '$Sugar', '$Thy', '$extra', '$diff', '$docname','$asx','$from1','$to1', '$from2', '$to2', '$from3','$to3','$diffa','$diffx')";	
             $result   = mysqli_query($con, $query);
        }
        if ($result)
        {
            echo "<div class='form'>
                  <h3>You have successfully updated your details.</h3><br/>
                  <p class='link'>Click here to <a href='dashboard.php'>reutrn</a></p>
                  </div>";
        }
        else
        {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='FemaleValidation.php'>fill</a> again.</p>
                  </div>";
        }


    }
    
    else
    {
?>
        <form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <h1>REGULAR REPORT UPDATE FOR :</h1>
        <h1 class="login-title" style="font-family:Impact, monospace;  font-size: 30px;  text-align: center; color:cornsilk; background-color:RebeccaPurple;">FEMALE STUDENTS</h1>

        <h2> Please fill your medical details accordingly</h2>
            
        <hr><hr>
        <br>
        <div>
            <label for="today"><b>Today's Date :</b></label>
            <input type="date" id="date" name="today">
        </div><br>  

        <div>
            <label for="Pulse"><b>Pulse Rate :</b></label>
            <input type="text" class="login-input" placeholder="Enter Pulse Rate" name="Pulse" required><p> Enter in beats per minute </p>
            <br>

            <?php
            if($pulseErr_0)
            {
                echo $pulseErr_0;
            }
            ?>
            <?php
            if($pulseErr_1)
            {
                echo $pulseErr_1;
            }
            ?>
            <?php
            if($pulseErr_2)
            {
                echo $pulseErr_2;
            }
            ?>
        </div> <br> <hr>

        <div>
            <label for="Oxygen"><b>Oxygen Saturation level :</b></label>
            <input type="text" class="login-input" placeholder="Enter Oxygen Level" name="o2" required><p> Enter in percentage</p>
            <br>
            <!---<p>Normal Range: 94 to 100 percent</p> --->
            <?php
            if($o2Err_0)
            {
                echo $o2Err_0;
            }
            ?>
            <?php
            if($o2Err_1)
            {
                echo $o2Err_1;
            }
            ?>
            <?php
            if($o2Err_2)
            {
                echo $o2Err_2;
            }
            ?>
        </div><br>  <hr>

        <div>
            <label for="BodyTemp"><b>Average Body Temperature :</b></label>
            <input type="text" class="login-input" placeholder="Enter body temperature" name="tempr" required> <p> Input in Fahrenheit</p>
            <br>
            <!---<p>Normal Range: 97- 99 degrees Fahrenheit </p>--->
            <?php
            if($temprErr_0)
            {
                echo $temprErr_0;
            }
            ?>
            <?php
            if($temprErr_1)
            {
                echo $temprErr_1;
            }
            ?>
            <?php
            if($temprErr_2)
            {
                echo $temprErr_2;
            }
            ?>
        </div><br>  <hr>

        <div>
            <label for="BloodPr"><b>Blood Pressure :</b></label>
            <input type="text" class="login-input" placeholder="Enter Systole" name="hPress" required> 
            <input type="text" class="login-input" placeholder="Enter Diastole" name="lPress" required> <p> Enter in mm Hg</p>
            <br>
            <!--- <p>Normal Range: 110/74mm Hg</p>--->
            <?php
            if($hPressErr_0)
            {
                echo $hPressErr_0;
            }
            ?>
            <?php
            if($hPressErr_1)
            {
                echo $hPressErr_1;
            }
            ?>
            <?php
            if($hPressErr_2)
            {
                echo $hPressErr_2;
            }
            ?>
           


             <?php
            if($lPressErr_0)
            {
                echo $lPressErr_0;
            }
            ?>
             <?php
            if($lPressErr_1)
            {
                echo $lPressErr_1;
            }
            ?>
             <?php
            if($lPressErr_2)
            {
                echo $lPressErr_2;
            }
            ?>
            
        </div> <br>  <hr>

        <div>
            <label for="BloodSg"><b>Blood Sugar :</b></label>
            <input type="text" class="login-input" placeholder="Enter blood sugar level" name="Sugar" required><p> Enter in mg/dL</p>
            <br>
            <p> Sugar levels without fasting: </p>
            <!-- <p>Normal Ranges:</p> <br>
            <p>Fasting: Less than 100 mg/dL</p> <br>
            <p>After Meal: Less than 180 mg/dL</p>--->
            <?php
            if($SugarErr_0)
            {
                echo $SugarErr_0;
            }
            ?>
            <?php
            if($SugarErr_1)
            {
                echo $SugarErr_1;
            }
            ?>
            <?php
            if($SugarErr_2)
            {
                echo $SugarErr_2;
            }
            ?>
        </div> <br>  <hr>

        <div>
            <p><b>If you have history of problems related to Thyroid Stimulating Hormonoes fill the following.</b></p>
            <label for="TSH"><b>TSH level :</b></label>
            <input type="text" class="login-input" placeholder="Enter TSH level" name="Thy" ><br><p> Enter in mU/L</p>
            <!---<p>Normal Range: 0.5 - 4.15 mU/L</p>--->
            <?php
            if($ThyErr_0)
            {
                echo $ThyErr_0;
            }
            ?>
             <?php
            if($ThyErr_1)
            {
                echo $ThyErr_1;
            }
            ?> 
             <?php
            if($ThyErr_2)
            {
                echo $ThyErr_2;
            }
            ?>
        </div> <br>  <hr>
        
        <div>
            <label for="Extra"><b>Health problems faced (if any) :</b></label>
            <select name="extra" class="login-input" name="extra"> 
                <option value="0">Select your option</option>
                <option value="1">Yes</option>
                <option value="2">No</option>
            </select>
        </div> <br>  <hr>

        <div>
            <label for="diff"><b>Did you seek medical assistance in the past 3 months? :</b></label>
            <select name="diff" class="login-input" name="diff"> 
                <option value="0">Select your option</option>
                <option value="YES">Yes</option>
                <option value="NO">No</option>
            </select>
            <?php
            if($diffErr_0)
            {
                echo $diffErr_0;
            }
            ?>
        </div> <br>  <hr>

        <div>
            <label for="docname"><b>Doctor's name :</b></label>
            <input type="text" class="login-input" placeholder="Enter doctor's name" name="docname">
            <?php
            if($docnameErr_0)
            {
                echo $docnameErr_0;
            }
            if($docnameErr_1)
            {
                echo $docnameErr_1;
            }
            ?>
        </div> <br>  <hr>

        <div>
            <label for="asx"><b>Mention details (if any) :</b></label>
            <input type="textarea" class="login-input" placeholder="Mention the reason of seeking medical assistance if any" name="asx">
        </div> <br>  <hr>

        






      
        <b style="font-family:Trebuchet MS;  font-size: 20px; color:floralwhite; background-color:Indianred;">Menstrual Cycle Information</b><br>
	    <p style="font-family:Trebuchet MS;  font-size: 17px; color:floralwhite; background-color:cadetblue;">Update menstrual cycle details of the past 3 months</p>
        <p> Month 1: </p> <br>    
        <div>
            <label for="from1"><b>From :</b></label>
            <input type="date" id="date" name="from1">
        </div><br>  

        <div>    
            <label for="to1"><b>To :</b></label>
            <input type="date" id="date" name="to1">
        </div><br>  <hr>

        <div>   <p> Month 2: </p> <br>  
            <label for="from2"><b>From :</b></label>
            <input type="date" id="date" name="from2">
        </div><br>  

        <div>
            <label for="to2"><b>To :</b></label>
            <input type="date" id="date" name="to2"> 
        </div><br> <hr> 

        <div>   <p> Month 3: </p> <br>  
            <label for="from3"><b>From :</b></label>
            <input type="date" id="date" name="from3"> 
        </div><br>  

        <div>
            <label for="to3"><b>To :</b></label>
            <input type="date" id="date" name="to3">
        </div><br>  <hr>

        <div>
            <label for="diffa"><b>Difficulties faced :</b></label>
            <input type="text" class="login-input" placeholder="Type Yes/No" name="diffa" > 
        </div><br>  <hr>

        <div>
            <label for="diffx"><b>Specify difficulties faced :</b></label>
            <input type="text" class="login-input" placeholder="Mention the difficulties you have faced during your menstrual cycles (eg. cramps, nausea, etc.) Else, type 'none'" name="diffx" > 
        </div><br>  <hr>



        

        <div>
            <label for="submit"></label>
            <input type="submit" class="login-button" value="Update" name="submit" required> 
        </div> <br>  <hr>

    


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
        

      


