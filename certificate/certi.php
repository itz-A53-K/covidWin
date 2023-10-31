<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Certificate Generator</title>
    <link rel="stylesheet" href="certi.css">
</head>

<body>

    <div class="container">
        <?php
            if($_SERVER['REQUEST_METHOD']=="POST"){
                echo'
                    
                    ';
                    include '../partial/_dbConnect.php';
                    // session_start();
                    $email=$_POST['email'];
                    $sql="SELECT * FROM `book_slot` WHERE email='$email'";
                    $result=mysqli_query($conn,$sql);
                    
                    $row=mysqli_fetch_assoc($result);
                    
                    if(mysqli_num_rows($result)==1){
                       
                        if($row['status']=='accepted'){
                        
                            echo '

                            <input type="hidden" id="name" value="'.$row['name'].'">
                            <input type="hidden" id="age" value="'.$row['age'].'">
                            <input type="hidden" id="gender" value="'.$row['gender'].'">
                            <input type="hidden" id="idProof" value="'.$row['id_num'].'">
                            <input type="hidden" id="dose" value="'.$row['dose'].'">
                            <input type="hidden" id="date" value="'.$row['date'].'">
                            <input type="hidden" id="vacAddress" value="'.$row['vacCenter'].'">


                            <canvas id="canvas" height="750px" width="750px"></canvas>

                            <button onClick="download()" id="download_btn" class="btn">Download</button>
                            ';
                            
                        }
                        else{
                            session_start();
                            $_SESSION['alert']="Your vaccination is not completed yet.";;
                            header('Location: ../home.php');
                        }
                    }
                    else{
                        session_start();
                        $_SESSION['alert']="No vaccine details found for the email : `$email`.";
                        header('Location: ..//home.php');
                    }
               
            }
            else{
                echo '
                <form method="post" action="certi.php">
                    <input type="email" name="email" placeholder="Enter email">
                    <button type="submit" class="btn">Submit</button>
                </form>
                ';
            }
        ?>
    </div>
</body>


<script>
var canvas = document.getElementById('canvas')
var ctx = canvas.getContext('2d')
// var name = document.getElementById('name')
// var downloadBtn = document.getElementById('download_btn')

var image = new Image()
image.crossOrigin = "anonymous";
image.src = '123.png'
image.onload = function() {
    drawImage()
}

function drawImage() {
    var name = document.getElementById('name').value
    var age = document.getElementById('age').value
    var gender = document.getElementById('gender').value
    var idProof = document.getElementById('idProof').value
    var dose = document.getElementById('dose').value
    var date = document.getElementById('date').value
    var vacAddress = document.getElementById('vacAddress').value

    // ctx.clearRect(0, 0, canvas.width, canvas.height)
    ctx.drawImage(image, 0, 0, canvas.width, canvas.height)
    ctx.font = "italic bold 15pt Courier "
    ctx.fillStyle = '#000000'
    ctx.fillText(name, 300, 285)
    ctx.fillText(age, 300, 320)
    ctx.fillText(gender, 300, 350)
    ctx.fillText(idProof, 300, 380)
    ctx.fillText("Covaxin", 300, 470)
    ctx.fillText(dose, 300, 505)
    ctx.fillText(date, 300, 540)
    ctx.fillText(vacAddress, 300, 574)
}

function download() {
    var name = document.getElementById('name')
    var anchor = document.createElement('a');
    anchor.href = canvas.toDataURL('image/png'); // 'image/jpg'
    anchor.download = name.value + ' vaccination certificate.png'; // 'image.jpg'
    anchor.click();
}
</script>

</html>