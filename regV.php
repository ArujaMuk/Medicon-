<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>

    <title>Registration</title>
    <link rel="stylesheet" href="reg6style.css"/>
    
   
</head>
<body>
<?php
require('db.php');
$a = 0;
$result=0;
$university_roll_no = $email = $pass = $first_name = $middle_name =  $last_name= $section= $cont_no= $G_name = $G_cont_no = $G_mail = $gender= $height= $weight = $lefte= $righte= $b_grp = $b_press = $sugar = $pulse = $spo2 = $allergy = $issues = $error = "";

$university_roll_noErr = $university_roll_noErr1 = $emailErr = $emailErr1 = $passErr = $passErr1 =   $first_nameErr = $first_nameErr1 = $middle_nameErr = $middle_nameErr1 = $last_nameErr = $last_nameErr1 = $cont_noErr = $cont_noErr1 =  $G_nameErr = $G_nameErr1 = $G_cont_noErr = $G_cont_noErr1 = $G_mailErr = $G_mailErr1 = $heightErr = $weightErr =  $lefteErr = $righteErr =  $b_grpErr = $b_pressErr =  $sugarErr = $pulseErr =  $spo2Err =  "";

if(($_SERVER["REQUEST_METHOD"]) == "POST") 
{
    function clean_input($field)
    {
        $field = trim($field);
        $field = stripslashes($field);
        $field = htmlspecialchars($field);
        return $field;
    }

$university_roll_no = clean_input($_POST['university_roll_no']);
$university_roll_no = mysqli_real_escape_string($con, $university_roll_no);
$email = clean_input($_POST['email']);
$email    = mysqli_real_escape_string($con, $email);
$pass = clean_input($_POST['pass']);
$pass = mysqli_real_escape_string($con, $pass);
$first_name = clean_input($_POST['first_name']);
$first_name = mysqli_real_escape_string($con, $first_name);
$middle_name = clean_input($_POST['middle_name']);
$middle_name = mysqli_real_escape_string($con, $middle_name);
$last_name = clean_input($_POST['last_name']);
$last_name = mysqli_real_escape_string($con, $last_name);
$section = clean_input($_POST['section']);
$section = mysqli_real_escape_string($con, $section);
$cont_no = clean_input($_POST['cont_no']);
$cont_no = mysqli_real_escape_string($con, $cont_no);
$G_name = clean_input($_POST['G_name']);
$G_name = mysqli_real_escape_string($con, $G_name);
$G_cont_no = clean_input($_POST['G_cont_no']);
$G_cont_no = mysqli_real_escape_string($con, $G_cont_no);
$G_mail = clean_input($_POST['G_mail']);
$G_mail = mysqli_real_escape_string($con, $G_mail);
$gender = clean_input($_POST['gender']);
$gender = mysqli_real_escape_string($con, $gender);
$height = clean_input($_POST['height']);
$height = mysqli_real_escape_string($con, $height);
$weight = clean_input($_POST['weight']);
$weight = mysqli_real_escape_string($con, $weight);
$lefte = clean_input($_POST['lefte']);
$lefte = mysqli_real_escape_string($con, $lefte);
$righte = clean_input($_POST['righte']);
$righte = mysqli_real_escape_string($con, $righte);
$b_grp = clean_input($_POST['b_grp']);
$b_grp = mysqli_real_escape_string($con, $b_grp);
$b_press = clean_input($_POST['b_press']);
$b_press = mysqli_real_escape_string($con, $b_press);
$sugar = clean_input($_POST['sugar']);
$sugar = mysqli_real_escape_string($con, $sugar);
$pulse = clean_input($_POST['pulse']);
$pulse = mysqli_real_escape_string($con, $pulse);
$spo2 = clean_input($_POST['spo2']);
$spo2 = mysqli_real_escape_string($con, $spo2);
$allergy = clean_input($_POST['allergy']);
$allergy = mysqli_real_escape_string($con, $allergy);
$issues = clean_input($_POST['issues']);
$issues = mysqli_real_escape_string($con, $issues);




    if(isset($university_roll_no) && $university_roll_no != "") 
    {
        //checking
        if(!preg_match("/^[0-9]*$/", $university_roll_no))
        {
            $university_roll_noErr = "*University roll can only contain numbers... ";
            echo $university_roll_noErr;
			$a = 1;
        }
        elseif(strlen($university_roll_no)<11)
        {
            $university_roll_noErr1 = "*University roll is of at least 11 numbers... ";
			echo $university_roll_noErr1;
            $a = 1;
        }
    } 
    if(isset($email) && $email != "") 
    {
        //checking
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $emailErr = "Please enter a valid e-mail ID... ";
			echo $emailErr;
            $a = 1;
        }
        elseif(strlen($email)<7)
        {
            $emailErr1 = "Length of email is too short... ";
			echo $emailErr1;
            $a = 1;
        }
    }

    if(isset($pass) && $pass != "") 
    {
        //checking
        if(!preg_match("/^[0-9]*$/", $pass))
        {
            $passErr = "*password can only contain numbers... ";
			echo $passErr;
            $a = 1;
        }
        elseif(strlen($pass)<8)
        {
            $passErr1 = "*Password must be of at least 8 numbers... ";
			echo $passErr1;
            $a = 1;
        }
    } 
   

    if(isset($S_name) && $S_name != "") 
    {
        //checking
        if(!preg_match("/^[A-Za-z ]*$/", $first_name))
        {
            $S_nameErr = "*Name can only contain aphabets... ";
			echo $S_nameErr;
            $a = 1;
        }
        elseif(strlen($S_name)<3)
        {
            $first_nameErr1 = "* Name is too short... ";
			echo $first_nameErr1;
            $a = 1;
        }
    } 

    if(isset($middle_name) && $middle_name != "") 
    {
        //checking
        if(!preg_match("/^[A-Za-z ]*$/", $middle_name))
        {
            $middle_nameErr = "Middle name can contain only alphabets ";
			echo $middle_nameErr;
            $a = 1;
        }
       /* elseif(strlen($middle_name)<2)
        {
            $middle_nameErr1 = "* short... ";
			echo $middle_nameErr1;
            $a = 1;
        }*/
    } 
   
    if(isset($last_name) && $last_name != "") 
    {
        //checking
        if(!preg_match("/^[A-Za-z ]*$/", $last_name))
        {
            $last_nameErr = "*Surname can contain only aplhabets ";
			echo $last_nameErr;
            $a = 1;
        }
        elseif(strlen($last_name)<2)
        {
            $last_nameErr1 = "* surname is too short... ";
			echo  $last_nameErr1 ;
            $a = 1;
        }
    } 
   
    if(isset($cont_no) && $cont_no != "") 
    {
        //checking
        if(!preg_match("/^[0-9]*$/", $cont_no))
        {
            $cont_noErr = "*contact number can contain numbers only... ";
			echo $cont_noErr;
            $a = 1;
        }
        elseif(strlen($cont_no)!=10)
        {
            $cont_noErr1 = "*Contact number must be of at least 10 numbers... ";
			echo $cont_noErr1;
            $a = 1;
        }
    } 
    if(isset($G_name) && $G_name != "") 
    {
        //checking
        if(!preg_match("/^[A-Za-z ]*$/", $G_name))
        {
            $G_nameErr = "*Guardian's name can contain only aplhabets... ";
            echo $G_nameErr;
			$a = 1;
        }
        elseif(strlen($G_name)<2)
        {
            $G_nameErr1 = "* Guardians name too short... ";
            echo  $G_nameErr1;
			$a = 1;
        }
    } 

    if(isset($G_cont_no) && $G_cont_no != "") 
    {
        //checking
        if(!preg_match("/^[0-9]*$/", $G_cont_no))
        {
            $G_cont_noErr = "*Contact number can only contain numbers... ";
            echo  $G_cont_noErr;
			$a = 1;
        }
        elseif(strlen($G_cont_no)!=10)
        {
            $G_cont_noErr1 = "*Guradians contact number must be of at least 10 numbers... ";
            echo
			$a = 1;
        }
    } 
    if(isset($G_email) && $G_email != "") 
    {
        //checking
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $emailErr = "Please enter a valid e-mail ID... ";
            echo  $emailErr;
			$a = 1;
        }
        elseif(strlen($email)<7)
        {
            $emailErr1 = "Length of email is too short... ";
            echo $emailErr1;
			$a = 1;
        }
    }

    /*if(isset($height) && $height != "") 
    {
        //checking
        if(!preg_match("/^[0-9]*$/", $height))
        {
            $heightErr = "*Height can only contain numbers... ";
            echo  $heightErr;
			$a = 1;
        }
        
    } 
*/

