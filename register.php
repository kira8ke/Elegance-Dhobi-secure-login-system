<?php
session_start();
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate inputs
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $username = htmlspecialchars(trim($_POST["username"]));
    $password = $_POST["password"];

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format.");
    }

    // Validate password strength
    if (strlen($password) < 6) {
        die("Password must be at least 6 characters long.");
    }

    // Check if user already exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        die("Email is already registered. <a href='login.php'>Login here</a>");
    }
    $stmt->close();

    // Hash password securely
    $password_hash = password_hash($password, PASSWORD_BCRYPT);

    // Insert user into the database
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $password_hash);

    if ($stmt->execute()) {
        echo "Registration successful! <a href='login.php'>Login here</a>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register - Elegance Dhobi</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
    <h2>Register</h2>
    <form method="POST">
        <input type="text" name="username" required placeholder="Username">
        <input type="email" name="email" required placeholder="Email">
        <input type="password" name="password" required placeholder="Password">
        <button type="submit">Register</button>
    </form>
</body>
</html>
