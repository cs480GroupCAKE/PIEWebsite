<!DOCTYPE PHP>
<?php require 'database.php';
    session_start();
    $username = $_SESSION['username'];
    $descriptionQ = "Select * FROM user WHERE username = '$username'";
    $descArr = mysqli_fetch_assoc(mysqli_query($database, $descriptionQ));
    $descRes = $descArr['description'];
?>

