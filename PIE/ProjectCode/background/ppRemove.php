<?php
/*
KEEP IN CODE AND COMMENTED OUT UNLESS DEBUGGING
*/
error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('dispaly_startup_errors', '1');
echo ini_get('display_errors');


/*
         *****************************************************************
         *      This file will be used for removing profile photos.      *
         *                         CH 2.19.2016                          *
         *****************************************************************
*/
?>

<?php
    //This will be used when I remove the image directory/name to the database
    require '../database/database.php';
    session_start();
    if(isset($_SESSION['username'])) {
        echo 'Session Active'/$_SESSION['username'];
    }

    $username = $_SESSION['username'];

    //Set target directory, get all files from that folder
    $target_dir = "../userImages/profile/".$username."/";
    $target_files = glob($target_dir."*.*");
    $num_files = count($target_files);

    //If submit is pressed, remove the images
    if(isset($_POST["submit"])) {
        for($j=0; $j<$num_files; $j++) {
            if(isset($_POST['ppcb'.$j])) {
                if(file_exists($target_files[$j])) {
                    unlink($target_files[$j]); 
                    $remImg = "DELETE FROM images WHERE profile = '$target_files[$j]'";
                    if($database->query($remImg) === TRUE) {
                        //echo 'Images have been removed.';
                        header('Location:../editPhotos.php');
                    } else {
                        echo "Error: ".$ppRemove."<br>".$database->error;
                    }
                } else {
                    echo 'Selected files do not exist';
                }
            }
        }
    }
?>