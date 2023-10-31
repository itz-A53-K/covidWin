<?php
    session_start();
    if ($_SERVER['REQUEST_METHOD']=="POST") {
        include '_dbConnect.php';
        // echo 'wrong pass';
        $name=$_POST['name'];
        $age=$_POST['age'];
        $phno=$_POST['phno'];
        // echo $phno;
        $gender=$_POST['gender'];
        $ID_Proof=$_POST['ID_Proof'];
        $ID_no=$_POST['ID_no'];
        $address=$_POST['address'];
        $email=$_POST['email'];
        $pass=$_POST['pass'];


        $profilePic = $_FILES["profilePic"]["name"];
        $tempname = $_FILES["profilePic"]["tmp_name"]; 
        $folderName="../profileImage/$profilePic";

        $check_user="SELECT * FROM `users` WHERE userEmail='$email'";
        
        $check_result=mysqli_query($conn,$check_user);
        
        $noOfrows=mysqli_num_rows($check_result);
        
        if($noOfrows>0){
            $alert= 'Email Id already exist';
        }
        else{
            $hash = password_hash($pass,PASSWORD_DEFAULT);
            $sql="INSERT INTO `users` ( `userEmail`, `password`,  `userName`, `userAge`, `ph_No`, `gender`, `idProof_Name`, `idProof_No`, `userAddress`,`photoName`) VALUES ( '$email', '$hash', '$name','$age','$phno','$gender','$ID_Proof','$ID_no', '$address','$profilePic')";
            

            $result=mysqli_query($conn,$sql);

            if (move_uploaded_file($tempname, $folderName)) {
                $alert = "Image uploaded successfully";
            }else{
                $alert = "Failed to upload image";
            }
            
            if ($result){
                $alert='Your account has been created succesfully';
                unset($_SESSION['otpSent']);
                unset($_SESSION['otpVarified']);

            }
            else{
                $alert= 'Some error occured . Please try again .';
                header('Location: home.php');
            }
        }

        $_SESSION['alert']=$alert;
        header('Location: ../login.php');
    }

?>