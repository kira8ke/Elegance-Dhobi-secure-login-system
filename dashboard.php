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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Elegance Dhobi</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

    <!-- Navigation Bar -->
    <nav>
        <ul>
            <li><a href="#about" class="nav-link">About Us</a></li>
            <li><a href="#services" class="nav-link">Services</a></li>
            <li><a href="#team" class="nav-link">Our Team</a></li>
            <li><a href="#pricing" class="nav-link">Pricing</a></li>
            <li><a href="#contact" class="nav-link">Contact</a></li>
            <li><a href="#location" class="nav-link">Location</a></li>
        </ul>
    </nav>

    <!-- Header -->
    <header>
        <h1>Welcome to Elegance Dhobi</h1>
        <p>Your number one laundry business</p>
    </header>

    <!-- Dashboard Sections -->
    <section id="about" class="section">
        <h2>About Us</h2>
        <p>Elegance Dhobi is committed to providing high-quality laundry services with convenience and efficiency.</p>
    </section>

    <section id="services" class="section">
        <h2>Our Services</h2>
        <ul>
            <li>Dry Cleaning</li>
            <li>Ironing</li>
            <li>Pickup & Delivery</li>
            <li>Special Fabric Care</li>
        </ul>
    </section>

    <section id="team" class="section">
        <h2>Meet Our Team</h2>
        <p>Our team of professional cleaners is dedicated to making your clothes look brand new.</p>
    </section>

    <section id="pricing" class="section">
        <h2>Pricing</h2>
        <p>We offer competitive pricing for all our laundry services. Contact us for more details.</p>
    </section>

    <section id="contact" class="section">
        <h2>Contact Us</h2>
        <p>Email: info@elegancedhobi.com</p>
        <p>Phone: +254 700 123456</p>
    </section>

    <section id="location" class="section">
        <h2>Our Location</h2>
        <p>We are located in Nairobi, Kenya. Visit us for the best laundry services.</p>
    </section>

    <footer>
        <p>&copy; 2025 Elegance Dhobi</p>
    </footer>

</body>
</html>
