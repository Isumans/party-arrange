<?php  
session_start();
require ("db_connect.php");
$error = "";  
$success = "";  

if ($_SERVER["REQUEST_METHOD"] == "POST") {  
    $name = trim($_POST["name"]);  
    $email = trim($_POST["email"]);  
    $message = trim($_POST["message"]);  

    if (empty($name) || empty($email) || empty($message)) {  
        $error = "Please fill in all fields.";  
    } else {  
    $res1= search("SELECT * FROM users WHERE email='$email'");
    if($res1 && $res1->num_rows > 0){
    $row= $res1->fetch_assoc();
    
    iud("INSERT INTO responses (user_id,message) VALUES ('".$row["id"]."', '$message')");
    header("Location:pconnect.php");
    exit();
    }else{
        $error = "not a valid email. Please try again later.";
    }
    }  
}  
?>  

<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Contact Us</title>  
    <link rel="stylesheet" type="text/css" href="css/styles1.css"> 
    <link rel="stylesheet" type="text/css" href="css/styles.css"> 
</head>  
<body> 
    <header>
    <?php require("nav.php"); ?>
    </header> 
    
<div class="login-container">
<div class="contact-container">  
    <h1>Contact Us</h1>  

    <?php if ($error): ?>  
        <div class="error"><?= $error ?></div>  
    <?php endif; ?>  

    <?php if ($success): ?>  
        <div class="success"><?= $success ?></div>  
    <?php endif; ?>  

    <form action="" method="post">  
        <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Your Name" value="<?= isset($name) ? htmlspecialchars($name) : '' ?>" required>  
        </div>
        <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Your Email" value="<?= isset($email) ? htmlspecialchars($email) : '' ?>" required>  
        </div>
        <div class="form-group">
            <textarea name="message" class="form-control large-message" placeholder="Your Message" rows="7" required><?= isset($message) ? htmlspecialchars($message) : '' ?></textarea>  
        </div>
        <div class="form-group">
            <button type="submit" class="btn">Send Message</button>  
        </div>
    </form>  

    <div class="contact-info">  
        <p>Feel free to reach out with any questions!</p>  
    </div>  
</div>  

</div>


<?php require("footer.php");?>  

</body>  
</html> 
