<?php
if(session_status() != PHP_SESSION_ACTIVE){
    session_start();
}
?>
<header>
    <nav class="navBar" id="navBar">
        <div class="navContainerLeft">
            <a href="home.php">
                <img src="image/logo.jpg" alt="logo" srcset="">
                <h1 id="foodFest">CovVac</h1>
            </a>
        </div>
        <div class="navContainerRight">
            <!-- <form class="search" method="post" action="/FoodFest/user/food_Item.php">
                <input type="search" name="query" id="query" placeholder="Search for food">
                
            </form> -->
            <?php
            if(isset($_SESSION['aLoggedin']) && $_SESSION['aLoggedin']=='true'){
                header('Location: admin/adminHome.php');
            }
            if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']=='true'){
                echo '
                    <ul>
                        <li class="listItem">
                            <a class="itemLink" href="home.php">Home</a>
                        </li>
                        <li class="listItem">
                            <a class="itemLink" href="bookSlot.php">Book vaccine slot</a>
                        </li>
                        <li class="listItem">
                            <a class="itemLink" href="certificate/certi.php">Get certificate</a>
                        </li>
                        
                        <div class="userDetail">
                         <img class="profileImg" src="profileImage/'.$_SESSION['profileLoc'].'" alt="" srcset="">
                         <h2>Hi&nbsp; <em>'.$_SESSION['userName'].'</em> </h2>
                        </div>
                        
                        <button class="headerBtn logoutBtn">Logout</button>
                        
                    </ul>

                    
                ';
            }
            else{
                echo '
                    <ul>
                        <li class="listItem">
                            <a class="itemLink" href="home.php">Home</a>
                        </li>
                        <li class="listItem">
                            <a class="itemLink" href="bookSlot.php">Book vaccine slot</a>
                        </li>
                        
                        <li class="listItem">
                            <a class="itemLink" href="regi.php">Registration</a>
                        </li>
                        
                    </ul>
                ';   
            }
            ?>


            <!-- <div class="loginContainer">
                <a href="/FoodFest/account.php"><button type="button" class="loginBtn btn"
                        id="loginBtn">Login</button></a>
            </div> -->
        </div>
    </nav>
</header>

