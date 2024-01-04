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

$host = "localhost"; // Your database host
$username = "root";  // Your database username
$password = "root";  // Your database password
$database = "yash"; // Your database name

// Establish a MySQL database connection
$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the user data modification form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve updated user data from the form
    $full_name = mysqli_real_escape_string($conn, $_POST["full_name"]);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $phone_number = mysqli_real_escape_string($conn, $_POST["phone_number"]);
    $username = $_POST["username"]; // Add this line

    // Update user data in the database
    $update_query = "UPDATE users SET full_name=?, email=?, phone_number=? WHERE user_name=?";
    $stmt = $conn->prepare($update_query);
    $stmt->bind_param("ssss", $full_name, $email, $phone_number, $username);

    if ($stmt->execute()) {
        echo "User data updated successfully!";
    } else {
        echo "Error: User data update failed. Please try again later.";
    }

    $stmt->close();
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Modify User Data</title>

    <style>
        /* Previous styles */
        body {
            font-family: JetBrains Mono, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        .container {
            width: 80%;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            transform: scale(0.9);
            transition: transform 0.5s;
        }
        .container:hover {
            transform: scale(1);
        }
        h1 {
            font-size: 24px;
            color: #333;
        }
        p {
            font-size: 16px;
            color: #666;
        }
        .success {
            color: #4CAF50;
            font-size: 20px;
        }
        .error {
            color: #F44336;
            font-size: 20px;
        }
        /* Additional styles for the form layout */
        .form-container {
            padding: 20px;
        }
        .form-label {
            font-weight: bold;
            display: block;
        }
        .form-input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
        }
        .form-submit {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Modify User Data</h1>
        <div class="form-container">
            <form method="POST" action="">
                <label class="form-label" for="full_name">Full Name:</label>
                <input class="form-input" type="text" id="full_name" name="full_name" required>
                
                <label class="form-label" for="email">Email:</label>
                <input class="form-input" type="email" id="email" name="email" required>
                
                <label class "form-label" for="phone_number">Phone Number:</label>
                <input class="form-input" type="text" id="phone_number" name="phone_number" required>
                
                <label class="form-label" for="username">Username:</label>
                <input class="form-input" type="text" id="username" name="username" required>
                <!-- Add more input fields as needed -->

                <input class="form-submit" type="submit" value="Update">
            </form>
        </div>
    </div>
</body>
</html>
