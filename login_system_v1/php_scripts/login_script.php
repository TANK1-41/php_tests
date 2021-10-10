<?php

if(isset($_POST["submit"])){

    $uid = $_POST["name"];
    $pwd = $_POST["pwd"];

    require_once 'connection.php';
    require_once 'functions.php';

    if(EmptyLogin($uid,$pwd) == true){
        header("location: ../login.php?error=emptyInput");
        exit();
    }
    findUser($uid,$pwd,$conn,1);



}else{
    header("location: ../login.php");
    exit();
}