<?php
if ($_SERVER['REQUEST_METHOD']=="POST") {
    session_start();
    include '_dbConnect.php';

    $loginEmail=$_POST['loginEmail'];
    $loginPass=$_POST['loginPass'];
    $loginConfPass=$_POST['loginConfPass'];
    $checkUser="SELECT * FROM `users` WHERE userEmail='$loginEmail'";
    $result=mysqli_query($conn,$checkUser);
    $noOfRows=mysqli_num_rows($result);

    if ($noOfRows==1) {
        if ($loginPass == $loginConfPass) {
            $row=mysqli_fetch_assoc($result);
            $verifyPass = password_verify($loginConfPass,$row['password']);// verify the hash of the password
            if ($verifyPass) {
                // echo 'login success';
                $_SESSION['loggedin'] = true;
                $_SESSION['userName'] = $row['userName'];
                $_SESSION['user_id'] = $row['user_Id'];
                $_SESSION['profileLoc'] = $row['photoName'];
                // echo $_SESSION['user_id'];
                $alert= 'Login success';
            }
            else{
                $alert= 'Wrong password';
            }
        }
        else {
            $alert= 'Both passwords do not match';
        }
    }
    else{
        $alert= 'Some error occured . Please try again .';
    }
    $_SESSION['alert']=$alert;
    header('Location: ../home.php');
}


?>