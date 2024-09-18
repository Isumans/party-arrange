<?php
    session_start();
    require 'db_connect.php';

    $current_packages= search("SELECT * FROM packages");

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
                                    <?php while ($row = $result->fetch_assoc()): ?>
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
                        <a href="view_packages.php">View Packages</a>
                    </div>
                </li>
                <li>
                    <div class="card ad">
                        <h2>Add Packages</h2>
                        <form action="login.php" method="post">
                            <label for="package_name">Package Name:</label>
                            <input type="text" id="package_name" class="form-control" name="package_name" required>

                            <label for="category">Category:</label>
                            <input type="text" class="form-control" id="category" name="category" required>

                            <label for="price">Price:</label>
                            <input type="text" class="form-control" id="price" name="price" required>

                            <label for="guest_limit">Guest Limit:</label>
                            <input type="text" class="form-control" id="guest_limit" name="guest_limit" required>


                            <button class="btn" type="submit">Add Package</button>
                        </form> 
                    <a href="add_event.php">Add Event</a>
                    </div>
                </li>
                <li>
                    <div class="card ad">
                        <h2>Current Users</h2>
                        <a href="view_users.php">View users</a>
                    </div>
                </li>
            </ul>
            
           
        </div>


    </div>
    

    
    
    
   
    
    
    
</body>
</html>