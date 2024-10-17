<?php  
session_start();
require ('db_connect.php');


  
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
    
<div class="login-container helpcon">
    <div class="login-form">
    <h1>Help & Support</h1> <br />
    <div class="help-section">
    <h2>Getting Started</h2> 
     
     <p>Welcome to Groovy! Here's a quick guide to help you get started:</p>  
     <ul class="faq-list">  
         <li><strong>Create an Account:</strong> Sign up to explore our party packages and services.</li>  
         <li><strong>Explore Packages:</strong> Check out the 'Party Packages' section to find the perfect party option for you.</li>  
         <li><strong>Schedule a Party:</strong> Once you've found the perfect package, simply book your preferred date and time.</li>  
         <li><strong>Manage Bookings:</strong> Visit your account to view, reschedule, or cancel your bookings.</li>  
     </ul>   

    </div>
    <div class="help-section">
        <h2>FAQs</h2>
        <ul class="faq-list">
            <li class="faq-item">
                <strong>How do I create an account?</strong>
                <p>To create an account, click on the 'Sign Up' button on the homepage and fill in the required details.</p>
            </li>
            <li class="faq-item">
                <strong>How do I schedule a party using Groovy?</strong>
                <p>Once logged in, navigate to the 'Party Packages' section, choose your preferred package, and click 'Order Now' to book your party.</p>
            </li>
            <li class="faq-item">
                <strong>What payment methods do you accept?</strong>
                <p>We accept all major credit cards</p>
            </li>
        </ul>


    </div>
    <div class="help-section">  
        <h2>Need Further Assistance?</h2>  
        <p>If you can't find the information you're looking for, feel free to reach out to our support team. You can visit our <a href="connect.php">Contact Us</a> page for further assistance.</p>  
    </div> 
    

    </div>
</div> 
<?php require("footer.php") ?>   
</body>
</html>   