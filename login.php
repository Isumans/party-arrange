<?php
session_start();

require 'db_connect.php';




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = search("SELECT * FROM users WHERE email = '".$email."' AND password = '".$password."'");
    $result2 = search(q: "SELECT * FROM admin_users WHERE email = '".$email."'");

    if (($result || $result2) && ($result->num_rows === 1 || $result2->num_rows == 1)) {

        if($result && empty($result2)){
            $user = $result->fetch_assoc();
        
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
    
            header("Location: index.php");
        }else if($result && $result2 ){
            $user = $result2->fetch_assoc();
            $_SESSION['admin_id'] = $user['admin_id'];
            $_SESSION['username'] = $user['username'];

            echo $user['admin_id'];
    
            header("Location: index.php");
        
    } else {
        $error = "Invalid username or password.";
    }


}}



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
            <h2>Login</h2>
            <?php if (isset($error)): ?>
                <p class="error"><?php echo htmlspecialchars($error); ?></p>
            <?php endif; ?>
            <form action="login.php" method="post">
                <label for="email">Email:</label>
                <input type="text" id="email" class="form-control" name="email" required>

                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>

                <button class="btn" type="submit">Login</button>
                <!-- <div class="btn" id="aBtn"><a href="admin_login.php">ADMIN LOGIN PANNEL</a> </div> -->
            </form>
        </div>
    </div>
    <script src="js/scripts.js"></script>
</body>

</html>