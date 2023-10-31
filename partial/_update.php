<!-- by ak -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Registration Form in HTML CSS</title>
    <!---Custom CSS File--->
    <!-- <link rel="stylesheet" href="css/utils.css"> -->
    <link rel="stylesheet" href="../css/update.css">
</head>

<body>
    <?php
    if($_SERVER['REQUEST_METHOD']=="POST"){
        include '_dbConnect.php';

        $slot_id=$_POST['slot_id'];

        // echo $slot_id;
        
        $sql="SELECT * FROM `book_slot` WHERE slot_id=$slot_id";
        $result=mysqli_query($conn,$sql);
        if($result){
            $row=mysqli_fetch_assoc($result);

            $gender=$row['gender'];
           
            
            echo '
                <section class="body">
                    <div class="container">
                        <h1>Update page</h1>
                        <form action="_updateSlot.php" method="post" class="form">
                            <input type="hidden" id="slot_id" name="slot_id" value="'.$slot_id.'" >

                            <div class="input-box">
                                <label for="name">Full Name</label>
                                <input type="text" id="name" name="name" value="'.$row['name'].'" required>
                            </div>

                            <div class="input-box">
                                <label for="email">Email Address</label>
                                <input type="text" id="email" name="email" value="'.$row['email'].'" required>
                            </div>
                            <div class="input-box">
                                <label for="age">Age</label>
                                <input type="number" id="age" name="age" value="'.$row['age'].'" required>
                            </div>

                            <div class="column">
                                <div class="input-box">
                                    <label for="phNo">Phone Number</label>
                                    <input type="number" id="phNo" name="phNo" value="'.$row['phNo'].'" required>
                                </div>

                            </div>
                            <div class="gender-box">
                            <input type="hidden" id="genderInp" value="'.$row['gender'].'">
                                    
                                <label>Gender</label>

                                <div class="gender">
                                    <input type="radio" id="male" name="gender" value="male">
                                    <label for="male">Male</label>
                                </div>
                                <div class="gender">
                                    <input type="radio" id="female" name="gender" value="female">
                                    <label for="female">Female</label>
                                </div>
                                <div class="gender">
                                    <input type="radio" id="other" name="gender" value="other">
                                    <label for="other">Other</label>
                                </div>

                            </div>
                            <div class="input-box address">
                                
                                <div class="select-box">
                                    <select>
                                        <option hidden>ID Proof</option>
                                        <option>Aadhar</option>
                                        <option>Pan Card</option>
                                        <option>Voter ID</option>
                                    </select>
                                </div>
                                <input type="text" id="id_num" name="id_num" value="'.$row['id_num'].'">
                                
                            </div>

                            <h3>Guardian\'s Details:</h3>
                            <div class="input-box">
                                <label for="g_name">Name</label>
                                <input type="text" id="g_name" name="g_name" value="'.$row['g_name'].'" required />
                            </div>

                            <div class="input-box">
                                <label for="g_ph">Phone Number</label>
                                <input type="number" id="g_ph" name="g_ph" value="'.$row['g_ph'].'" required />
                            </div>


                            <br>


                            <h3>Vaccine Details</h3>
                            <div>
                                <div class="input-box">
                                    <input type="hidden" id="vacDistInp" value="'.$row['vacDist'].'">
                                    
                                    <label for="vacDist">District</label>
                                    <div class="select-box">
                                        <select id="vacDist" name="vacDist">
                                            <option hidden>Select District</option>
                                            ';
                                            $dist_name="SELECT * FROM `vaccine_dist_wise`";
                                            $dist_name_result=mysqli_query($conn,$dist_name);
                                            
                                            while($dist_name_row=mysqli_fetch_assoc($dist_name_result)){
                                                echo  '
                                                <option value="'.$dist_name_row["dist_name"].'">'.$dist_name_row["dist_name"].'</option>
                                                ';
                                            }
            
                                            echo '
                                        </select>
                                    </div>
                                </div>
                                <div class="input-box">
                                    <input type="hidden" id="vacCenterInp" value="'.$row['vacCenter'].'">

                                    <label for="vacCenter">Vaccine center</label>
                                    <div class="select-box">
                                        <select id="vacCenter" name="vacCenter">
                                            <option hidden> Select Vaccine Center</option>
                                            ';
                                            $center_name="SELECT * FROM `vaccine_dist_wise`";
                                            $center_name_result=mysqli_query($conn,$center_name);
                                            
                                            while($center_name_row=mysqli_fetch_assoc($center_name_result)){
                                                echo  '
                                                <option value="'.$center_name_row["vacCenter"].'">'.$center_name_row["vacCenter"].'</option>
                                                ';
                                            }
            
                                            echo '
                                        </select>
                                    </div>
                                </div>
                                <div class="input-box">
                                    <label for="date"> Date</label>
                                    <input type="date" name="date" id="givenDateInput" value="'.$row['date'].'" required>
                                </div>
                                <div class="input-box">
                                <input type="hidden" id="doseInp" value="'.$row['dose'].'">
                                    
                                    <label for="dose">Vaccine dose</label>
                                    <div class="select-box">
                                        <select name="dose" id="dose">
                                            <option hidden>Select vaccine dose</option>
                                            <option value="1">1st Dose</option>
                                            <option value="2">2nd Dose</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <center><button class="btn" id="checkButton">Confirm Edit</button></center>
                        </form>
                    </div>
                </section>
            ';
        }
}
?>
<script>
    vacCenterInp=document.getElementById("vacCenterInp")
    vacDistInp=document.getElementById("vacDistInp")
    doseInp=document.getElementById("doseInp")
    genderInp=document.getElementById("genderInp")
    
    // console.log(genderInp);

    function selectElement(id, valueToSelect) {    
        let element = document.getElementById(id);
        element.value = valueToSelect;
    }

    selectElement('vacCenter', vacCenterInp.value);
    selectElement('vacDist', vacDistInp.value);
    selectElement('dose', doseInp.value);

    gender = document.getElementById(genderInp.value);
    gender.checked = true;
    
</script>
</body>

</html>