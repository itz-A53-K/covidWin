<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/header_footer.css">
    <!-- <link rel="stylesheet" href="css/utils.css"> -->
    <link rel="stylesheet" href="css/home.css">
</head>

<body>
    <?php
  include 'partial/_dbConnect.php';
  include 'partial/_header.php';
  ?>
    <section class="body">
      <?php
        include 'partial/_alert.php';
      ?>
        <div class="intro">
            <div class="introLeft">
                <div>
                    <h1>India's Glorious Journey of Vaccination</h1>
                </div>
                <div>
                    <h3>We are here for you</h3>
                    <h2>Let's Defeat COVID!</h2>
                    <div class="btnDiv">
                    <?php
                      if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']=='true'){
                          echo '
                          <a class="btn" href="bookSlot.php">Book Vaccine Slot</a>
                          <a class="btn" href="Edit_cancl.php">View Booking</a>

                          ';
                      }
                      else{
                        echo '
                        <a class="btn" href="regi.php">Register</a>
                        <a class="btn" href="login.php">Login</a>
                        ';
                      }
                      ?>
                    </div>
                </div>
            </div>

            <div>
                <img class="independance" src="image/independance.svg" alt="">
            </div>
        </div>

        <div class="container">
            <div>
                <img class="vEarth" src="image/hero-banner.png" alt="">
            </div>
            <div class="text">
                <h1>Need To Know !</h1>
                <div>
                    <h2>How Virus Spread ?</h2><br>
                    
                    <ul>
                      <li>
                        <h3>Human Contact</h3>
                        The pandemic made the world realise the importance of human contact. Touch is the only sense crucial to humans' survival.

                      </li><br>
                      <li>
                        <h3>Air Transmission</h3>
                        People can also catch COVID-19 if they breathe in droplets from a person with COVID-19 who coughs out or exhales droplets. This is why it is important to stay more than 1 meter (3 feet) away from a person who is sick.
                      </li><br>
                      <li>
                        <h3>Contaminated Objects</h3>
                        It is possible for people to be infected through contact with contaminated surfaces or objects (fomites), but the risk is generally ...
                      </li>
                    </ul>
                    </h2>
                    
                </div>
            </div>
        </div>
    </section>
    <footer>
    </footer>
    <script src="js/logout.js"></script>
    <script src="script.js"></script>
</body>

</html>