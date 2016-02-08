<DOCTYPE! PHP>
<?php
    session_start(); 
    if(isset($_SESSION['username'])){
        include 'headerLogged.php';
    }else{
        include'header.php';
    }
?>

