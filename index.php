<?php
// session_start();

// if (!isset($_SESSION['user_id'])) {
//     header("Location: login.php");
//     exit();
// }
?>


<!DOCTYPE html>
<html>
<head>
    
    <link rel="stylesheet" type="text/css" href="css/styles.css">

    
    <title>Dashboard</title>
</head>
<body>
    <header>
        <div class="header">
            <ul class="nav_1">
                <h2>GROOVY</h2>
                
                <li><a class="nav-btn" href="register.php">SIGN UP</a></li>
                <li><a class="nav-log" href="login.php">LOGIN</a></li>
                <li><a href="#2">Contact us</a></li>
                <li><a href="#1">About us</a></li>
                <li><a href="#">Our Packages</a></li>
                
                
            </ul>

        </div>
    
    </header>
    <div class="top-background">
        <h1>IT'S PARTY TIME!!<br>GET GROOVY WITH GROOVY.</h1>
        <div class="bookbtn">
            <a href="#">Book now</a>
            <!-- <script type="text/javascript">
                if($_SESS)
            </script> -->
        </div>
    </div>
    <div class="packages-container">
        <div class="packages-list">
            <ul>
                <li><div class="card" id="one"><h2>Birthday's</h2></div></li>
                <li><div class="card" id="two"><h2>Batch Parties</h2></div></li>
                <li><div class="card" id="three"><h2>Graguations</h2></div></li>
            </ul>
        </div>
    </div>
    <h1>Welcome, 
        !</h1>
    <p>This is your dashboard.</p>
    <a href="logout.php">Logout</a>
</body>
</html>