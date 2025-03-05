<?php
session_start();
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    $stmt = $conn->prepare("SELECT id, password_hash FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    
    if ($result && password_verify($password, $result['password_hash'])) {
        $_SESSION['user_id'] = $result['id'];
        setcookie("auth", session_id(), time() + 3600, "", "", true, true);
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Invalid login credentials";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - Elegance Dhobi</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
    <form method="POST">
        <input type="email" name="email" required placeholder="Email">
        <input type="password" name="password" required placeholder="Password">
        <button type="submit">Login</button>
    </form>
</body>
</html>
