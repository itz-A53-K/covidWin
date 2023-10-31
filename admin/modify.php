<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/header_footer.css">
    <link rel="stylesheet" href="css/utils.css">
    <link rel="stylesheet" href="css/modify.css">
</head>

<body>
    <?php
    include 'partial/_header.php';
    include 'partial/_dbConnect.php';
    echo '
    <section class="body">
        <section class="menu">

            <h1>Modify</h1>';


            if($_SERVER['REQUEST_METHOD']=='POST'){
                $dist_id=$_POST['dist_id'];
                // $dist_name=$_POST['dist_name'];

                $sql="SELECT * FROM `vaccine_dist_wise` WHERE dist_id='$dist_id'";
                $result=mysqli_query($conn,$sql);
                if($result){
                    $row=mysqli_fetch_assoc($result);
                    echo '
                    <form action="partial/_modifyFunctional.php" method="post" class="form">
                        <div>
                            <label for="dist_name"> District Name :</label>
                            <input type="hidden" name="dist_id" value="'.$dist_id.'">
                            <input id="dist_name" value="'.$row['dist_name'].'" disabled>
                        </div>
                        <div>
                            <label for="vac_slot">Vaccine Slot :</label>
                            <input type="number" name="vac_slot" id="vac_slot"  value="'.$row['slot'].'">
                        </div>
                        <div>
                            <label for="vac_stock">Vaccine Stock :</label>
                            <input type="number" name="vac_stock" id="vac_stock" value="'.$row['stock'].'" >
                        </div>
                    
                        <div>
                            <button type="submit" class="btn" >Modify</button>
                        </div>
                    </form>

                    ';
                }
            }
            else{
                
                $sql="SELECT * FROM `vaccine_dist_wise`";
                $result=mysqli_query($conn,$sql);
                echo '
                <form action="modify.php" method="post" enctype="multipart/form-data" class="form">
                    <div>
                        <label for="dist_name"> District Name :</label>
                        <select name="dist_id" id="dist_id" required>
                            <option value="">---select district---</option>';
                        
                            
                            while ($row=mysqli_fetch_assoc($result)) {
                                echo '<option value="'.$row['dist_id'].'">'.$row['dist_name'].'</option>';
                            }
                            
                            echo '
                        </select>
                    </div>
                    <div>
                        <button type="submit" class="btn" >Submit</button>
                    </div>
                </form>
                                ';
                            }
                            echo '
                            </section> 
                            
                            </section>';
                            
                            ?>

    <!-- <a href="#body" class="goToTop" id="goToTop"><button >Go To Top</button></a> -->
    <script src="/covidWin/admin/js/logout.js"></script>
    <script src="/covidWin/script.js"></script>
</body>

</html>