<?php  
session_start();
require ('db_connect.php');
// Array to store frequently asked questions (FAQs)  
$faqs = [  
    [  
        "question" => "How do I create an account?",  
        "answer" => "To create an account, click on the 'Sign Up' button on the homepage and fill in the required details."  
    ],  
    [  
        "question" => "How can I reset my password?",  
        "answer" => "Click on the 'Forgot Password' link on the login page, and follow the instructions to reset your password."  
    ],  
    [  
        "question" => "How do I schedule a party using Groovy?",  
        "answer" => "Once logged in, navigate to the 'Party Packages' section, choose your preferred package, and click 'Schedule Now' to book your party."  
    ],  
    [  
        "question" => "What payment methods do you accept?",  
        "answer" => "We accept all major credit cards, PayPal, and bank transfers."  
    ],  
    [  
        "question" => "Can I cancel or reschedule my party booking?",  
        "answer" => "Yes, you can cancel or reschedule your booking up to 48 hours in advance by visiting the 'My Bookings' section in your account."  
    ]  
];  
?>  

<!DOCTYPE html>  
<html >  
<head>  
      
    <title>Help</title>  
    <link rel="stylesheet" type="text/css" href="css/styles.css"> 
    <!-- <link rel="stylesheet" type="text/css" href="css/styles2.css">  -->
    <link rel="stylesheet" type="text/css" href="css/styles1.css"> 
  
</head>  
<body> 
    <header>
    <?php require ("nav.php");?>
    </header>
    
<div class="login-container">
<div class="contact-container">  
    <h1>Help & Support</h1>  

    <div class="help-section">  
        <h2>Getting Started</h2>  
        <p>Welcome to Groovy! Here's a quick guide to help you get started:</p>  
        <ul>  
            <li><strong>Create an Account:</strong> Sign up to explore our party packages and services.</li>  
            <li><strong>Explore Packages:</strong> Check out the 'Party Packages' section to find the perfect party option for you.</li>  
            <li><strong>Schedule a Party:</strong> Once you've found the perfect package, simply book your preferred date and time.</li>  
            <li><strong>Manage Bookings:</strong> Visit your account to view, reschedule, or cancel your bookings.</li>  
        </ul>  
    </div>  

    <div class="help-section">  
        <h2>FAQs</h2>  
        <ul class="faq-list">  
            <?php foreach ($faqs as $faq): ?>  
                <li class="faq-item">  
                    <strong><?= $faq["question"] ?></strong>  
                    <p><?= $faq["answer"] ?></p>  
                </li>  
            <?php endforeach; ?>  
        </ul>  
    </div>  

    <div class="help-section">  
        <h2>Need Further Assistance?</h2>  
        <p>If you can't find the information you're looking for, feel free to reach out to our support team. You can visit our <a href="contact.php">Contact Us</a> page for further assistance.</p>  
    </div>  
</div>  
</div>  
<?php require("footer.php") ?>   



</body>  
</html>
