<?php
session_start();
require ('db_connect.php');

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
       
    </header>
    
    <div class="top-background">
    <h1>GET GROOVY GET WILD<br>
    IT'S TIME TO PARTY GEN Z STYLE!</h1>
        <div class="bookbtn">
            <a href="packages.php">Book now</a>

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
        <button class="bookbutton" id="bookbtn"><a href="packages.php">Get This Package</a></button>
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



    <?php require('footer.php'); ?>
</body>
</html>