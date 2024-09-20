<?php
session_start();
require ('db_connect.php');
// session_start();

// if (!isset($_SESSION['user_id'])) {
//     header("Location: login.php");
//     exit();
// }
$large_packages= search("SELECT * FROM packages WHERE category= 'Large Scale'");

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
    <h1>GET GROOVY GET WILD<br>
    IT'S TIME TO PARTY GEN Z STYLE!</h1>
        <div class="bookbtn">
            <a href="#">Book now</a>
            <!-- <script type="text/javascript">
                if($_SESS)
            </script> -->
        </div>
    </div>
    <div class="hero">
        

        <div class="main-hero">
            <div class="left-column">
                <img src="images/XL.png" alt="partypic" class="exlarge-image">
            </div>

            <div class="right-column">
                <div class="image-row">
                    <img src="images/sf.png" alt="partypic" class="smallf-image">
                    <img src="images/ss.png" alt="partypic" class="smalls-image">
                </div>
                <span class="image-label"></span>
                <img src="images/l.png" alt="partypic" class="large-image">
            </div>
        </div>
    </div>
    <!-- <div class="packages-container">
        <div class="packages-list">
            <ul>
                <li><div class="card" id="one"><h2>Birthday's</h2></div></li>
                <li><div class="card" id="two"><h2>Batch Parties</h2></div></li>
                <li><div class="card" id="three"><h2>Graguations</h2></div></li>
            </ul>
        </div>
    </div> -->
    <div class="intro">
         <h1>Groovy , Wild , The Gen-Z Style</h1>
        <p>Unleash your inner rebel,break free from the norm and join the ultimate Gen-Z party<br>experience where individuality reigns supreme.</p>
    </div>
    <div class="package-con">
        <div class="left-package-includes">
            <h2>Package Includes</h2>
            <ul class="two-column">
                <li>Cake</li>
                <li>Decorations</li>
                <li>Exclusive 2 Course Dinner</li>
                <li>Live BBQ Station</li>
                <li>Mirror PhotoBooth</li>
                <li>Neon Lighting</li>
            </ul>
        </div>
        <div class="right-package-includes">
            <h2>Add-Ons</h2>
            <ul>
                <li>DJ</li>
                <li>Sound System</li>
                <li>Belly Dancer</li>
                <li>Bartender</li>
            </ul>
            <p>Important: More Add-ons available upon request.</p>
        </div>
    </div>
    <!--second intro-->
    <div class="sintro">
        <h1>Live the experience , Live the memories</h1>
    </div>
<!--second intro video-->
    <div class="sintrovideo">
        <video  loop autoplay muted>
            <source src="assets/INTRO.mp4" type="video/mp4">
    </div>

<!--upcoming events-->
    <div class="upevents">
        <h1>LOOK FOR YOURSELF</h1>
        <h1>OUR UPCOMING EVENTS</h1>
    </div>
    <div class="second-image-row">
        <img src="images/1.png" alt="partypic" class="eventf-image">
        <img src="images/2.png" alt="partypic" class="events-image">
        <img src="images/3.png" alt="partypic" class="eventt-image">
        <img src="images/4.png" alt="partypic" class="eventfo-image">
    </div>

<!--booking-->
    <div class="booking">
        <h1>BOOK NOW - PARTY NOW - BOOK NOW</h1>
        <button class="bookbutton" id="bookbtn">Get This Package</button>
    </div>
    <div class="third-image-row">
        <img src="images/t1.png" alt="partypic" class="bookf-image">
        <img src="images/t2.png" alt="partypic" class="books-image">
        <img src="images/t3.png" alt="partypic" class="bookt-image">
        <img src="images/t4.png" alt="partypic" class="bookfo-image">
        <img src="images/t5.png" alt="partypic" class="bookfi-image">
    </div>


<!--packages-->
    <div class="package">
        <h1>RELATED PACKAGES</h1>
        <button class="packbutton" id="packbtn"><a href="packages.php#large">Veiw More</a></button>
    </div>
    <div>
            <ul class="fourth-image-row">
                <?php 
                $counter = 1;
                while (($row = $large_packages->fetch_assoc() )&& $counter<=3): ?>
                <li class="packimage" > 
                     <img src="images/L<?php echo $counter; ?>.jpg" alt="some image" >

                    <h2><?php echo htmlspecialchars($row['package_name']); ?></h2>
                    <p>Price: $<?php echo htmlspecialchars($row['price']); ?></p>
                    <p>Maximum Guests: <?php echo htmlspecialchars($row['guest_limit']); ?></p>
                    <p>No. of hours: <?php echo htmlspecialchars($row['duration']); ?></p>
                    <p>About: <?php echo htmlspecialchars($row['description']); ?></p>
                    <p>Services: <?php echo htmlspecialchars($row['services_included']); ?></p>
                    <div class="packimagebuttons">
                        
    
                    </div>
                </li>
                <?php 
                $counter++; // Increment counter for next iteration
                endwhile; ?>
            </ul>
        </div>
    <!-- <div class="fourth-image-row">
        <div class="packimage">
            <img src="images/f1.png" alt="Outdoor get together" class="foimagef">
            <h2>Outdoor Get Together</h2>
            <p>Enjoy the beautiful weather of Fujairah and make memories.</p>
            <span class="price">???? LKR</span>
            <div class="packimagebuttons">
                <button id="packimgbtn" class="packimageinnerbuttons">Learn More</button>
                <button id="packimgbtn" class="packimageinnerbuttons">Customise</button>
            </div>
        </div>
        <div class="packimage">
            <img src="images/f2.png" alt="Explore the desert" class="foimages">
            <h2>Explore The Desert</h2>
            <p>Gather around and listen to your friends' most miraculous stories.</p>
            <span class="price">???? LKR</span>
            <div class="packimagebuttons" >
                <button id="packimgbtn" class="packimageinnerbuttons">Learn More</button>
                <button id="packimgbtn" class="packimageinnerbuttons">Customise</button>
            </div>
        </div>
        <div class="packimage">
            <img src="images/f3.png" alt="Graduation Party" class="foimaget">
            <h2>Graduation Party</h2>
            <p>Let's party hard because you studied hard.</p>
            <span class="price">???? LKR</span>
            <div class="packimagebuttons">
                <button id="packimgbtn" class="packimageinnerbuttons">Learn More</button>
                <button id="packimgbtn" class="packimageinnerbuttons">Customise</button>
            </div>
        </div>    
    </div> -->


    <?php require('footer.php'); ?>
</body>
</html>