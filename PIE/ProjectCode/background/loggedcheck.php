<DOCTYPE! PHP>
<?php
    session_start(); 
    if(isset($_SESSION['username'])){
        include './templates/headerLogged.php';
    }else{
        include'./templates/header.php';
    }
?>

