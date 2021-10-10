<?php
include_once "header.php";
if(!isset($_SESSION['userName'])) {
    header("location: /php_tests/login_system_v1/index.php");
}

?>
<p>
<form action="php_scripts/save_files_script.php" method="post" enctype="multipart/form-data">
    <input type="file" name="data">
    <button type="submit" name="submit">Save File</button>
</form>



<?php
if (isset($_GET["success"])) {
    if(isset($_GET["success"])) {
        if ($_GET["success"] == "uploadCorrect") {
            echo "<p>Your upload is complete</p>";
        } else if ($_GET["success"] == "uploadToBig") {
            echo "<p>Your upload failed it might have been to big(man 1gb)</p>";
        }
    }
}

if ($dir = opendir('files/')) {
    echo "Uploaded files: <br>";
    while (true == ($file = readdir($dir))) {
        if ($file != "." && $file != "..") {
            echo '<a href="files/' . $file . '" download>'.$file.'</a> <br>';
        }
    }
    closedir($dir);
}else{
    echo "Error listing files";
}


include_once "footer.php"

?>

