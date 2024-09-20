<?php
require 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $package_id = $_POST['package_id'];

    if (isset($_POST['update'])) {
        $package_name = $_POST['package_name'];
        $category = $_POST['category'];
        $price = $_POST['price'];
        $guest_limit = $_POST['guest_limit'];
        $duration = $_POST['duration'];

        $updateQuery = "UPDATE packages SET 
                        package_name='$package_name', 
                        category='$category', 
                        price='$price', 
                        guest_limit='$guest_limit',  
                        duration='$duration' 
                        WHERE id='$package_id'";
        iud($updateQuery);
        header("Location: admin.php"); 
        exit();
    }

    if (isset($_POST['delete'])) {
        $deleteQuery = "DELETE FROM packages WHERE id='$package_id'";
        iud($deleteQuery);
        header("Location: admin.php"); 
        exit();
    }
}
?>
