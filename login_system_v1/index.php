<?php
include_once 'header.php';
if(isset($_SESSION['userName'])) {
    echo "<p>Welcome " . $_SESSION['userName'] . "</p>";
}else {
    echo"<p>Please Sign In or Make a Account";
}
?>



<?php
include_once 'footer.php';
?>
