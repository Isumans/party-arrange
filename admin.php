<?php
    session_start();
    require 'db_connect.php';

    $current_packages= search("SELECT * FROM packages");

    $current_users= search("SELECT * FROM users");

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $package_name = $_POST['package_name'];
        $category = $_POST['category'];
        $price = $_POST['price'];
        $guest_limit = $_POST['guest_limit'];
        $description = $_POST['description'];
        $duration = $_POST['duration'];

        $res1 = search("SELECT * FROM packages WHERE package_name = '".$package_name."' AND category = '".$category."'");

        if($res1 && $res1->num_rows > 0){
            $row = $res1->fetch_assoc();
            if(!($row['package_name']==$package_name)){
                iud("UPDATE packages SET package_name='".$package_name."' WHERE id = '".$row['id']."'");
            }else if(!($row['category']==$category)){
                iud("UPDATE packages SET category='".$category."' WHERE id = '".$row['id']."'");
            }else if(!($row['price']==$price)){
                iud("UPDATE packages SET price='".$price."' WHERE id = '".$row['id']."'");
            }else if(!($row['guest_limit']==$guest_limit)){
                iud("UPDATE packages SET guest_limit = '".$guest_limit."' WHERE id = '".$row['id']."'");
            }else if(!($row['description']==$description)){
                iud("UPDATE packages SET description= '".$description."' WHERE id = '".$row['id']."'");
            }else (!($row['duration']==$duration)){
                iud("UPDATE packages SET duration = '".$duration."' WHERE id = '".$row['id']."'");
            }
            
        } else {
            $pack= iud("INSERT INTO packages (package_name,category,price,guest_limit,description,duration) VALUES ('$package_name', '$category', '$price','$guest_limit', '$description', '$duration')");

        }



    }

?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    
</head>
<body>
    <?php include 'nav.php';?>
    <div class="admin-dash">
        <h1>Admin Dashboard</h1>
        <div class="packages-list">
            <ul>
                <li>
                    <div class="card ad">
                        <h2>Current Packages</h2>
                        <?php if ($current_packages && $current_packages->num_rows > 0): ?>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Package Name</th>
                                        <th>Category</th>
                                        <th>Price</th>
                                        <th>Capacity</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = $current_packages->fetch_assoc()): ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($row['package_name']); ?></td>
                                            <td><?php echo htmlspecialchars($row['category']); ?></td>
                                            <td><?php echo htmlspecialchars($row['price']); ?></td>
                                            <td><?php echo htmlspecialchars($row['guest_limit']); ?></td>
                                            
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        <?php else: ?>
                            <p>No packages found.</p>
                        <?php endif; ?>
                        <!-- <a href="view_packages.php">View Packages</a> -->
                    </div>
                </li>
                <li>
                    <div class="card ad">
                        <h2>Add/Update Packages</h2>
                        <form action="admin.php" method="post">
                            <label for="package_name">Package Name:</label>
                            <input type="text" id="package_name" class="form-control" name="package_name" required>

                            <label for="category">Category:</label>
                            <input type="text" class="form-control" id="category" name="category" required>

                            <label for="price">Price:</label>
                            <input type="text" class="form-control" id="price" name="price" required>

                            <label for="guest_limit">Guest Limit:</label>
                            <input type="text" class="form-control" id="guest_limit" name="guest_limit" required>
                            
                            <label for="description">Description:</label>
                            <input type="text" class="form-control" id="description" name="description" required>

                            <label for="duration">Duration:</label>
                            <input type="text" class="form-control" id="duration" name="duration" required>

                            <button class="btn" type="submit">Add/Update Package</button>
                        </form> 
                    <!-- <a href="add_event.php">Add Event</a> -->
                    </div>
                </li>
                <li>
                    <div class="card ad">
                        <h2>Current Users</h2>
                        <?php if ($current_users && $current_users->num_rows > 0): ?>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Contact Number</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = $current_users->fetch_assoc()): ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($row['username']); ?></td>
                                            <td><?php echo htmlspecialchars($row['email']); ?></td>
                                            <td><?php echo htmlspecialchars($row['phone_number']); ?></td>
                                            
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        <?php else: ?>
                            <p>No packages found.</p>
                        <?php endif; ?>
                        <a href="view_users.php">View users</a>
                    </div>
                </li>
            </ul>
        </div>
  

    </div>
    <div class="up-dl-container">
        <div class="up-dl-list">
                <ul>
                    <li>
                    <div class="card ad">

                        <h2>Update package</h2>
                        <form action="admin.php" method="post">
                            <label for="package_name">Package Name:</label>
                            <input type="text" id="package_name" class="form-control" name="package_name" required>

                            <label for="category">Category:</label>
                            <input type="text" class="form-control" id="category" name="category" required>

                            <label for="price">Price:</label>
                            <input type="text" class="form-control" id="price" name="price" required>

                            <label for="guest_limit">Guest Limit:</label>
                            <input type="text" class="form-control" id="guest_limit" name="guest_limit" required>
                            
                            <label for="description">Description:</label>
                            <input type="text" class="form-control" id="description" name="description" required>

                            <label for="duration">Duration:</label>
                            <input type="text" class="form-control" id="duration" name="duration" required>

                            <button class="btn" type="submit">Add Package</button>
                        </form> 
                        </div>
                    </li>
                    
                    
                    <li>
                    <div class="card ad">
                        <h2>User updates</h2>
                        
                        </div>
                    </li>


                    
                    
                </ul>
                   
        </div>
    </div>

    
    <script src="js/validate.js" defer></script> 
    
    
    
   
    
    
    
</body>
</html>