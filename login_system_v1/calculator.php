<?php
session_start();
if(!isset($_SESSION['userName'])) {
    header("location: /php_tests/login_system_v1/index.php");
}
?>


<!DOCTYPE html>
<html lang="enlish">
<meta charset="UTF-8">

<title>hello world</title>
<body>

<li><a href='index.php'>Home</a></li>
<li><a href='files.php'>File Storage</a></li>
<li><a href='php_scripts/logout_script.php'>log out</a></li>
<form>

    <input type="text" name="num1" placeholder="Number 1">
    <input type="text" name="num2" placeholder="Number 2">
    <select name="operator">
        <option>none</option>
        <option>add</option>
        <option>subtract</option>
        <option>multiply</option>
        <option>divide</option>
    </select>
    <br>
    <button name="submit" value="submit" type="submit">calculate</button>
</form>
<?php
if(isset($_GET["submit"])){
    $result1 = $_GET["num1"];
    $result2 = $_GET["num2"];
    $operator = $_GET["operator"];



    switch ($operator){
        case "none":
            $answer = null;
            echo ("Error select something");
            break;
        case "add":
            $answer = $result1 + $result2;
            echo ("Your answer is: " .$answer);
            break;
        case "subtract":
            $answer = $result1 - $result2;
            echo ("Your answer is: " .$answer);
            break;
        case "multiply":
            $answer = $result1 * $result2;
            echo ("Your answer is: " .$answer);
            break;
        case "divide":
            $answer = $result1 / $result2;
            echo ("Your answer is: " .$answer);
            break;
    }
    switch ($operator){

        case "add":
            $operator = "+";
            break;
        case "subtract":
            $operator = "-";
            break;
        case "multiply":
            $operator = "*";
            break;
        case "divide":
            $operator = "/";
            break;
    }
    $string = $result1.$operator.$result2."=".$answer;


    if(empty($_SESSION['problems'])){
        $_SESSION['problems'] = array();
    }
    array_unshift($_SESSION['problems'],$string);
    for ($i = 0; $i < count($_SESSION['problems']); $i++) {
        //echo $i;
        if($i==0){
            echo "<br/><br/>Previous problems: <br/>". $_SESSION['problems'][$i]. "<br/>";
        }else{
            echo  $_SESSION['problems'][$i]. "<br/>";
        }
    }
}

?>

</body>
</html>
