<?php
require 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];

    iud("DELETE FROM users WHERE username = '".$username."' AND email = '".$email."'");

    header("Location: admin.php");
    exit();

}

?>