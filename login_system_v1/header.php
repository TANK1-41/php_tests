<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login System V1</title>

</head>
<body>
<div>

    <?php

    require_once 'php_scripts/functions.php';

    if(!strpos($_SERVER['REQUEST_URI'], '/index.php') == true){
       echo "<li><a href='index.php'>Home</a></li>";
    }

    if(isset($_SESSION['userName'])) {
        if(!strpos($_SERVER['REQUEST_URI'], '/files.php') == true){
            echo "<li><a href='files.php'>File Storage</a></li>";
        }
        if(!strpos($_SERVER['REQUEST_URI'], '/calculator.php') == true){
            echo "<li><a href='calculator.php'>calculator</a></li>";
        }

        echo "<li><a href='php_scripts/logout_script.php'>log out</a></li>";


    }else{
      echo "<li><a href='login.php'>Login</a></li>";
      echo "<li><a href='signup.php'>sign_up</a></li>";
    }
    ?>
</div>
