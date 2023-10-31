<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/header_footer.css">
    <!-- <link rel="stylesheet" href="../css/utils.css"> -->
    <link rel="stylesheet" href="../css/adminLogin.css">
</head>
<body>
<?php
  session_start();
    if(isset($_SESSION['aLoggedin']) && $_SESSION['aLoggedin']=='true'){
        header('Location: ../adminHome.php');
    }
    else{
      echo '
        <section class="body">
          <div class="center">
            <h1> Admin Log In </h1>
            <form method="post" action="_ad_lo_functional.php">
              <div class="txt_field">
                <input type="email" name="admin_email" required>
                <span></span>
                <label>Email ID:</label>
              </div>
              <div class="txt_field">
                <input type="password" name="admin_Pass" required>
                <span></span>
                <label>Password</label>
              </div>
              <center>
                <input type="submit" value="Login">
              </center>
             </form>
          </div>       
        </section>';
    }
?>
</body>
</html>