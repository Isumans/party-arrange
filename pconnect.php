<?php  
// Initialize variables for error message and success message  
$error = "";  
$success = "";  

// Process form submission  
if ($_SERVER["REQUEST_METHOD"] == "POST") {  
    $name = trim($_POST["name"]);  
    $email = trim($_POST["email"]);  
    $message = trim($_POST["message"]);  

    // Validate required fields  
    if (empty($name) || empty($email) || empty($message)) {  
        $error = "Please fill in all fields.";  
    } else {  
        // Sending email  
        $to = "getgroovy@gmail.com";  
        $subject = "Contact Us Form Submission from $name";  
        $body = "Name: $name\nEmail: $email\nMessage:\n$message";  
        $headers = "From: $email";  

        if (mail($to, $subject, $body, $headers)) {  
            $success = "Message sent successfully!";  
            $name = $email = $message = ""; // Clear the form inputs  
        } else {  
            $error = "There was a problem sending your message. Please try again.";  
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
    <link rel="stylesheet" type="text/css" href="css/styles1.css"> <!-- Ensure the path is correct -->  
</head>  
<body>  

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

</body>  
</html> 
