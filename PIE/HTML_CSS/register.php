<!DOCTYPE PHP>

/*
KEEP IN CODE AND COMMENTED OUT UNLESS DEBUGGING
<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('dispaly_startup_errors', '1');
echo ini_get('display_errors');
?>
*/

<?php
    <form action="register.php" method="post">
    $user = $_POST["username"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        die(header("Location:signUp.php?signUpFailedEmail=true&reason1=invalidEmail"));
	exit();
	//echo $emailErr;
    }

    if(!password_verify($_POST["passwordVerify"],$password)){
        die(header("Location:signUp.php?signUpFailedPassword=true&reason=passwordsDontMatch"));
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

    $servername = "localhost";
    $myuser = "";
    $word = "";
    $dbname = "pie";

    $conn = new mysqli($servername, $myuser, $word, $dbname);
    if($conn->connect_error){
        header("Location:databaseDown.html");
        die("dead ".$conn->connect_error);
    }

    $qtest = "SELECT username FROM userInfo WHERE username = '$user'";
    $check = mysqli_query($conn, $qtest);
    $row = mysqli_fetch_row($check);

    //check if username is taken, if not, insert new user, else print error and return to form
    if(!$row){
        $sql = "INSERT INTO userInfo (username, password, firstName, lastName, email)
        VALUES ('$user', '$password', '$firstname', '$lastname', '$email')";
        if($conn->query($sql)===TRUE){
            printf("Success! Your username is: %s\n ",$user);// $row);this needs work
        }else{
        echo "error ".$sql."<br>".$conn->error;
        }
    }else{
        //sends user back to page if username
        //taken, must be a way to repopulate the info
        die(header("Location: signUp.php?signUpFailed=true&reason=usernameTaken"));
    }

    $conn->close();
?>
