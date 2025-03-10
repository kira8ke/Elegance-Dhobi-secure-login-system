<?php
// Start the session
session_start();

// Include the database configuration file
require 'config.php';

// Check if the form was submitted using the POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize user inputs
    $username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    
    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
    }

    // Retrieve password from the form
    $password = $_POST["password"];

    // Hash the password before storing it
    $password_hash = password_hash($password, PASSWORD_BCRYPT);

    // Prepare an SQL statement to insert the new user
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    
    // Bind the values
    $stmt->bind_param("sss", $username, $email, $password_hash);

    // Execute the query
    if ($stmt->execute()) {
        echo "Registration successful! <a href='login.php'>Login</a>";
    } else {
        echo "Error: Could not register user.";
    }

    // Close the statement
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Elegance Dhobi</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h2>Register</h2>

        <!-- Registration Form -->
        <form method="POST">
            <!-- Username Input Field -->
            <input type="text" name="username" required placeholder="Username">

            <!-- Email Input Field -->
            <input type="email" name="email" required placeholder="Email">

            <!-- Password Input Field -->
            <input type="password" name="password" required placeholder="Password">

            <!-- Register Button -->
            <button type="submit">Register</button>
        </form>

        <!-- Link to Login Page -->
        <p>Already have an account? <a href="login.php">Login</a></p>
    </div>
</body>
</html>
