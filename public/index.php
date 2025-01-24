<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vehicle Service Management - Home</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Vehicle Service Management</h1>
    </header>
    <nav>
        <a href="#home">Home</a>
        <a href="#services">Services</a>
        <a href="#about">About Us</a>
        <a href="#contact">Contact</a>
    </nav>
    <div class="container" id="home">
        <h2>Welcome to Vehicle Service Management</h2>
        <p>Your one-stop solution for all vehicle maintenance needs. Explore our services and get the best care for your vehicle.</p>
        <button class="toggle-info" data-target="more-info">Learn More</button>
        <div class="info-section" id="more-info">
            <p>We offer a wide range of services including maintenance, repair, and more...</p>
        </div>
    </div>
    <div class="container" id="services">
        <!-- Services content -->
    </div>
    <div class="container" id="about">
        <!-- About content -->
    </div>
    <div class="container" id="contact">
        <form id="contactForm">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <button type="submit">Submit</button>
        </form>
    </div>
    <script src="js/script.js"></script>
</body>
</html>
