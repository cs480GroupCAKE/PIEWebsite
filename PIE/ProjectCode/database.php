<!DOCYPE PHP>
<?php
    $servername = "localhost";
    $myuser = "caketeamcwu";
    $word = "password";
    $dbname = "pie";
    $database = mysqli_connect($servername,$myuser,$word,$dbname) or die('Location:databasedown.html');
?>