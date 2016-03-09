<?php
session_start();   //  Must start a session before destroying it

if (isset($_SESSION))
{
    unset($_SESSION);
    session_unset();
    session_destroy();
}

header("Location:../home");
?>