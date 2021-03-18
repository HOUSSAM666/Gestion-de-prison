<?php
    session_start();
    session_unset();
    session_destroy();
    $msg="Vous êtes déconnecté.";
    header( "location:index.php?msg=".$msg );
?>