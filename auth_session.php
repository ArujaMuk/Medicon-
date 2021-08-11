<?php
    session_start();
    if(!isset($_SESSION["university_roll_no"])) {
        header("Location: login.php");
        exit();
    }
?>