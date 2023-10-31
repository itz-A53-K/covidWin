<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    include ('_dbConnect.php');

    $dist_id=$_POST['dist_id'];
    $vac_slot=$_POST['vac_slot'];
    $vac_stock=$_POST['vac_stock'];

    echo $dist_id.'/n'.$vac_slot.'/n'.$vac_stock.'/n';
    $sql="UPDATE `vaccine_dist_wise` SET  `slot` = '$vac_slot', `stock` = '$vac_stock' WHERE `vaccine_dist_wise`.`dist_id` = $dist_id";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo 'success';
    }

    
}
?>