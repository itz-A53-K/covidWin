<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/header_footer.css">
    <!-- <link rel="stylesheet" href="/covidWin/css/edit.css"> -->
    <link rel="stylesheet" href="css/utils.css">
    <link rel="stylesheet" href="css/adminhome.css">
</head>

<body>
    <?php
        session_start();
        include 'partial/_dbConnect.php';
        include 'partial/_header.php';
      
        if(!isset($_SESSION['aLoggedin']) && $_SESSION['aLoggedin']!='true'){
            $_SESSION['alert']="Please register first";
            header('Location: partial/_adminLogin.php');
        }
        else{
            echo '
    <section class="body">
        ';
        include 'partial/_alert_2.php';

        if ($_SERVER['REQUEST_METHOD']=="POST") {
            include 'partial/_dbConnect.php';
        
            $id_num=$_POST['id_num'];
            $checkUser="SELECT * FROM `book_slot` WHERE id_num='$id_num' and status=''";
            $result=mysqli_query($conn,$checkUser);
            $noOfRows=mysqli_num_rows($result);
        
            if ($noOfRows==1) {
                echo'
                <div class="container">
                <h2> Verification Desk</h2> 
                    <div class="titleCard">
                       
                        <div class="name">Name</div>
                        <div class="date">Vaccination Date</div>
                        <div class="cname">Center</div>
                        <div class="address">Address</div>
                        <div class="g_name">Guardian Name</div>
                        <div class="btndiv">Action</div>
                    </div>
                    ';
                   
                    while($row=mysqli_fetch_assoc($result)){
                    
                    echo '
                    
                        <div class="card">
                            
                            <div class="name">'.$row['name'].'</div>
                            <div class="date">'.$row['date'].'</div>
                            <div class="cname">'.$row['vacCenter'].',&nbsp;'.$row['vacDist'].'</div>
                            <div class="address">'.$row['address'].'</div>
                            <div class="g_name">'.$row['g_name'].'</div>
                            <div class="btndiv">
                                <form action="partial/_varifyFunctional.php" method="post">
                                    <input type="hidden" name="slot_id" value="'.$row['slot_id'].'">
                                    <input type="hidden" name="btnValue" value="accept">
                                    <button type="submit" class="btn edit" id="">Accept</button>
                                </form>
                                <form action="partial/_varifyFunctional.php" method="post">
                                    <input type="hidden" name="slot_id" value="'.$row['slot_id'].'">
                                    <input type="hidden" name="btnValue" value="reject">
                                    <button type="submit" class="btn delete" id="">Reject</button>
                                </form>

                            </div>
                        </div>
                    ';
                    }
                    echo '
                </div>
                ';

            }
            else{
                echo '
                <div class="container">
                    <h2>No booking found.</h2>
                </div>
                ';
            }
        }
        else{
            
        echo '
        <form method="post" action="adminHome.php">

           <div class="formContainer">
           <h2> Verification Desk</h2>
            <center> <div class="select-box">
              <select>
               <option hidden>ID Proof</option>
                <option>Aadhar</option>
                 <option>Pan Card</option>
                  <option>Voter ID</option>
             </select>
          </div>
             </center>

    <input type="text" id="id_num" name="id_num" placeholder="Enter ID Proof number"  >
        <input type="submit" value="Search">
         
        </div>
          </form>
    </section>
    ';
        }
    }
    ?>

    <script src="js/logout.js"></script>
    <script src="../script.js"></script>
</body>

</html>