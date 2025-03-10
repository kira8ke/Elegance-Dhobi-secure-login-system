<?php
// Start session
session_start();

// Include the database configuration file
require 'config.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize inputs
    $username = trim($_POST["username"]);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $password = $_POST["password"];

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format.");
    }

    // Check if username or email already exists
    $check_stmt = $conn->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
    $check_stmt->bind_param("ss", $username, $email);
    $check_stmt->execute();
    $check_stmt->store_result();

    if ($check_stmt->num_rows > 0) {
        // User already exists
        echo "User already registered. Please <a href='login.php'>login</a>.";
        $check_stmt->close();
    } else {
        $check_stmt->close();

        // Hash password before storing it
        $password_hash = password_hash($password, PASSWORD_BCRYPT);

        // Prepare an SQL statement to insert the new user
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");

        if ($stmt === false) {
            die("Error in SQL query preparation: " . $conn->error);
        }

        // Bind values to the statement
        $stmt->bind_param("sss", $username, $email, $password_hash);

        // Execute the query
        if ($stmt->execute()) {
            echo "Registration successful! <a href='login.php'>Login</a>";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    }
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
            <input type="text" name="username" required placeholder="Username">
            <input type="email" name="email" required placeholder="Email">
            <input type="password" name="password" required placeholder="Password">
            <button type="submit">Register</button>
        </form>

        <p>Already have an account? <a href="login.php">Login</a></p>
    </div>
</body>
</html>
