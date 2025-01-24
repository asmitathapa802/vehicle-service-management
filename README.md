# Vehicle Service Management

## Introduction
The Vehicle Service Management (VSM) system is a digital platform designed to simplify and automate the process of vehicle maintenance. It enables vehicle owners to book services online, track their service status, and access service history. For service providers, it streamlines appointment scheduling, inventory management, and customer feedback. By enhancing efficiency and reducing errors, the system improves customer satisfaction and ensures timely vehicle maintenance.

## Table of Contents
- [Introduction](#introduction)
- [Features](#features)
- [Technologies Used](#technologies-used)
- [Installation](#installation)
- [Usage](#usage)
- [Project Structure](#project-structure)
- [Contributing](#contributing)
- [License](#license)

## Features
- **User Authentication**: Secure user registration and login.
- **Service Booking**: Online service booking with available time slots.
- **Service Tracking**: Real-time updates on service status.
- **Service History**: Detailed history of all services performed on each vehicle.
- **Inventory Management**: Manage and track inventory levels of parts and materials.
- **Automated Reminders**: Automatic notifications and reminders for upcoming services.

## Technologies Used
- **Frontend**: HTML, CSS, JavaScript
- **Backend**: PHP, MySQL
- **Hosting**: GitHub

## Installation
1. **Clone the Repository**:
    ```bash
    git clone https://github.com/yourusername/vehicle-service-management.git
    ```
2. **Navigate to the Project Directory**:
    ```bash
    cd vehicle-service-management
    ```
3. **Set Up Database**:
    - Import the provided SQL file (`vehicle_service_management.sql`) into your MySQL database.
    - Update the `db_config.php` file with your database credentials.

4. **Start the Server**:
    - Ensure you have a local server running (e.g., XAMPP, WAMP, MAMP).
    - Place the project folder in the server's root directory.

## Usage
1. **Admin Login**:
    - URL: `http://localhost/vehicle-service-management/admin/admin_login.php`
    - Use the admin credentials to log in.

2. **User Login**:
    - URL: `http://localhost/vehicle-service-management/public/login.php`
    - Use the user credentials to log in.

3. **Manage Parts** (Admin Only):
    - After logging in as an admin, navigate to the manage parts section to add, update, or delete motorbike parts.

4. **View Parts** (User):
    - After logging in as a user, navigate to the dashboard to view available motorbike parts.

## Project Structure