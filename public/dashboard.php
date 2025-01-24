<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Public Dashboard - Vehicle Service Management</title>
    <link rel="stylesheet" href="css/styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 15px 0;
            text-align: center;
        }
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .card {
            display: inline-block;
            width: 30%;
            padding: 20px;
            margin: 1%;
            background-color: #f4f4f4;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            text-align: center;
            transition: transform 0.2s;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .card h3 {
            margin-top: 0;
        }
        .card p {
            color: #555;
        }
        button {
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.2s;
        }
        button:hover {
            background-color: #555;
        }
        nav {
            background-color: #333;
            overflow: hidden;
        }
        nav a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }
        nav a:hover {
            background-color: #ddd;
            color: black;
        }
        /* Responsive design */
        @media (max-width: 768px) {
            .card {
                width: 100%;
                margin-bottom: 20px;
            }
            nav a {
                float: none;
                width: 100%;
                text-align: left;
                padding-left: 20px;
            }
        }
        @media (max-width: 480px) {
            .card {
                padding: 10px;
                margin: 10px 0;
            }
            button {
                width: 100%;
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Public Dashboard</h1>
    </header>
    <nav>
        <a href="index.php">Home</a>
        <a href="services.php">Services</a>
        <a href="about.php">About Us</a>
        <a href="contact.php">Contact</a>
    </nav>
    <div class="container">
        <div class="card">
            <h3>Our Services</h3>
            <p>Learn more about the services we offer.</p>
            <button onclick="window.location.href='services.php'">View Services</button>
        </div>
        <div class="card">
            <h3>Book a Service</h3>
            <p>Schedule an appointment for your vehicle.</p>
            <button onclick="window.location.href='book_service.php'">Book Now</button>
        </div>
        <div class="card">
            <h3>Customer Reviews</h3>
            <p>Read what our customers have to say about us.</p>
            <button onclick="window.location.href='reviews.php'">Read Reviews</button>
        </div>
        <!-- Add more cards as needed -->
    </div>
</body>
</html>
