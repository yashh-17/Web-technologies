<?php
// Start a new session or resume the existing one
session_start();

// Check if the session has already expired
if (isset($_SESSION['timeout']) && time() > $_SESSION['timeout']) {
    session_unset(); // Destroy the session data
    session_destroy();
    header("Location: expired.php"); // Redirect to an expired page
    exit();
}

// Set the session timeout to 10 minutes from now
$_SESSION['timeout'] = time() + 600;

// Check if the payment form has been submitted
if (isset($_POST['submit_payment'])) {
    // Here, you would typically integrate with a payment gateway (e.g., Stripe, PayPal) to process the payment.
    // For simplicity, we'll simulate a successful payment.
    
    // ... Perform payment processing here ...
    
    // Payment successful, store payment details in the session
    $_SESSION['payment_details'] = [
        'amount' => $_POST['amount'],
        'card_number' => $_POST['card_number'],
        // Add more payment details as needed
    ];

    header("Location: 4payment_success.php"); // Redirect to a success page
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Page</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            padding: 20px;
            background-color: #333;
            color: #fff;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <h1>Payment Page</h1>
    <form method="post">
        <label for="amount">Amount:</label>
        <input type="text" name="amount" id="amount" required><br>
        
        <label for="card_number">Card Number:</label>
        <input type="text" name="card_number" id="card_number" required><br>
        
        <!-- Add more payment fields as needed (e.g., expiration date, CVV) -->

        <input type="submit" name="submit_payment" value="Submit Payment">
    </form>
</body>
</html>
