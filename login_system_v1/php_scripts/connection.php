<?php
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "loginsystem-v1";

$conn = mysqli_connect($dbServername,$dbUsername, $dbPassword,$dbName);

if($conn == false){
    die('connection failed:'. mysqli_connect_error());
}
