<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vehicle Service Management</title>
  <style>
    /* Basic Reset */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .container {
      text-align: center;
      background: #fff;
      padding: 2rem;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
      margin-bottom: 1rem;
      font-size: 2rem;
      color: #333;
    }

    .buttons {
      display: flex;
      justify-content: center;
      gap: 1rem;
    }

    .btn {
      padding: 0.75rem 1.5rem;
      background: #007bff;
      color: #fff;
      text-decoration: none;
      border-radius: 4px;
      transition: background 0.3s ease;
    }

    .btn:hover {
      background: #0056b3;
    }
    footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 1px 0;
            position: fixed;
            width: 100%;
            bottom: 0;
            flex-shrink:0;
        }
        .contact-info {
    background: #f4f4f4;
    border-radius: 5px;
    padding: 20px;
    margin: 20px auto; 
    width: 80%; 
    position: fixed; 
    bottom: 0px; 
    left: 80%; 
    transform: translateX(-50%); 
}
  </style>
</head>
<body>
  <div class="container">
    <h1>Welcome to Vehicle Service Management</h1>
    <p>Please select an option below:</p>
    <div class="buttons">
      <a href="admin/index.php" class="btn">Admin Panel</a>
      <a href="public/index.php" class="btn">User Panel</a>
    </div>
  </div>
  <div class="contact-info">
    <h2>Contact Information</h2>
    <p>Email: asmitathapa@gmail.com</p>
    <p>Phone: +977 9876543210</p>
    <p>Address: Damak-8, Jhapa, Nepal</p>
</div>
    <footer>
        <p>&copy; 2025 Vehicle Service Management. All rights reserved.</p>
    </footer>
</body>
</html>