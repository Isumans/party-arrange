<?php  
session_start();
require ("db_connect.php");
$error = "";  
$success = "";  

if ($_SERVER["REQUEST_METHOD"] == "POST") {  
    $name = trim($_POST["name"]);  
    $email = trim($_POST["email"]);  
    $message = trim($_POST["message"]);  

    
    $res1= search("SELECT * FROM users WHERE email='$email'");
    if($res1 && $res1->num_rows > 0){
    $row= $res1->fetch_assoc();
    
    iud("INSERT INTO responses (user_id,message) VALUES ('".$row["id"]."', '$message')");
    header("Location:connect.php");
    exit();
    }else{
        $error = "not a valid email. Please try again later.";
    }
    }  
 
?> 

<html>
<head>
    
    <title>Contact Us</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">

</head>
<body>
<header>
    <?php require("nav.php"); ?>
    </header> 
    <div class="login-container">
        <div class="login-form">
        <h1>Contact Us</h1>  

<?php if ($error): ?>  
    <div class="error"><?= $error ?></div>  
<?php endif; ?>  

<?php if ($success): ?>  
    <div class="success"><?= $success ?></div>  
<?php endif; ?>  

<form action="" method="post" id="connectForm">  
    
        <input type="text" id="name" name="name" class="form-control mar" placeholder="Your Name" value="<?= isset($name) ? htmlspecialchars($name) : '' ?>" required>  
    
    
        <input type="email" id="email" name="email" class="form-control mar" placeholder="Your Email" value="<?= isset($email) ? htmlspecialchars($email) : '' ?>" required>  
    
    
        <textarea name="message" id="message" class="form-control large-message mar" placeholder="Your Message" rows="7" required><?= isset($message) ? htmlspecialchars($message) : '' ?></textarea>  
    
        <button type="submit" class="btn" onclick="showAlertAndSubmit(event)">Send Message</button>  
    
</form>  

<div class="contact-info">  
    <p>Feel free to reach out with any questions!</p>  
</div>  
        </div>
    </div>

    <?php require("footer.php");?>  
    <script src="js/cconectV.js" defer></script>
    <script src="js/packageUD.js" defer></script>

</body>
</html>