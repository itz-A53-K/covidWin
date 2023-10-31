<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
    include '_dbConnect.php';
session_start();

    $slot_id=$_POST['slot_id'];

    $name=$_POST['name'];
    $email=$_POST['email'];
    $phNo=$_POST['phNo'];
    $gender=$_POST['gender'];
    // $streetName=$_POST['streetName'];
    // $district=$_POST['district'];
    // $ps=$_POST['ps'];
    // $po=$_POST['po'];
    // $pinc=$_POST['pinc'];
    $id_num=$_POST['id_num'];
    $g_name=$_POST['g_name'];
    $g_ph=$_POST['g_ph'];
    $vacDist=$_POST['vacDist'];
    $vacCenter=$_POST['vacCenter'];
    $date=$_POST['date'];
    $dose=$_POST['dose'];
    $age=$_POST['age'];
    $user_id=$_SESSION['user_id'];

    // $address= "streetName= ".$streetName.", dist= ".$district.", PS= ".$ps.", PO= ".$po.", pinc= ".$pinc ;
// $address ="";
// echo $address;
    $check_slot="SELECT * FROM `book_slot` WHERE slot_id='$slot_id'";
    $check_slot_result=mysqli_query($conn,$check_slot);
    $check_slot_num_rows=mysqli_num_rows($check_slot_result);
    //check if slot already booked 
    if ($check_slot_num_rows==1){
        $sql="UPDATE `book_slot` SET `name`='$name', `email`='$email', `phNo`='$phNo', `gender`='$gender', `id_num`='$id_num', `g_name`='$g_name', `g_ph`='$g_ph', `vacDist`='$vacDist', `vacCenter`='$vacCenter', `date`='$date', `dose`='$dose',`age`='$age' WHERE `book_slot`. slot_id=$slot_id";
        $result=mysqli_query($conn,$sql);

        if ($result) {
            $alert= 'Your edit has been saved successfully';
        }
        else{
            $alert= 'slot book error';
        }
    }
    else{
        $alert= 'No slot found';
    }
    session_start();
    $_SESSION['alert']=$alert;
    header('Location: ../home.php');

}


?>