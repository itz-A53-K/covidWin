<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
    session_start();
    include '_dbConnect.php';
    $btnValue=$_POST['btnValue'];
    $slot_id=$_POST['slot_id'];

    $distName="SELECT * FROM `book_slot` WHERE slot_id=$slot_id";
    $distName_result=mysqli_query($conn,$distName);
    $distName_row=mysqli_fetch_assoc($distName_result);
    $vacDist=$distName_row['vacDist'];

    if($btnValue=="accept"){
        $sql="UPDATE `book_slot` SET `status` = 'accepted' WHERE `book_slot`.`slot_id` = $slot_id";
        $result=mysqli_query($conn,$sql);

        if($result){
            
            $vac_dist_wise="SELECT * FROM `vaccine_dist_wise`  WHERE dist_name='$vacDist'";
            $vac_dist_wise_result=mysqli_query($conn,$vac_dist_wise);
            
            $vac_dist_wise_row=mysqli_fetch_assoc($vac_dist_wise_result);
            
            $stock=$vac_dist_wise_row['stock']-1;
            
            $update="UPDATE `vaccine_dist_wise` set `stock`='$stock' WHERE `vaccine_dist_wise`. dist_name='$vacDist'";
            $update_result=mysqli_query($conn,$update);
            
            if($update_result){
                $alert='Rejected successfully';
            }
            $alert='Accepted successfully';
            
        }
        else{
            $alert='Error, can\'t accepted';

        }
    }
    else if($btnValue=="reject"){
        $sql="DELETE FROM `book_slot` WHERE `book_slot`.`slot_id` = $slot_id";
        $result=mysqli_query($conn,$sql);

        if($result){
            $vac_dist_wise="SELECT * FROM `vaccine_dist_wise`  WHERE dist_name='$vacDist'";
            $vac_dist_wise_result=mysqli_query($conn,$vac_dist_wise);

            $vac_dist_wise_row=mysqli_fetch_assoc($vac_dist_wise_result);

            $slot=$vac_dist_wise_row['slot']+1;
            $stock=$vac_dist_wise_row['stock']+1;
            // echo $slot;
            // echo $stock;
            $update="UPDATE `vaccine_dist_wise` set `slot`='$slot',`stock`='$stock' WHERE `vaccine_dist_wise`. dist_name='$vacDist'";
            $update_result=mysqli_query($conn,$update);
            
            if($update_result){
                $alert='Rejected successfully';
            }
        }
        else{
            $alert= 'Error , can\'t rejected';

        }
    } 

    $_SESSION['alert']=$alert;
    header('Location: ../adminHome.php'); 
}
?>