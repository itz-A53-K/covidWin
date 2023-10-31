<?php

if($_SERVER['REQUEST_METHOD']=="POST"){
    include '_dbConnect.php';
session_start();

    $name=$_POST['name'];
    $email=$_POST['email'];
    $phNo=$_POST['phNo'];
    $gender=$_POST['gender'];
    $streetName=$_POST['streetName'];
    $district=$_POST['district'];
    $ps=$_POST['ps'];
    $po=$_POST['po'];
    $pinc=$_POST['pinc'];
    $id_num=$_POST['id_num'];
    $g_name=$_POST['g_name'];
    $g_ph=$_POST['g_ph'];
    $vacDist=$_POST['vacDist'];
    $vacCenter=$_POST['vacCenter'];
    $date=$_POST['date'];
    $dose=$_POST['dose'];
    $age=$_POST['age'];
    $user_id=$_SESSION['user_id'];

    $address= "streetName= ".$streetName.", dist= ".$district.", PS= ".$ps.", PO= ".$po.", pinc= ".$pinc ;
// echo $address;
    $check_slot="SELECT * FROM `book_slot` WHERE email='$email' and dose='$dose'";
    $check_slot_result=mysqli_query($conn,$check_slot);
    $check_slot_num_rows=mysqli_num_rows($check_slot_result);
    //check if slot already booked (corresponding to phno and dose)
    if ($check_slot_num_rows==0){
        $vac_dist_wise="SELECT * FROM `vaccine_dist_wise` WHERE dist_name='$vacDist'";
        $vac_dist_wise_result=mysqli_query($conn,$vac_dist_wise);

        $vac_dist_wise_row=mysqli_fetch_assoc($vac_dist_wise_result);
        
        if($vac_dist_wise_row['stock']>0){

            if($vac_dist_wise_row['slot']>0){

                $sql="INSERT INTO `book_slot` ( `name`, `email`, `phNo`, `gender`, `address`, `id_num`, `g_name`, `g_ph`, `vacDist`, `vacCenter`, `date`, `dose`,`age`,`user_id`) VALUES ( '$name', '$email', '$phNo', '$gender', '$address', '$id_num', '$g_name', '$g_ph', '$vacDist', '$vacCenter', '$date', '$dose','$age','$user_id')";
                $result=mysqli_query($conn,$sql);

                if ($result) {
                    $slot=$vac_dist_wise_row['slot']-1;
                    
                    $update="UPDATE `vaccine_dist_wise` set `slot`='$slot' WHERE `vaccine_dist_wise` .dist_name='$vacDist'";
                    $update_result=mysqli_query($conn,$update);
                    
                    if($update_result){
                        $alert= 'Your slot has been booked successfully';
                    }
                }
                else{
                    $alert= 'slot book error';
                }
            }
            else{
                $alert= 'No slot available';
                
            }
        }
        else{
            $alert= 'Vaccine is out of stock in your district';

        }
    }
    else{
        $alert= 'Your slot has already booked';
    }
    session_start();
    $_SESSION['alert']=$alert;
    header('Location: ../home.php');

}


?>