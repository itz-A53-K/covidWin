<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>
    <link rel="stylesheet" href="css/header_footer.css">
    <!-- <link rel="stylesheet" href="css/utils.css"> -->
    <link rel="stylesheet" href="css/edit.css">
</head>

<body>
    <?php
        session_start();
        include 'partial/_dbConnect.php';
        include 'partial/_header.php';
      
        if(!isset($_SESSION['loggedin']) && $_SESSION['loggedin']!='true'){
            $_SESSION['alert']="Please register first";
            header('Location: regi.php');
        }
        else{
            echo '
                <section class="body">
                    ';
                    include 'partial/_alert.php';
                    
                    echo ' 
                    <div class="container">
                        <div class="titleCard">
                            <div class="sno">S. No.</div>
                            <div class="name">Name</div>
                            <div class="email">Email</div>
                            <div class="date">Vaccination Date</div>
                            <div class="cname">Center</div>
                            <div class="btndiv">Action</div>
                        </div>
                        ';
                        $user_id=$_SESSION['user_id'];
                        $sql="SELECT * FROM `book_slot` WHERE user_id=$user_id";
                        $result=mysqli_query($conn,$sql);
                        $no_of_rows=mysqli_num_rows($result);
                        $sNo=0;

                        if($no_of_rows==0){
                            echo '<center><h1 style="font-size: 2rem; margin:5vh 2vw;"> No Booking Found.</h1></center>';
                        }
                        else{
                            // echo $user_id;
                            while($row=mysqli_fetch_assoc($result)){
                                $sNo=$sNo+1;
                                echo '
                                
                                    <div class="card">
                                        <div class="sno">'.$sNo.'</div>
                                        <div class="name">'.$row['name'].'</div>
                                        <div class="email">'.$row['email'].'</div>
                                        <div class="date">'.$row['date'].'</div>
                                        <div class="cname">'.$row['vacCenter'].',&nbsp;'.$row['vacDist'].'</div>
                                        <div class="btndiv">';

                                        if($row['status']!="accepted"){
                                            echo'
                                            <form action="partial/_update.php" method="post">
                                                <input type="hidden" name="slot_id" value="'.$row['slot_id'].'">
                                                <button type="submit" class="btn edit" id="">Edit</button>
                                            </form>
                                            
                                            
                                            <input type="hidden" id="slot_id" value="'.$row['slot_id'].'">
                                            <button type="submit" class="btn delete" id="cancleBooking">Cancel</button>
                                            ';
                                        }
                                        else if($row['status']=="accepted"){
                                            echo '
                                            <a href="certificate/certi.php" class="getCerti">Get Certificate</a>
                                            ';
                                        }
                                        echo '
                                        </div>
                                    </div>
                                ';
                            }
                        }
                        echo '
                    </div>
                </section>
            ';
        }
    ?>
    <script src="js/logout.js"></script>
    <script src="script.js"></script>
    <script>
        slot_id = document.getElementById('slot_id').value
        cancleBooking = document.getElementById('cancleBooking')

        cancleBooking.addEventListener("click", (e) => {
            if (confirm("Do you really want to cancel the booking?")) document.location = 'http://localhost/covidWin/partial/_deleteSlot.php?slot_id='+slot_id;

        })
    </script>

</body>

</html>