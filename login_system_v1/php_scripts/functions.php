<?php
function EmptySignUp($name,$email,$uid,$pwd,$pwd2){
    $tracker = null;

    if(empty($name) || empty($email) || empty($uid) || empty($pwd) || empty($pwd2)){
        $tracker = true;
    }else{
        $tracker = false;
    }
    return $tracker;
}

function FakeEmail($email){
    $tracker = null;
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        $tracker = false;
    }else{
        $tracker = true;
    }
    return $tracker;
}

function PwdMatch($pwd,$pwd2){
    $tracker = null;
    if($pwd == $pwd2){
        $tracker = false;
    }else{
        $tracker = true;
    }
    return $tracker;
}


function makeUser($conn, $name, $email, $uid, $pwd){
    $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) VALUES (?,?,?,?);";
    $stmtInt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmtInt, $sql)){
        header("location: ../signup.php?error=prepared_statement_failed");
        exit();
    }else{
        $hashpwd = password_hash($pwd, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmtInt, "ssss", $name, $email, $uid, $hashpwd);
        mysqli_stmt_execute($stmtInt);
        mysqli_stmt_close($stmtInt);
        header("location: ../signup.php?error=none");
        exit();
    }
}

function UidLong($uid){
    $tracker = null;
    $length = strlen($uid);
    if($length < 25 ){
        $tracker = false;
        return $tracker;
    } else {
        $tracker = true;
        return $tracker;
    }
}

function PwdShort($pwd){
    $tracker = null;
    $length = strlen($pwd);
    if($length < 4){
        $tracker = true;
        return $tracker;
    } else{
        $tracker = false;
        return $tracker;
    }
}



function EmptyLogin($uid,$pwd){
    $results = null;

    if(empty($uid) || empty($pwd)){
        $results = true;
    }else{
        $results = false;
    }
    return $results;
}
function findUser($uid,$pwd,$conn,$type){
    $search =
        "SELECT * FROM users WHERE usersName LIKE '%$uid%' OR usersEmail LIKE '%$uid%' OR usersUid LIKE '%$uid%';";
    if($result = mysqli_query($conn,$search)){
        $count = mysqli_num_rows($result);
       if($count > 0){
           if($type !== 1) {
               return true;
           }
           $row = mysqli_fetch_assoc($result);
           if ($count < 1){
               for ($i = 0,$limiter = 0; $i <= $count; $i++) {
                   if ($limiter == 0){
                       echo "Error please contact admin there are $count accounts with his name <br>";
                       echo "To help find a solution please inform the admin of the users id that are below: <br>";
                       $limiter++;
                   }
                   echo $row['usersId'];
               }
               exit();
           }
            $pwdEncript = $row['usersPwd'];
            $Pwd = password_verify($pwd, $pwdEncript);
            if($Pwd == false){
                header("location: ../login.php?error=wrongPassword");
            }else if($Pwd == true){
                session_start();
                $_SESSION['userNum'] = $row['usersId'];
                $_SESSION['userPwd'] = $row['usersPwd'];
                $_SESSION['userName'] = $row['usersName'];
                header("location: ../index.php?user=". $_SESSION['userName'] );

                exit();
            }
       }else if($type == 1) {
            header("location: ../login.php?error=WrongUid2");
       }else{
           return false;
       }
    }else{
        header("location: ../login.php?error=conn");
    }

}