if(isset($height) && $height != "" ) 
    {
        //checking
        if(!preg_match("/^[0-9.]*$/",$height && $height != (float)($height)))
        {
            $heightErr = "*Height can only contain numbers... ";
            echo  $heightErr;
			$a = 1;
        }
        
    }

    
    if(isset($weight) && $weight != "") 
    {
        //checking
        if(!preg_match("/^[0-9]*$/", $weight))
        {
            $weightErr = "*Weight can only contain numbers... ";
            echo $weightErr;
			$a = 1;
        }
        
    } 

    
    if(isset($lefte) && $lefte != "") 
    {
        //checking
        if(!preg_match("/^[0-9+-]*$/", $lefte))
        {
            $lefteErr = "*Eye power can only contain numbers... ";
            echo $lefteErr;
			$a = 1;
        }
        
    } 

     
    if(isset($righte) && $righte != "") 
    {
        //checking
        if(!preg_match("/^[0-9+-]*$/", $righte))
        {
            $righteErr = "*Eye power can only contain numbers... ";
            echo $righteErr;
			$a = 1;
        }
        
    } 
      
    if(isset($b_grp) && $b_grp != "") 
    {
        //checking
        if(!preg_match("/^[A-Za-z+-]*$/", $b_grp))
        {
            $b_grpErr = "*Blood group cannot contain numbers... ";
            echo $b_grpErr;
			$a = 1;
        }
        
    } 
    if(isset($b_press) && $b_press != "") 
    {
        //checking
        if(!preg_match("/^[0-9-]*$/", $b_press))
        {
            $b_pressErr = "Pressure can only contain numbers... ";
            echo $b_pressErr;
			$a = 1;
        }
        
    } 
    if(isset($sugar) && $sugar != "") 
    {
        //checking
        if(!preg_match("/^[0-9]*$/", $sugar))
        {
            $sugarErr = "*Sugar level can only contain numbers... ";
            echo $sugarErr;
			$a = 1;
        }
        
    } 
    if(isset($pulse) && $pulse != "") 
    {
        //checking
        if(!preg_match("/^[0-9]*$/", $pulse))
        {
            $pulseErr = "*Pulse rate can only contain numbers... ";
            echo $pulseErr;
			$a = 1;
        }
        
    } 
    if(isset($spo2) && $spo2 != "") 
    {
        //checking
        if(!preg_match("/^[0-9]*$/", $spo2))
        {
            $spo2Err = "*Oxygen saturation can only contain numbers... ";
            echo $spo2Err;
			$a = 1;
        }
        
    }



    else 
    {
        $error = "You must fill all the required fields... ";
		$a = 1;
    }
	if($a == 0){
        $query    = "INSERT into `users` (university_roll_no, email, pass,  first_name, middle_name, last_name, section, cont_no, G_name, G_cont_no, G_mail, gender, height, weight, lefte, righte,b_grp, b_press, sugar, pulse, spo2, allergy, issues)
                     VALUES ('$university_roll_no', '$email', '$pass', '$first_name', '$middle_name', '$last_name', '$section', '$cont_no', '$G_name', '$G_cont_no', '$G_mail', '$gender', '$height', '$weight', '$lefte', '$righte', '$b_grp', '$b_press', '$sugar', '$pulse', '$spo2', '$allergy', '$issues')";
       $result   = mysqli_query($con, $query);}

