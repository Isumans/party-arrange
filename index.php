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
    <h1>Welcome, 
        !</h1>
    <p>This is your dashboard.</p>
    <a href="logout.php">Logout</a>
</body>
</html>