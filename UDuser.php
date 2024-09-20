<?php
require 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];

    if (isset($_POST['update'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];
        

        $updateQuery = "UPDATE users SET 
        username='$username', 
        email='$email', 
        phone_number='$phone_number'
        WHERE id='$user_id'";
        iud($updateQuery);
        header("Location: admin.php"); 
        exit();
    }

    if (isset($_POST['delete'])) {
        $deleteQuery = "DELETE FROM users WHERE id='".$user_id."'";
        iud($deleteQuery);
        header("Location: admin.php"); 
        exit();
    }
}
?>
