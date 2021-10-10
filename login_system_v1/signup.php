<?php
    include_once 'header.php';
?>
<h1>Sign Up</h1>
<form action="php_scripts/signup_script.php" method="post">
    <input type="text" name="sName" placeholder="Name">
    <br>
    <input type="text" name="email" placeholder="E-Mail">
    <br>
    <input type="text" name="uid" placeholder="Username">
    <br>
    <input type="password" name="pwd" placeholder="Password">
    <br>
    <input type="password" name="pwd2" placeholder=" Repeat Password">
    <br>
    <button type="submit" name="submit">Sign Up</button>
</form>

<?php
if(isset($_GET["error"])){
    if($_GET["error"] == "emptyInput"){
        echo "<p>Fill in all fields</p>";

    } elseif ($_GET["error"] == "FakeEmail"){
        echo "<p>Please enter a valid email</p>";

    }elseif ($_GET["error"] == "pwdMatch"){
        echo "<p>Your passwords do not match</p>";

    }elseif ($_GET["error"] == "PwdShort"){
        echo "<p>Your password is too short</p>";

    }elseif ($_GET["error"] == "UidLong"){
        echo "<p>Your User name is too long</p>";

    }elseif ($_GET["error"] == "prepared_statement_failed"){
        echo "<p>Something went wrong please try again</p>";

    }elseif ($_GET["error"] == "none"){
        echo "<p>Success please sign in</p>";

    }elseif ($_GET["error"] == "User-Is-Already"){
        echo "<p>Username/Email/Real name is already taken</p>";

    }
}
?>

<?php
    include_once 'footer.php';
?>
