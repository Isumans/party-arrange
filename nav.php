<?php



if (isset($_SESSION['user_id'])&&$_SESSION['user_id']) {
    $isAdmin_rs = search("SELECT *  FROM admin_users WHERE user_id='" . $_SESSION['user_id'] . "';");
    
    
    $isAdmin = $isAdmin_rs->num_rows> 0;

}


?>

<div class="header">
    <ul class="nav_1">
        <h2><a href="index.php">GROOVY</a></h2>
        

        <?php
        if (isset($_SESSION['user_id'])) {
            ?>

            <li class="user"> user: <br><?php echo $_SESSION['username']?></li>
            <li><a class="nav-btn" href="logout.php">Logout</a></li>

            <?php
        } else {
            ?>
            
            <li><a class="nav-btn" href="register.php">SIGN UP</a></li>
            <li><a class="nav-log" href="login.php">LOGIN</a></li>


            <?php

        }

        ?>
        <li><a href="contact.php">Contact us</a></li>
        <li><a href="rhelp.php">Help</a></li>
        <li><a href="packages.php">Our Packages</a></li>
        <?php
        
        if (isset($isAdmin)&&$isAdmin) {
            echo '<li><a href="admin.php">Admin Panel</a></li>';
        }
        ?>


    </ul>

</div>