<?php
/*
KEEP IN CODE AND COMMENTED OUT UNLESS DEBUGGING

error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('dispaly_startup_errors', '1');
echo ini_get('display_errors');
*/
?>

<?php
    require '../database/database.php';
    session_start();
    if(isset($_SESSION['username'])) {
        echo 'Session Active'/$_SESSION['username'];
    }

    //Set target file and directory - should rename files differently after testing
    $target_dir = "../userImages/profile/";
    $target_file = $target_dir.basename($_FILES["ppuploadfile"]["name"]);
    $uploadOK = 1;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
    
    //Check that image is real upon submission
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["ppuploadfile"]["tmp_name"]);
        if($check !== false) {
            echo "Image is valid - ".$check["mime"].".<br>";
            $uploadOk = 1;
        } else {
            echo "File is not an image.<br>";
            $uploadOk = 0;
        }
    }
    
    //Check if file already exists
    if(file_exists($target_file)) {
        echo "This file has already been uploaded.<br>";
        $uploadOk = 0;
    }
    
    //Check that file does not exceed a certain size (currently 500KB)
    if($_FILES["ppuploadfile"]["size"] > 500000) {
        echo "Sorry, the file you are trying to upload is too large.<br>";
        $uploadOk = 0;
    }
    
    //Only allow certain formats (jpg, jpeg, png, gif)
    if($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.<br>";
        $uploadOk = 0;
    }
    
    //Check uploadOk for errors
    if($uploadOk == 0) {
        echo "Your file was not uploaded.";
    } else {
        if(move_uploaded_file($_FILES["ppuploadfile"]["tmp_name"], $target_file)) {
            //below echo used for testing
            //echo "The file ".basename($_FILES["ppuploadfile"]["name"])." has been uploaded.";
            header('Location:../editPhotos.php');
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
?>