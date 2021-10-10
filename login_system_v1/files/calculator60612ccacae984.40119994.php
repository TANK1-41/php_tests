<!DOCTYPE html>
<html lang="enlish">
<meta charset="UTF-8">

<title>hello world</title>
<body>
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
<p>The answer is: </p>
<?php
if(isset($_GET["submit"])){
    $result1 = $_GET["num1"];
    $result2 = $_GET["num2"];
    $operator = $_GET["operator"];

    //echo ($operator);

    switch ($operator){
        case "none":
            echo ("Error select something");
            break;
        case "add":
            echo ("<br>" . ($result1 + $result2));
            break;
        case "subtract":
            echo ($result1 - $result2);
            break;
        case "multiply":
            echo ($result1 * $result2);
            break;
        case "divide":
            echo ($result1 / $result2);
            break;
    }

}

?>

</body>
</html>
