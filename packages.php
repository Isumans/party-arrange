<?php 

require 'db_connect.php';

$small_packages= search("SELECT * FROM packages WHERE category= 'Small Scale'");

$medium_packages= search("SELECT * FROM packages WHERE category= 'Medium Scale'");

$large_packages= search("SELECT * FROM packages WHERE category= 'Large Scale'");







?>
<!DOCTYPE html>
<html >
<head>
    
    <title>Our Packages</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">   

</head>
<body>
    <?php include 'nav.php'; ?>
    <div class="up-dl-container">
        <!-- <div class="category"> -->
            <h1>Small Party Packages</h1>
            <div class="up-dl-list">
                <ul>
                    <?php 
                    $counter = 1;
                    while (($row=$small_packages->fetch_assoc() )&& $counter<=3): ?>
                    <li class="card ad2" id="one<?php echo $counter; ?>">
                        <h2><?php echo htmlspecialchars($row['package_name']); ?></h2>
                        <p>Price:<?php echo htmlspecialchars($row['price']); ?></p>
                        <p>Maximum Guest:<?php echo htmlspecialchars($row['guest_limit']); ?></p>
                        <p>No.of hours:<?php echo htmlspecialchars($row['duration']); ?></p>
                        <p>About:<?php echo htmlspecialchars($row['description']); ?></p>
                        <p>Servives:<?php echo htmlspecialchars($row['services_included']); ?></p>
                    </li>
                    <?php 
                    $counter++;
                    endwhile; ?>
                </ul>
                
            </div>
            <h1>Medium Party Packages</h1>
        <div class="up-dl-list">
            <ul>
                <?php 
                $counter = 1; // Re-initialize counter for Medium packages
                while (($row = $medium_packages->fetch_assoc() )&& $counter<=3): ?>
                <li class="card ad2" id="medium-<?php echo $counter; ?>"> <!-- Dynamic ID -->
                    <h2><?php echo htmlspecialchars($row['package_name']); ?></h2>
                    <p>Price: <?php echo htmlspecialchars($row['price']); ?></p>
                    <p>Maximum Guests: <?php echo htmlspecialchars($row['guest_limit']); ?></p>
                    <p>No. of hours: <?php echo htmlspecialchars($row['duration']); ?></p>
                    <p>About: <?php echo htmlspecialchars($row['description']); ?></p>
                    <p>Services: <?php echo htmlspecialchars($row['services_included']); ?></p>
                </li>
                <?php 
                $counter++; // Increment counter for next iteration
                endwhile; ?>
            </ul>
        </div>

        <!-- Large Scale Packages -->
        <h1>Large Party Packages</h1>
        <div class="up-dl-list">
            <ul>
                <?php 
                $counter = 1; // Re-initialize counter for Large packages
                while (($row = $large_packages->fetch_assoc() )&& $counter<=3): ?>
                <li class="card ad2" id="large-<?php echo $counter; ?>"> <!-- Dynamic ID -->
                    <h2><?php echo htmlspecialchars($row['package_name']); ?></h2>
                    <p>Price: <?php echo htmlspecialchars($row['price']); ?></p>
                    <p>Maximum Guests: <?php echo htmlspecialchars($row['guest_limit']); ?></p>
                    <p>No. of hours: <?php echo htmlspecialchars($row['duration']); ?></p>
                    <p>About: <?php echo htmlspecialchars($row['description']); ?></p>
                    <p>Services: <?php echo htmlspecialchars($row['services_included']); ?></p>
                </li>
                <?php 
                $counter++; // Increment counter for next iteration
                endwhile; ?>
            </ul>
        </div>
           
        <!-- </div> -->
        </div>



    </div>
    
</body>
</html>