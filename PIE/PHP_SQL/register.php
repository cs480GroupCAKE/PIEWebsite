<?php
//code commed out below for testing
//echo "hello ";
/*
error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('dispaly_startup_errors', '1');
echo ini_get('display_errors');
*/
?>
<?php

$user = $_POST["username"];
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$email = $_POST["email"];
$password = password_hash($password, $_POST["password"]);


$servername = "localhost";
$myuser = "";
$word = "";
$dbname = "pie";

$conn = new mysqli($servername, $myuser, $word, $dbname);

if($conn->connect_error){
	die("dead ".$conn->connect_error);
}



$check = mysqli_query($conn, "SELECT username FROM userInfo WHERE username =".$user);
echo $check;
if($check->num_rows==0){
	$sql = "INSERT INTO userInfo (username, password, firstName, lastName, email)
	VALUES ('$user', '$password', '$firstname', '$lastname', '$email')";
	echo "OK";
	if($conn->query($sql)===TRUE){
		echo "Success! Your username is: ".$user;
	} else{
		echo "error ".$sql."<br>".$conn->error;
	}
}else{
	echo $user. " is taken. ";

}
/*	echo ="GOT";
}else{
}
*/

$conn->close();
?>
