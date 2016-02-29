<!DOCTYPE PHP>
<?php
/*

error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('dispaly_startup_errors', '1');
echo ini_get('display_errors');
*/
?>

<?php
    //This will be used when I add the image directory/name to the database
    require '../database/database.php';
    session_start();
    if(isset($_SESSION['username'])) {
        echo 'Session Active'.$_SESSION['username'];
    }

    $username = $_SESSION['username'];

    //Set target directory, get all files from that folder, set variable for current dir, get all files
    $target_dir = "../userImages/profile/".$username."/";
    $current_dir = "../userImages/current/".$username."/";
    $target_files = glob($target_dir."*.*");
    $current_files = glob($current_dir."*.*");
    
    $numCurrent = count($current_files);

    //Unlink all files in current files directory, remove them from the database
    if(isset($_POST['submit'])) {
        for($i=0; $i<$numCurrent; $i++) {
            if(file_exists($current_files[$i])) {
                unlink($current_files[$i]);
            }
        }

        //Add the selected image to the current folder and to the database under username, current
        for($j=0; $j<count($target_files); $j++) {
            if(isset($_POST['sprb'])) {
                if($_POST['sprb'] == "sprb".$j) {
                    if(file_exists($target_files[$j])) {
                        $current_pic = $current_dir.basename($target_files[$j]);
                        if(copy($target_files[$j], $current_pic)) {
                            $update = "UPDATE images SET current = '$current_pic' 
                                       WHERE username = '$username'"; //AND profile = 'NULL' AND event = 'NULL';";
                            if($database->query($update) === TRUE) {
                                //echo "Success!";
                                header('Location:../profile.php');
                            }
                        } else {
                            echo "Error copying file!";
                        }
                    }
                }
            }
        }
    }
?>