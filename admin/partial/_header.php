<?php
if(session_status() != PHP_SESSION_ACTIVE){
    session_start();
}
?>
<header>
    <nav class="navBar" id="navBar">
        <div class="navContainerLeft">
            <a href="home.php">
            <img src="../image/logo.jpg" alt="logo" srcset="">
                <h1 id="foodFest">Covid win</h1>
            </a>
        </div>
        <div class="navContainerRight">
            <!-- <form class="search" method="post" action="/FoodFest/user/food_Item.php">
                <input type="search" name="query" id="query" placeholder="Search for food">
                
            </form> -->
            <?php
                echo '
                    <ul>
                        <li class="listItem">
                            <a class="itemLink" href="admin/adminHome.php">Home</a>
                        </li>
                        <li class="listItem">
                            <a class="itemLink" href="admin/modify.php">Modify</a>
                        </li>
                       
                        
                        <h2>Hi&nbsp; <em>'.$_SESSION['admin_name'].'</em></a></h2>
                        
                        <button class="headerBtn logoutBtn">Logout</button>
                    </ul>
                ';   
            
            ?>


            <!-- <div class="loginContainer">
                <a href="/FoodFest/account.php"><button type="button" class="loginBtn btn"
                        id="loginBtn">Login</button></a>
            </div> -->
        </div>
    </nav>
</header>

