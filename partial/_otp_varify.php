<?php
session_start();
if ($_SERVER['REQUEST_METHOD']=="POST") {
    echo $_POST['otp'];
    if($_POST['otp']==$_SESSION['otp']){
        // echo 'otp match';

        $alert="Email varified.";
        
        $_SESSION['otpVarified']="TRUE";
        // header('Location:/FoodFest/account.php');
        
    }
    else{
        //otp do not match
        $alert="OTP do not match!";
        
    }
    $_SESSION['alert']=$alert;
    header('Location: ../regi.php');
}

?>