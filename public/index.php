<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vehicle Service Management</title>
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/user_scripts.js" defer></script>
</head>
<body>
    <header>
        <h1>Welcome to Vehicle Service Management</h1>
    </header>
    <nav>
        <a href="views/auth/login.php">Login</a>
        <a href="views/auth/register.php">Register</a>
    </nav>
    <div class="container">
        <h2>About Us</h2>
        <img src="images/vehicle_service.png" alt="Vehicle Service" class="main-img">
        <p>We provide top-notch vehicle service management solutions. Our platform allows you to manage your vehicle service bookings with ease.</p>
        <button class="toggle-info" data-target="info1">Toggle Info</button>
        <div id="info1" class="info">Here you can find more details about our services and how we can help you manage your vehicle service bookings efficiently.</div>
        <button class="update-content" data-target="content1">Update Content</button>
        <div id="content1" class="content">This is the original content.</div>
        <h2>Services</h2>
        <ul>
            <li>Service Booking Management</li>
            <li>Parts Management</li>
            <li>User Management</li>
            <li>Responsive Design</li>
        </ul>
        <h2>Contact Us</h2>
        <p>Email: support@vehicleservice.com</p>
        <p>Phone: +1 234 567 890</p>
        <a href="delete_item.php?id=1" class="delete-item">Delete Item</a>
    </div>
    <footer>
        <p>&copy; 2023 Vehicle Service Management. All rights reserved.</p>
    </footer>
</body>
</html>