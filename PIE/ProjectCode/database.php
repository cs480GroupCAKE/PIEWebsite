<!DOCYPE PHP>
<?php
    $servername = "localhost";
    $myuser = "root";
    $word = "37XWaz9";
    $dbname = "pie";
    $database = mysqli_connect($servername,$myuser,$word,$dbname) or die('Location:databasedown.html');
?>
