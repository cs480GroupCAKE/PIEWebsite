<?php
/*
page will verify user login by comparing password to that stored in database
if error will log attempt, inform user and ask for password again, after x attempts
will lock account for y minutes. User will have option for email reset.

currently verifies username is in database and checks if password entered is matches whats stored
if successful success message is displayed, otherwise password or username error displayed
*/

error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('dispaly_startup_errors', '1');
echo ini_get('display_errors');
?>

<?php
//session_start();
$username =  $_POST["username"];
$password = $_POST["password"];

//connect to database and check if password matches password for user
$servername = "localhost";
$myuser = "";
$word = "";
$dbname = "pie";


$conn = new mysqli($servername, $myuser, $word, $dbname);

if($conn->connect_error){
        die("dead ".$conn->connect_error);
}

$query = "SELECT * FROM userInfo WHERE username = '$username'";

$getPass = mysqli_fetch_assoc(mysqli_query($conn, $query));
$currentPass  = $getPass['password'];

//check if username is in database if not return error message
if($getPass['username']==null){
	echo"NOT IN SYSTEM";
}

if(password_verify($password, $currentPass)){
	echo "Logged In";//work to be done here, should redirect and such, right now simple
}else{
	echo "NO";//will return to page and error message shown
}

//header("Location:welcome.html");
$conn.close();
?>
