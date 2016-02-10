<!DOCTYPE PHP>
<?php
/*
This page takes the registration information and creates an entry in the database if username
is available. Boots back to signup form if name taken, else redirects to successful login. Needs
additional error handling code.


KEEP IN CODE AND COMMENTED OUT UNLESS DEBUGGING
*/
error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('dispaly_startup_errors', '1');
echo ini_get('display_errors');

    
?>

<?php include '../database/database.php';?>

<?php
    if (isset($_SESSION))
    {
        unset($_SESSION);
        session_unset();
        session_destroy();
    }

    session_start();
    $username = $_POST["username"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
	$birthdate = $_POST["dob"];
    //split bday into proper format for sql insertion
    $dobArray = explode("/", $birthdate);
    $dob = $dobArray[2]."-".$dobArray[0]."-".$dobArray[1];



    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        die(header("Location:../signUp.php?signUpFailedEmail=true&reason1=invalidEmail"));
    exit();
    }

    if(!password_verify($_POST["passwordVerify"],$password)){
        die(header("Location:../signUp.php?signUpFailedPassword=true&reason=passwordsDontMatch"));
    exit();
    }

/*
DO NOT REMOVE KEEP COMMENTED OUT UNLESS NEEDED FOR DEBUGGING
checks if mysqli installed, troubleshooting
 if (!function_exists('mysqli_init') && !extension_loaded('mysqli')) {
      echo 'no mysqli :(';
 } else {
      echo 'we've got it';
 }
*/
/*
    $conn = new mysqli($servername, $myuser, $word, $dbname);
    if($conn->connect_error){
        header("Location:databaseDown.html");
        die("dead ".$conn->connect_error);
    }
*/
    $qtest = "SELECT username FROM user WHERE username = '$username'";
    $check = mysqli_query($database, $qtest);
    $row = mysqli_fetch_row($check);

    //check if username is taken, if not, insert new user, else print error and return to form
    if(!$row){
        $sql = "INSERT INTO user (username, password, firstname, lastname, email, birthdate, datejoined)
        VALUES ('$username', '$password', '$firstname', '$lastname', '$email', '$dob',NOW())";
        if($database->query($sql)===TRUE){
            $_SESSION['username'] = $username;
            header("Location:../profile.php");
            //printf("Success! Your username is: %s\n Born year: %s\n",$user, $dob);// $row);this needs work
        }else{
        echo "error ".$sql."<br>".$database->error;
        }
    }else{
        //sends user back to page if username
        //taken, must be a way to repopulate the info
        die(header("Location:../signUp.php?signUpFailed=true&reason=usernameTaken"));
    }

    $database->close();
   
?>