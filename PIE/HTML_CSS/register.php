<?php
//echo "HELLO";

//code commed out below for testing/echo "hello ";

error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('dispaly_startup_errors', '1');
echo ini_get('display_errors');

?>
<?php
//echo "HELLO";
$user = $_POST["username"];
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$email = $_POST["email"];
$password = password_hash($_POST["password"], PASSWORD_DEFAULT);

/*
checks if mysqli installed, troubleshooting
 if (!function_exists('mysqli_init') && !extension_loaded('mysqli')) {
      echo 'no mysqli :(';
 } else {
      echo 'we gots it';
 }
*/
//echo "test0";

$servername = "localhost";
$myuser = "christian";
$word = "jimbob";
$dbname = "pie";

//echo "Test1";

$conn = new mysqli($servername, $myuser, $word, $dbname);

//echo "test2";

if($conn->connect_error){
	die("dead ".$conn->connect_error);
}

//echo "TEST";
$qtest = "SELECT username FROM userInfo WHERE username = '$user'";
$check = mysqli_query($conn, $qtest);
$row = mysqli_fetch_row($check);

//check if username is taken, if not, insert new user, else print error and return to form
if(!$row){
	$sql = "INSERT INTO userInfo (username, password, firstName, lastName, email)
	VALUES ('$user', '$password', '$firstname', '$lastname', '$email')";
	if($conn->query($sql)===TRUE){
		printf("Success! Your username is: %s\n ",$user);// $row);this needs work
	} else{
		echo "error ".$sql."<br>".$conn->error;
	}
}else{
	//echo $user. " is taken. ";
	//sends user back to page if taken, must be a way to repopulate the info, currently linking
	//to dummy page	
	header("Location: usernameTaken.html");

}
/*	echo ="GOT";
}else{
}
*/

$conn->close();
?>
