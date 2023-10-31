<?php

if($_SERVER['REQUEST_METHOD']=="GET"){
    $slot_id=$_GET['slot_id'];
    echo $slot_id;
    include '_dbConnect.php';

    $sql="DELETE FROM `book_slot` WHERE `book_slot`.`slot_id` = $slot_id";
    $result=mysqli_query($conn,$sql);
    if($result){
        $vac_dist_wise="SELECT * FROM `vaccine_dist_wise`  WHERE dist_name='$vacDist'";
        $vac_dist_wise_result=mysqli_query($conn,$vac_dist_wise);

        $vac_dist_wise_row=mysqli_fetch_assoc($vac_dist_wise_result);

        $slot=$vac_dist_wise_row['slot']+1;
        $stock=$vac_dist_wise_row['stock']+1;
        
        $update="UPDATE `vaccine_dist_wise` set `slot`='$slot',`stock`='$stock' WHERE `vaccine_dist_wise`. dist_name='$vacDist'";
        $update_result=mysqli_query($conn,$update);
        
        if($update_result){
            $alert="Slot cancellation success";
        }
    }
    else{
        $alert="Slot cancellation failled ! Please try again.";
    }
    session_start();
    $_SESSION['alert']=$alert;
    header('Location: ../home.php');

}
else{

}

?>