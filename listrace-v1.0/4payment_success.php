<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Success</title>
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
            background-color: #4CAF50;
            color: #fff;
        }

        p {
            text-align: center;
            font-size: 18px;
            margin: 20px 0;
        }

        .payment-details {
            background-color: #fff;
            border: 1px solid #ccc;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
        }

        a {
            text-decoration: none;
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border-radius: 4px;
            display: inline-block;
            margin-top: 20px;
        }

        a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Payment Successful</h1>
    <div class="payment-details">
        <p>Thank you for your payment. Below are the payment details:</p>

        <?php
        session_start();

        if (isset($_SESSION['payment_details'])) {
            $paymentDetails = $_SESSION['payment_details'];
            echo "<p>Amount: $" . htmlspecialchars($paymentDetails['amount']) . "</p>";
            echo "<p>Card Number: **** **** **** " . substr($paymentDetails['card_number'], -4) . "</p>";
            // Add more payment details as needed
        } else {
            echo "<p>No payment details found.</p>";
        }
        ?>

        <p><a href="4index.php">Back to Home</a></p>
    </div>
</body>
</html>
