<!DOCYPE PHP>
<?php
    $servername = "localhost";
    $myuser = "pie";
    $word = "4piE8cakE1";
    $dbname = "pie";
    $database = mysqli_connect($servername,$myuser,$word,$dbname) or die('Location:./databasedown.html');
?>
