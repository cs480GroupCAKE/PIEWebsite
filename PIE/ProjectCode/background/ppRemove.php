<?php
/*
KEEP IN CODE AND COMMENTED OUT UNLESS DEBUGGING

error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('dispaly_startup_errors', '1');
echo ini_get('display_errors');
*/

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

    //Set target directory, get all files from that folder
    $target_dir = "../userImages/profile/";
    $target_files = glob($target_dir."*.*");
    //Need to find a way to receive checkbox id's from editPhotos.php
    //$ppcb_id = array of sent text box id's

    //If submit is pressed, remove the images
    if(isset($_POST["submit"])) {
        /*for($i=0; $i<count($target_files); $i++) {
            if($ppcb_id == 'ppcb'.$i) {
                if(file_exists($target_files[$i])) {
                    unlink(target_files[$i]); 
                    echo 'Images have been removed.';
                } else {
                    echo 'Selected files do not exist';
                }
            }
        }*/
    }
?>