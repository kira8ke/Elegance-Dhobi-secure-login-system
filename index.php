<?php
session_start();
$action = $_GET['action'] ?? 'login';
$status = $_GET['status'] ?? '';
$error = $_GET['error'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Elegance Dhobi - Login</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <?php if ($action === 'register'): ?>
            <h2>Register</h2>

            <?php if ($error): ?>
                <p class="error-message">
                    <?php
                    switch ($error) {
                        case 'invalid_email': echo "❌ Invalid email format."; break;
                        case 'user_exists': echo "❌ User already exists."; break;
                        case 'sql_error': echo "❌ Database error."; break;
                        case 'insert_fail': echo "❌ Registration failed. Try again."; break;
                    }
                    ?>
                </p>
            <?php endif; ?>

            <form action="register.php" method="POST">
                <input type="text" name="username" required placeholder="Username">
                <input type="email" name="email" required placeholder="Email">
                <input type="password" name="password" required placeholder="Password">
                <button type="submit">Register</button>
            </form>
            <p>Already have an account? <a href="index.php?action=login">Login</a></p>

        <?php else: ?>
            <h2>Login</h2>

            <?php if ($status === 'registered'): ?>
                <p class="success-message">✅ Registration successful! Please log in.</p>
            <?php endif; ?>

            <form action="login.php" method="POST">
                <input type="email" name="email" required placeholder="Email">
                <input type="password" name="password" required placeholder="Password">
                <button type="submit">Login</button>
            </form>
            <p>Don't have an account? <a href="index.php?action=register">Register</a></p>
        <?php endif; ?>
    </div>
</body>
</html>
