<?php

require ('db_connect.php');

if(isset($_GET['package_id'])){
    $package_id = $_GET['package_id'];
    $package = search("SELECT * FROM packages WHERE id = $package_id");
    if($package){
        $package = $package->fetch_assoc();
        if($_SERVER["REQUEST_METHOD"] =="POST"){
            $email = $_POST['email'];
            $event_date = $_POST['event_date'];
            $card_number = $_POST['card_number'];
            $card_holder_name = $_POST['card_holder_name'];
            $expiry_date = $_POST['expiry_date'];
            $cvv = $_POST['cvv'];
        
            $result = search(q: "SELECT * FROM users WHERE email = '$email'");
            if ($result && $result->num_rows === 1) {
                $user = $result->fetch_assoc();
                $user_id = $user['id'];
                if($card_number && $card_holder_name && $expiry_date && $cvv){
                    $payment_status= TRUE;
                    $status= 'accepted';
                }else{
                    $payment_status= FALSE;
                    $status= 'rejected';
                    $error='Payment error';
        
                }
                
                 iud("INSERT INTO orders (user_id, package_id, event_date, payment_status, status) VALUES ('$user_id','$package_id', '$event_date', '$payment_status','$status')");
            }else{
                $error = "User not found";
            }
        }
    }else{
        $error = "Package not found";
    }

}else{
    $error="Package not Selected";
}





?>

<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">

</head>
<body>
<div class="payment-cont">
        <div class="payment">
            <h2>Order Package</h2>
            <?php if (isset($error)): ?>
                <p class="error"><?php echo htmlspecialchars($error); ?></p>
            <?php endif; ?>
            <form action="order.php?package_id=<?php echo $package_id; ?>" method="post">
                <label for="email">Email:</label>
                <input type="text" id="email" class="form-control" name="email" required>

                <label for="event_date">Event Date:</label>
                <input type="date" class="form-control" id="event_date" name="event_date" required>
                <h3>Payment</h3>
                <label for="card_number">Card Number:</label>
                <input type="text" id="card_number" class="form-control" name="card_number" required>

                <label for="card_holder_name">Cardholder Name:</label>
                <input type="text" id="card_holder_name" class="form-control" name="card_holder_name" required>

                <label for="expiry_date">Expiry Date:</label>
                <input type="text" id="expiry_date" class="form-control" name="expiry_date" required>
                
                <label for="cvv">CVV:</label>
                <input type="text" id="cvv" class="form-control" name="cvv" required>


                <button class="btn" type="submit">Schedule</button>
                <!-- <div class="btn" id="aBtn"><a href="admin_login.php">ADMIN LOGIN PANNEL</a> </div> -->
            </form>
        </div>
    </div>
    
    
</body>
</html>