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
        <?php require "nav.php"; ?>
        <!-- <script>
            document.getElementsByClassName("header").innerHTML = fetch("nav.html")
            .then(Response => Response.text())
            .then(html => document.getElementsByClassName("header").innerHTML = html);(html => document.getElementById("header").innerHTML = html);(html => document.getElementById("header").innerHTML = html);
        </script> -->
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