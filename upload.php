<?php
if(isset($_Post['Upload'])){
    $file=$_FILES['file'];
    
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg','jpeg','png');

    if(in_array($fileActualExt,$allowed)){
        if($fileError===0){
            if($fileSize<1000000){
                $fileNameNew = uniqid('',true).'.'. $fileActualExt;
                $fileDestinetion = 'upload/'.$fileNameNew;
                move_uploaded_file($fileTmpName,$fileDestinetion);
                header("Location: index.php?uploadsuccess");
            }else{
                echo "Kép feltöltése sikertelen, mert túl nagy a mérete!";
            }
        }else{
            echo "Kép feltöltése sikertelen!";
        }
    }else{
        echo "Kép feltöltése sikertelen a file formátuma miatt!";
    }
}