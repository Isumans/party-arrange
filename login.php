<?php
session_start();

require 'db_connect.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = search("SELECT * FROM users WHERE email = '" . $email . "' AND password = '" . $password . "'");
    

    if ( ($result->num_rows === 1 )) {
        
        $user = $result->fetch_assoc();

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];

        header("Location: index.php");
        


    }
}



?>

<!DOCTYPE html>

<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>
    <div class="login-container">
        <div class="login-form">
            <h1>Login</h1>
            
            <form action="login.php" method="post" id="loginV">
                <label for="email">Email:</label>
                <input type="text" id="email" class="form-control" name="email" >

                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" >

                <button class="btn" type="submit">Login</button>
            </form>
        </div>
    </div>
    <script src="js/loginV.js"></script>
</body>

</html>