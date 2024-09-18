<?php
session_start();

require 'db_connect.php';




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = connect();
    if ($conn){
        $email = $_POST['email'];
        $password = $_POST['password'];
    
        $stmt = $conn->prepare("SELECT * FROM admin_users WHERE email = ?");
        $stmt->bind_param("s", $email);  // "s" specifies the type of data (string)
        $stmt->execute();
        $result = $stmt->get_result();
        // $result = search("SELECT * FROM admin_users WHERE email = '".$email."' AND password = '".$password."'");
    
           if ($result && $result->num_rows === 1) {
            $user = $result->fetch_assoc();
    
            // Verify the password
            if (password_verify($password, $user['password'])) {
                // Set session variables
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
    
                // Redirect to admin dashboard
                header("Location: admin.php");
                exit();
            } else {
                $error = "Invalid password.";
            }
        } else {
            $error = "Invalid email.";
        }
    
        $stmt->close();

    }else{
        $error = "Database Error";
    }


    // if ($result && $result->num_rows === 1) {
    //     $user = $result->fetch_assoc();
        
    //     $_SESSION['user_id'] = $user['id'];
    //     $_SESSION['username'] = $user['username'];

    //     header("Location: admin.php");
        
    // } else {
    //     $error = "Invalid username or password.";
    // }


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
            <h2>Admin Login</h2>
            <?php if (isset($error)): ?>
                <p class="error"><?php echo htmlspecialchars($error); ?></p>
            <?php endif; ?>
            <form action="admin_login.php" method="post">
                <label for="email">Email:</label>
                <input type="text" id="email" class="form-control" name="email" required>

                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>

                <button class="btn" type="submit">Login</button>
            </form>
        </div>
    </div>
    <script src="js/scripts.js"></script>
</body>

</html>