<!DOCTYPE PHP>
<?php
/*
*/
error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('dispaly_startup_errors', '1');
echo ini_get('display_errors');

?>

<?php
    //This will be used when I add the image directory/name to the database
    require '../database/database.php';
    session_start();
    if(isset($_SESSION['username'])) {
        echo 'Session Active'/$_SESSION['username'];
    }

    $username = $_SESSION['username'];

    //Set target directory, get all files from that folder
    $target_dir = "../userImages/profile/".$username."/";
    $target_files = glob($target_dir."*.*");
    
    //If there is a current profile picture, remove it and add this picture
    //Add the selected image to the database under username, current
    //Echo to user's profile and viewProfile to display the image as their picture
?>