if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Please register again with all fileds filled corerctly.</h3><br/>
                  <p class='link'>Click to <a href='regV.php'>Register</a> again.</p>
                  </div>";
        }
    
     } else {
    

?>


<body>
    <div>
    <h2>You are just a few steps ahead to register yourself successfully.</h2>
    <h1 class="login-title" style="font-family:Georgia;  font-size: 38px;  text-align: center; color:lavender; background-color:indigo;">REGISTRATION</h1>
    <p>Fields marked with * are required</p>
    
    </div>
   <hr>
   <hr>
   <hr>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="">
    <form class="form" method="post" name="login">
    <h4 class="login-title" style="font-family:Georgia;  font-size: 20px;  text-align: center; color:midnightblue; background-color:thistle;">Personal Details</h4>
    <div>
    <label for="email"><b>UNIVERSITY ROLL: </b></label>
    <input type="text" class="login-input" name="university_roll_no" placeholder="University Roll*" value="<?php echo $university_roll_no ?>" required/>
    <?php
    if($university_roll_noErr)
    {
        echo $university_roll_noErr;
    }
    if($university_roll_noErr1)
    {
        echo $university_roll_noErr1;
    }
    ?>
    </div>
    <br>
    <br>

    <div>
    <label for="email"><b>EMAIL</b></label>
    <input type="text" class="login-input" name="email" placeholder="Email *" value="<?php echo $email ?>" required/>
    <?php
    if($emailErr)
    {
        echo $emailErr;
    }
    if($emailErr1)
    {
        echo $emailErr1;
    }
    ?>
    </div>
    <br> <br>
    <div>
    <label for="password"><b> PASSWORD: </b></label>
    <input type="text" class="login-input" name="pass" placeholder="Password *" value="<?php echo $pass ?>" required/>
    <?php
    if($passErr)
    {
        echo $passErr;
    }
    if($passErr1)
    {
        echo $passErr1;
    }
    ?>
    </div>
    <br><br>
    <div>
    <label for="first_name"><b>FIRST NAME: </b></label>
    <input type="text" class="login-input" name="first_name" placeholder="Fisrt Name *" value="<?php echo $first_name ?>" required/>
    <?php
    if($first_nameErr)
    {
        echo $first_nameErr;
    }
    if($first_nameErr1)
    {
        echo $first_nameErr1;
    }
    ?>
    </div>
    <br><br>
    <div>
    <label for="first_name"><b>MIDDLE NAME: </b></label>
    <input type="text" class="login-input" name="middle_name" placeholder=" Middle Name " value="<?php echo $middle_name ?>"/>
    <?php
    if($middle_nameErr)
    {
        echo $middle_nameErr;
    }
    if($middle_nameErr1)
    {
        echo $middle_nameErr1;
    }
    ?>
    </div>
    <br><br>

    <div>
    <label for="last_name"><b>LAST NAME: </b></label>
    <input type="text" class="login-input" name="last_name" placeholder="Last Name *" value="<?php echo $last_name ?>" required/>
    <?php
    if($last_nameErr)
    {
        echo $last_nameErr;
    }
    if($last_nameErr1)
    {
        echo $last_nameErr1;
    }
    ?>
    </div>
    <br><br>
    <div>
    <label for="section"><b>SECTION: </b></label>
        <select name="section" class="login-input" name="section">
            <option value="no-stream">Select your section</option>
            <option value="a">A</option>
            <option value="b">B</option>
            <option value="not applicable">N/A</option>
        </select>
    </div>
    <br><br>
    <div>
    <label for="cont_no"><b>CONTACT NUMBER: </b></label>

    <input type="text" class="login-input" name="cont_no" placeholder="Contact Number *" value="<?php echo $cont_no ?>" required/>
    <?php
    if($cont_noErr)
    {
        echo $cont_noErr;
    }
    if($cont_noErr1)
    {
        echo $cont_noErr1;
    }
    ?>
    </div>
    <br><br>

    <div>
    <label for="G_name"><b>GUARDIAN'S NAME: </b></label> 
    <input type="text" class="login-input" name="G_name" placeholder="Guardian's Name *" value="<?php echo $G_name ?>" required/>
    <?php
    if($G_nameErr)
    {
        echo $G_nameErr;
    }
    if($G_nameErr1)
    {
        echo $G_nameErr1;
    }
    ?>
    </div>
    <br><br>
    
    <div>
    <label for="G_cont_no"><b>GURDIAN'S CONTACT NO.: </b></label> 
    <input type="text" class="login-input" name="G_cont_no" placeholder="Guardian's Contact number*" value="<?php echo $G_cont_no ?>" required/>
    <?php
    if($G_cont_noErr)
    {
        echo $G_cont_noErr;
    }
    if($G_cont_noErr1)
    {
        echo $G_cont_noErr1;
    }
    ?>
    </div>
    <br><br>
    <div>
    <label for="G_mail"><b>GUARDIAN'S MAIL: </b></label>
    <input type="text" class="login-input" name="G_mail" placeholder="Gurdian's Email id.*" value="<?php echo $G_mail ?>" required/>
    <?php
    if($G_mailErr)
    {
        echo $G_mailErr;
    }
    if($G_mailErr1)
    {
        echo $G_mailErr1;
    }
    ?>
    </div>
    <br><br>
    <hr>
<hr>
<br>

<h5 class="login-title" style="font-family:Georgia;  font-size: 20px;  text-align: center; color:midnightblue; background-color:thistle;">Medical History</h5>

    <label for="gender"><b>GENDER: </b></label>
        <select name="gender" class="login-input" name="gender">
        <option value="no-gender">Select your option</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            
        </select>
    
        <br><br>

    <div>
    <label for="height"><b>HEIGHT: </b></label>
    <input type="number" class="login-input" name="height" placeholder="Height in cm*" value="<?php echo $height ?>" required  /> <b>cm</b>
    <?php
    if($heightErr)
    {
        echo $heightErr;
    }
    ?>
</div>
<br><br>
<div>
<label for="weight"><b>WEIGHT: </b></label>
    <input type="number" class="login-input" name="weight" placeholder="Weight in kg *" value="<?php echo $weight ?>" required/><b>kg</b>
    <?php
    if($weightErr)
    {
        echo $weightErr;
    }
    ?>
</div>
<br><br>
<div>
    <p><b> EYE POWER: </b></p>   
    <input type="number" class="login-input" name="lefte" placeholder="Left Eye Power*" value="<?php echo $lefte ?>" required/><b>D</b>
    <?php
    if($lefteErr)
    {
        echo $lefteErr;
    }
    ?>
</div>
<br><br>
<div>
    <input type="number" class="login-input" name="righte" placeholder="Right Eye Power*" value="<?php echo $righte ?>" required/><b>D</b>
    <?php
    if($righteErr)
    {
        echo $righteErr;
    }
    ?>
</div>
<br><br>
<div>
<label for="b_grp"><b>BLOOD GROUP: </b></label>
    <input type="text" class="login-input" name="b_grp" placeholder="Blood Group *" value="<?php echo $b_grp ?>" required/>
    <?php
    if($b_grpErr)
    {
        echo $b_grpErr;
    }
    ?>
</div>
<br><br>
<div>
<label for="b_press"><b>BLOOD PRESSURE: </b></label>
    <input type="text" class="login-input" name="b_press" placeholder="systole-diastole *" value="<?php echo $b_press ?>" required/><b>mmHg</b>
    <?php
    if($b_pressErr)
    {
        echo $b_pressErr;
        
    }
    
    ?>
</div>
<br><br>
<div>
<label for="sugar"><b>BLOOD SUGAR: </b></label>
    <input type="number" class="login-input" name="sugar" placeholder="Blood Sugar *" value="<?php echo $sugar ?>" required/><b>mg/L</b>
    <?php
    if($sugarErr)
    {
        echo $sugarErr;
    }
    ?>
</div>
<br><br>
<div>
<label for="pulse"><b>PULSE RATE: </b></label>
    <input type="number" class="login-input" name="pulse" placeholder="Pulse Rate *" value="<?php echo $pulse ?>" required/><b>bpm</b>
    
    <?php
    if($pulseErr)
    {
        echo $pulseErr;
    }
    ?>
</div>
<br><br>
<div>
<label for="spo2"><b>OXYGEN SATURATION: </b></label>
    <input type="number" class="login-input" name="spo2" placeholder="Oxygen Saturation Level *" value="<?php echo $spo2 ?>" required/><b>%</b>
    <?php
    if($spo2Err)
    {
        echo $spo2Err;
    }
    ?>
</div>
<br><br>
<div>
<label for="allergy"><b>Allergies (if any)</b></label>	<br>
<textarea name="allergy" id="allergy" cols="30" rows="10" placeholder="Mention every allergy you have. Else, type 'none'" value="<?php echo $allergies ?>"></textarea>
</div>
<br><br>
<div>
<label for="issues"><b>Issues(if any)</b></label><br>
<textarea name="issues" id="issues" cols="30" rows="10" placeholder="Mention if you have history of any chronic disease or any major health issues in the past. Else, type 'none'" value="<?php echo $issues ?>"></textarea>
</div>
<br><br>

    

    

    <div>
    <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link"><a href="login.php">Click to Login</a></p>

    </div>

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