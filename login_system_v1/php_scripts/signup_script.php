<?php
if(isset($_POST["submit"])){
    $name = $_POST["sName"];
    $email = $_POST["email"];
    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwd2 = $_POST["pwd2"];

    require_once 'connection.php';
    require_once 'functions.php';

    if(EmptySignUp($name,$email,$uid,$pwd,$pwd2) == true){
        header("location: ../signup.php?error=emptyInput");
        exit();
    }

    if(FakeEmail($email) == true){
        header("location: ../signup.php?error=FakeEmail");
        exit();
    }

    if(PwdMatch($pwd,$pwd2) == true){
        header("location: ../signup.php?error=pwdMatch");
        exit();
    }

    if(PwdShort($pwd) == true){
        header("location: ../signup.php?error=PwdShort");
        exit();
    }
    if(UidLong($uid) == true){
        header("location: ../signup.php?error=UidLong");
        exit();
    }
    if(findUser($uid,null,$conn,2) == true){
        header("location: ../signup.php?error=User-Is-Already");
        exit();
    }
   makeUser($conn, $name, $email, $uid, $pwd);


}else {
    header("location: ../signup.php");
    exit();
}
