<?php
// Database connection details
$host = "localhost"; // Your database host
$username = "root";  // Your database username
$password = "root";  // Your database password
$database = "yash"; // Your database name

// Establish a MySQL database connection
$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve user input from the form
$full_name = mysqli_real_escape_string($conn, $_POST["full_name"]);
$user_name = mysqli_real_escape_string($conn, $_POST["user_name"]);
$password = $_POST["password"]; // Store the password as plain text
$email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
$phone_number = mysqli_real_escape_string($conn, $_POST["phone_number"]);
$birth_date = $_POST["birth_date"];
$gender = $_POST["gender"];
$street_address = mysqli_real_escape_string($conn, $_POST["street_address"]);
$street_address_2 = mysqli_real_escape_string($conn, $_POST["street_address_2"]);
$country = $_POST["country"];
$city = mysqli_real_escape_string($conn, $_POST["city"]);
$region = mysqli_real_escape_string($conn, $_POST["region"]);
$postal_code = $_POST["postal_code"];

// Perform SQL query to insert data into the database table
$query = $conn->prepare("INSERT INTO users (full_name, user_name, password, email, phone_number, birth_date, gender, street_address, street_address_2, country, city, region, postal_code)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

$query->bind_param("sssssssssssss", $full_name, $user_name, $password, $email, $phone_number, $birth_date, $gender, $street_address, $street_address_2, $country, $city, $region, $postal_code);


















echo "<html>";
echo "<head>";
echo "<style>";
echo "body { font-family: Arial, sans-serif; background-color: #f0f0f0; margin: 0; padding: 0; display: flex; align-items: center; justify-content: center; min-height: 100vh; }";
echo ".container { width: 80%; background-color: #fff; padding: 20px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); border-radius: 5px; transform: scale(0.9); transition: transform 0.5s; }";
echo ".container:hover { transform: scale(1); }";
echo "h1 { font-size: 24px; color: #333; }";
echo "p { font-size: 16px; color: #666; }";
echo ".success { color: #4CAF50; font-size: 20px; }";  // Green color for success
echo ".error { color: #F44336; font-size: 20px; }";    // Red color for error
echo ".emoji { font-size: 30px; margin-right: 10px; }";  // Emoji style
echo "</style>";
echo "</head>";
echo "<body>";

if ($query->execute()) {
    echo "<div class='container'>";
    echo "<p class='success'> Registration successful! </p>";
    echo "</div>";
} else {
    echo "<div class='container'>";
    echo "<p class='error'><span class='emoji'>&#x1F6AB;</span> Error: Registration failed. Please try again later. <span class='emoji'>&#x1F622;</span></p>";
    echo "</div>";
}






$query->close();
$conn->close();
?>
