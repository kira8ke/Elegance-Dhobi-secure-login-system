<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head><title>Dashboard - Elegance Dhobi</title></head>
<body>
    <h2>Welcome to Elegance Dhobi</h2>
    <a href="logout.php">Logout</a>
</body>
</html>
