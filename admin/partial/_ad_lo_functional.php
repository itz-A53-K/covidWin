<?php
if ($_SERVER['REQUEST_METHOD']=="POST") {
    include '_dbConnect.php';

    $admin_email=$_POST['admin_email'];
    $admin_pass=$_POST['admin_Pass'];
    $checkUser="SELECT * FROM `admins` WHERE admin_email='$admin_email'";
    $result=mysqli_query($conn,$checkUser);
    $noOfRows=mysqli_num_rows($result);

    if ($noOfRows==1) {
         {
            $row=mysqli_fetch_assoc($result);
            if ($row['password']==$admin_pass) {
                // echo 'login success';
                session_start();
                $_SESSION['aLoggedin'] = true;
                $_SESSION['admin_name'] = $row['admin_name'];
                        
                header('Location: ../adminHome.php');
            }
            else{
                echo 'wrong pass';
            }
        }
    }
    else{
        echo '>1';
    }
}


?>