<?php
session_start();
require 'db_connect.php';

if (isset($_SESSION['user_id'])) {
    $isAdmin_rs = search("SELECT *  FROM admin_users WHERE user_id='" . $_SESSION['user_id'] . "';");
    
    
    $isAdmin = $isAdmin_rs->num_rows==0;
    if ($isAdmin) {
        header("Location: index.php");
        exit();
    }

}else{
    header("Location: login.php");
    exit();
}


$current_packages = search("SELECT * FROM packages");

$current_users = search("SELECT * FROM users");

$current_orders = search("SELECT * FROM orders");

$current_responses = search("SELECT * FROM responses");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $package_name = $_POST['package_name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $guest_limit = $_POST['guest_limit'];
    $description = $_POST['description'];
    $duration = $_POST['duration'];

    $res1 = search("SELECT * FROM packages WHERE package_name = '" . $package_name . "' AND category = '" . $category . "'");
    
    $row = $res1->fetch_assoc();
    iud("INSERT INTO packages (package_name,category,price,guest_limit,description,duration) VALUES ('$package_name', '$category', '$price','$guest_limit', '$description', '$duration')");
    
    header("Location: admin.php"); 
    exit();




}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">

</head>

<body>
    <?php include 'nav.php'; ?>
    <div class="admin-dash">
        <h1>Admin Dashboard</h1>
        <div class="admin-list">
            <ul>
                <li>
                    <div class="ad">
                        <div class="ad-head">
                        <h2 class="topic">Current Packages</h2>
                        </div>
                        
                        <?php if ($current_packages && $current_packages->num_rows > 0): ?>
                            <table>
                                <thead>
                                    <tr>
                                        <th>User Id</th>
                                        <th>Package Name</th>
                                        <th>Category</th>
                                        <th>Price</th>
                                        <th>Capacity</th>
                                        <th>Hours</th>
                                        <th>Actions</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = $current_packages->fetch_assoc()): ?>
                                        <tr>
                                            <form action="update_delete.php" method="post">
                                                <input type="hidden" id="package_id" name="package_id" value="<?php echo htmlspecialchars($row['id']); ?>">
                                                <td><?php echo htmlspecialchars($row['id']) ?></td>
                                                <td><input type="text" id="package_name" name="package_name" value="<?php echo htmlspecialchars($row['package_name']); ?>"></td>
                                                <td><input type="text" id="category" name="category" value="<?php echo htmlspecialchars($row['category']); ?>"></td>
                                                <td><input type="text" id="price" name="price" value="<?php echo htmlspecialchars($row['price']); ?>"></td>
                                                <td><input type="text" id="guest_limit" name="guest_limit" value="<?php echo htmlspecialchars($row['guest_limit']); ?>"></td>
                                                <td><input type="text" id="duration" name="duration" value="<?php echo htmlspecialchars($row['duration']); ?>"></td>
                                                <td>
                                                    <button type="submit" id="update" name="update" class="btn adm">Update</button>
                                                    <button type="submit" id="delete" name="delete" class="btn adm">Delete</button>
                                                </td>

                                            </form>
                                            
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
                    <div class="ad">
                        <div class="ad-head">
                            <h2 class="topic">Add Packages</h2>
                        </div>
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
                        <!-- <a href="add_event.php">Add Event</a> -->
                    </div>
                </li>
                <li>
                    <div class="ad">
                        <div class="ad-head">
                            <h2 class="topic">Current Users</h2>
                        </div>
                        <?php if ($current_users && $current_users->num_rows > 0): ?>
                            <table>
                                <thead>
                                    <tr>
                                        <th>User Id</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Contact Number</th>
                                        <th>Created Date</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = $current_users->fetch_assoc()): ?>
                                        <tr>
                                            <form method="post" action="UDuser.php">
                                                <input type="hidden" id="user_id" name="user_id" value="<?php echo htmlspecialchars($row['id']); ?>">

                                                <td><?php echo htmlspecialchars($row['id']); ?></td>
                                                <td><input type="text" id="username" name="username" value="<?php echo htmlspecialchars($row['username']); ?>"></td>
                                                <td><input type="text" id="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>"></td>
                                                <td><input type="text" id="phone_number" name="phone_number" value="<?php echo htmlspecialchars($row['phone_number']); ?>"></td>
                                                <td><?php echo htmlspecialchars($row['created_at']); ?></td>
                                                <td>
                                                    <button type="submit" id="update" name="update" class="btn adm">Update</button>
                                                    <button type="submit" id="delete" name="delete" class="btn adm">Delete</button>
                                                </td>

                                            </form>
                                            

                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        <?php else: ?>
                            <p>No Users/p>
                        <?php endif; ?>

                    </div>
                </li>
                
                
                <li>
                    <div class="ad">
                        <div class="ad-head">
                        <h2 class="topic">Scheduled Events</h2>
                        </div>
                        <?php if ($current_orders && $current_orders->num_rows > 0): ?>
                            <table>
                                <thead>
                                    <tr>
                                        <th>User id</th>
                                        <th>Package id</th>
                                        <th>Event date</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = $current_orders->fetch_assoc()): ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($row['user_id']); ?></td>
                                            <td><?php echo htmlspecialchars($row['package_id']); ?></td>
                                            <td><?php echo htmlspecialchars($row['event_date']) ?></td>

                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        <?php else: ?>
                            <p>No packages found.</p>
                        <?php endif; ?>
                    </div>   
                </li>
                <li>
                    <div class="ad">
                        <div class="ad-head">
                        <h2 class="topic">User Responses</h2>
                        </div>
                        <?php if ($current_responses && $current_responses->num_rows > 0): ?>
                            <table>
                                <thead>
                                    <tr>
                                        <th>User id</th>
                                        <th>Message</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = $current_responses->fetch_assoc()): ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($row['user_id']); ?></td>
                                            <td><?php echo htmlspecialchars($row['message']); ?></td>
                                            <td><?php echo htmlspecialchars($row['created_at']); ?></td>
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        <?php else: ?>
                            <p>No packages found.</p>
                        <?php endif; ?>
                    </div>   
                </li>
                
            </ul>
        </div>


    </div>



    <script src="js/validate.js" defer></script>







</body>

</html>