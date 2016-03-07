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
        echo 'Session Active'.$_SESSION['username'];
    }

    $username = $_SESSION['username'];

    //Set target directory, get all files from that folder
    $target_dir = "../userImages/profile/".$username."/";
    $target_files = glob($target_dir."*.*");
<<<<<<< HEAD
    
    //Use these in case the current profile picture is being removed
    $curr_dir = "../userImages/current/".$username."/";
    $curr_files = glob($curr_dir."*.*");
    $profile_blank = $curr_dir."profileBlank.jpg";
    
=======
>>>>>>> parent of dd05aa8... l
    $num_files = count($target_files);

    //If submit is pressed, remove the images
    if(isset($_POST["submit"])) {
        for($j=0; $j<$num_files; $j++) {
            if(isset($_POST['ppcb'.$j])) {
                if(file_exists($target_files[$j])) {
<<<<<<< HEAD
                    //If the file is the user's current profile image, remove it from current, add default
                    if(basename($curr_files[0]) === basename($target_files[$j])) {
                        
                        $setDefault = "UPDATE images SET current = '$profile_blank'
                                       WHERE username = '$username';";
                        //$remCurr = "DELETE FROM images WHERE current = '$curr_files[0]';";
                        unlink($target_files[$j]);
                        unlink($curr_files[0]);
                        copy("../Images/profileBlank.jpg", $profile_blank);
                        /*if(!$database->query($remCurr) === TRUE) {
                            echo "Failed to remove the image URL from the database.";
                        }*/
                        if(!$database->query($setDefault) === TRUE) {
                            echo "Failed to add the blank image URL from the database.";
                        }
                        
                    } else {
                        unlink($target_files[$j]); 
                    }
                    
                    /*Could be used to remove null image urls
                    $remURLs = "DELETE FROM images WHERE username = '$username'
                                AND profile IS NULL AND event IS NULL;";
                    if($database->query($remURLs) === TRUE) {
                        echo "URLS of null items have been removed.";
                    } else {
                        echo "Error: ".$ppRemove."<br>".$database->error;
                    }*/
                    
=======
                    unlink($target_files[$j]); 
>>>>>>> parent of dd05aa8... l
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