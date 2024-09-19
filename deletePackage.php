<?php
require 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $package_name = $_POST['package_name'];
    $category = $_POST['category'];

    iud("DELETE FROM packages WHERE package_name = '".$package_name."' AND category = '".$category."'");

    header("Location: admin.php");
    exit();

}

?>