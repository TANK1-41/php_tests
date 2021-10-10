<?php
if(isset($_POST['submit'])){
    $data = $_FILES['data'];
    $dataName = $_FILES['data']['name'];
    $dataTemp = $_FILES['data']['tmp_name'];
    $dataSize = $_FILES['data']['size'];
    $dataError = $_FILES['data']['error'];
    $dataType = $_FILES['data']['type'];

    $dataExt = explode('.', $dataName);

    if($dataSize < 1048576000){
        $uniqueName = "_".uniqid('', true).".".$dataExt[1];
        $dataStore = "../files/".$dataExt[0].$uniqueName;
        move_uploaded_file($dataTemp, $dataStore);
        header("location:../files.php?success=uploadCorrect");
    }else{
        echo "Your file is too big(max of 1gb)";
        header("location:../files.php?success=uploadToBig");
    }


}