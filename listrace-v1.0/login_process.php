<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_name = $_POST["username"];
    $password = $_POST["password"];
    $host = "localhost"; // Your database host
    $dusername = "root";  // Your database username
    $dpassword = "root";  // Your database password
    $database = "yash"; // Your database name
    
    // Establish a MySQL database connection
    $conn = new mysqli($host, $dusername, $dpassword, $database);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // Check if the provided username and password match records in the database
    $sql = "SELECT * FROM users WHERE user_name='$user_name' AND password='$password'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // User found in the database, fetch and display user data
        $user = $result->fetch_assoc();
        
        echo "<html>";
        echo "<head>";
        echo "<style>";
        echo "body { font-family: Arial, sans-serif; background-color: #f0f0f0; margin: 0; padding: 0; display: flex; align-items: center; justify-content: center; min-height: 100vh; }";
        echo ".container { width: 80%; background-color: #fff; padding: 20px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); border-radius: 5px; transform: scale(0.9); transition: transform 0.5s; }";
        echo ".container:hover { transform: scale(1); }";
        echo "h1 { font-size: 24px; color: #333; }";
        echo "p { font-size: 16px; color: #666; }";
        echo "</style>";
        echo "</head>";
        echo "<body>";
        echo "<div class='container'>";
        echo "<h1>Login successful! Welcome, " . $user_name . "!</h1>";
        echo "<div class='user-data'>";
        echo "<p><strong>Full Name:</strong> " . $user["full_name"] . "</p>";
        echo "<p><strong>Email:</strong> " . $user["email"] . "</p>";
        echo "<p><strong>Phone Number:</strong> " . $user["phone_number"] . "</p>";
        // Add more fields as needed
        echo "</div>";
        
        // Include a link to modify user data
        echo "<a href='modifyuserdata.php'>Modify User Data</a>";
        
        echo "</div>";
        echo "</body>";
        echo "</html>";
        
    } else {
        // User not found, redirect to home page
        header("Location: indexre.html");
        exit();
    }
    $conn->close();
}
?>
