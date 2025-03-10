<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard - Elegance Dhobi</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Welcome to Elegance Dhobi</h1>
        <p>Your number one laundry business</p>
    </header>

    <section id="about">
        <h2>About Us</h2>
        <p>Elegance Dhobi is committed to providing high-quality laundry services with convenience and efficiency.</p>
    </section>

    <section id="services">
        <h2>Our Services</h2>
        <ul>
            <li>Dry Cleaning</li>
            <li>Ironing</li>
            <li>Pickup & Delivery</li>
            <li>Special Fabric Care</li>
        </ul>
    </section>

    <section id="team">
        <h2>Meet Our Team</h2>
        <p>Our team of professional cleaners is dedicated to making your clothes look brand new.</p>
    </section>

    <section id="pricing">
        <h2>Pricing</h2>
        <p>We offer competitive pricing for all our laundry services. Contact us for more details.</p>
    </section>

    <section id="contact">
        <h2>Contact Us</h2>
        <p>Email: info@elegancedhobi.com</p>
        <p>Phone: +254 700 123456</p>
    </section>

    <section id="location">
        <h2>Our Location</h2>
        <p>We are located in Nairobi, Kenya. Visit us for the best laundry services.</p>
    </section>

    <footer>
        <p>&copy; 2025 Elegance Dhobi</p>
    </footer>
</body>
</html>
