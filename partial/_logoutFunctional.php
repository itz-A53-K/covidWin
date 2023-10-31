<?php
    
    // $currentUrl=$_POST['currentUrl'];
    session_start();
    session_destroy();
    $alert="You have logged out successfully.";
    session_start();
    $_SESSION['alert']=$alert;
    header ("Location:../home.php");


?>