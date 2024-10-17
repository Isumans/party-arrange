<?php
// session_start();

require "db_connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username=$_POST["username"];
    $password=$_POST["password"];
    $result = search("SELECT * FROM users WHERE email = '".$_POST["email"]."'");
    if ($result && $result->num_rows > 0) {
           $error = "Email already exists";
     } else {
        $email = $_POST["email"];
        }
    $phone_number = $_POST["phone_number"];
    
    $sql=iud("INSERT INTO users (username, password, email, phone_number) 
            VALUES ('$username', '$password', '$email', '$phone_number')");

            
        $result = $conn->query("SELECT * FROM users WHERE email = '$email'");
        if($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header("Location: login.php");
            exit(); 
        }
        

        
    

}


?>
<!DOCTYPE html>

<html>

<head>
    <title>Registration</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>
    <div class="login-container ">
        <div class="login-form reg">
            <h1 >Registration</h1>
            <?php if (isset($error)): ?>
                <p class="error"><?php echo htmlspecialchars($error); ?></p>
            <?php endif; ?>
            <form action="register.php" method="post" id="registerV">
                <label for="username">Username:</label>
                <input type="text" id="username" class="form-control" name="username" default="" required>

                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" default="" required>

                <label for="email">Email:</label>
                <input type="text" class="form-control" id="email" name="email" required>

                <label for="phone_number">Mobile Number:</label>
                <input type="text" id="phone_number" class="form-control" name="phone_number" required>

                <button class="btn" type="submit">Register</button>
            </form>
        </div>
    </div>
    <script src="js/registrationV.js"></script>
</body>

</html>