<?php
// Start the session
session_start();

// Include the database configuration file
require 'config.php';

// Check if the form was submitted using the POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate email input
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format"); // Stop execution if email format is incorrect
    }

    // Retrieve the password from the form
    $password = $_POST["password"];

    // Hash the password before storing it in the database
    $password_hash = password_hash($password, PASSWORD_BCRYPT);

    // Prepare an SQL statement to insert the new user into the database
    $stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");

    // Bind the user input values to the SQL statement
    $stmt->bind_param("ss", $email, $password_hash);

    // Execute the query
    if ($stmt->execute()) {
        echo "Registration successful! <a href='login.php'>Login</a>"; // Redirect to login after registration
    } else {
        echo "Error: Could not register user."; // Display error message if query fails
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
    <link rel="stylesheet" type="text/css" href="css/styles.css"> <!-- Link to external CSS -->
</head>
<body>
    <div class="container">
        <h2>Register</h2>

        <!-- Registration Form -->
        <form method="POST">
        
            <input type="email" name="email" required placeholder="Email">
            <input type="password" name="password" required placeholder="Password">
            <button type="submit">Register</button>
        </form>

        



