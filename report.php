<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="stylerep2.css"/>
</head>
<body>
<?php
    require('db.php');
    require('auth_session.php');
    // When form submitted, check and create user session.
        $user = $_SESSION["university_roll_no"];
        // Check user is exist in the database
        $query    = "SELECT * FROM `female` WHERE fuser='$user'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        
        echo "<h1>User Reports</h1>";



while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{

  $name0 = $row['today'];
  $name1 = $row['pulse'];
  $name2 = $row['o2'];
  $name3 = $row['tempr']; 
  $name4 = $row['hPress'];
  $name5 = $row['lPress'];
  $name6 = $row['Sugar'];
  $name7 = $row['Thy'];
  

  $name0 = htmlspecialchars($row['today'],ENT_QUOTES);
  $name1 = htmlspecialchars($row['pulse'],ENT_QUOTES);
  $name2 = htmlspecialchars($row['o2'],ENT_QUOTES);
  $name3 = htmlspecialchars($row['tempr'],ENT_QUOTES);
  $name4 = htmlspecialchars($row['hPress'],ENT_QUOTES);
  $name5 = htmlspecialchars($row['lPress'],ENT_QUOTES);
  $name6 = htmlspecialchars($row['Sugar'],ENT_QUOTES);
  $name7 = htmlspecialchars($row['Thy'],ENT_QUOTES);
  
  
  // We will now print the comment to the screen
  
  echo "  <div style='margin:30px 0px;'>
  Updated on: $name0<br /><hr>
     Pulse: $name1<br />
     Oxygen Saturation: $name2<br />
     Temperature: $name3<br />
     Systole: $name4<br />
     Diastole: $name5<br />
     Sugar: $name6<br />
     Thyroid: $name7<br />
    <hr><hr> <hr>
    </div>

  ";
}

$query    = "SELECT * FROM `male` WHERE muser='$user'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        
        



while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{

  $nam1 = $row['today'];
  $nam2 = $row['pulse'];
  $nam3 = $row['o2'];
  $nam4 = $row['tempr']; 
  $nam5 = $row['hpress'];
  $nam6 = $row['lpress'];
  $nam7 = $row['sugar'];
  $nam8 = $row['thy'];
  

  $nam1 = htmlspecialchars($row['today'],ENT_QUOTES);
  $nam2 = htmlspecialchars($row['pulse'],ENT_QUOTES);
  $nam3 = htmlspecialchars($row['o2'],ENT_QUOTES);
  $nam4 = htmlspecialchars($row['tempr'],ENT_QUOTES);
  $nam5 = htmlspecialchars($row['hpress'],ENT_QUOTES);
  $nam6 = htmlspecialchars($row['lpress'],ENT_QUOTES);
  $nam7 = htmlspecialchars($row['sugar'],ENT_QUOTES);
  $nam8 = htmlspecialchars($row['thy'],ENT_QUOTES);
  
  
  // We will now print the comment to the screen
  
  echo "  <div style='margin:30px 0px;'>
    Updated on: $nam1<br /><hr>
     Pulse: $nam2<br />
     Oxygen Saturation: $nam3<br />
     Temperature: $nam4<br />
     Systole: $nam5<br />
     Diastole: $nam6<br />
     Sugar: $nam7<br />
     Thyroid: $nam8<br />
    <hr><hr> <hr>
    </div>

  ";
}

?>

<p><a href="dashboard.php">RETURN</a></p>
</body>
</html>

