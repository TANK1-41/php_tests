<?php
include_once 'header.php';
?>
<h1>Log in</h1>
<form action="php_scripts/login_script.php" method="post">
    <input type="text" name="name" placeholder="Username">
    <br>
    <input type="password" name="pwd" placeholder="Password">
    <br>
    <button type="submit" name="submit">Log in</button>
</form>

<?php
if(isset($_GET["error"])){
    if($_GET["error"] == "emptyInput"){
        echo "<p>Fill in all items</p>";
    }else if($_GET["error"] == "wrongPassword"){
    echo "<p>Wrong Password Please try again</p>";
    }else if($_GET["error"] == "WrongUid2"){
        echo "<p>Wrong Username Please try again</p>";
    }else if($_GET["error"] == "conn"){
        echo "<p>Sorry the servers appear to be down at the moment</p>";
    }}
?>

<?php
include_once 'footer.php';
?>
