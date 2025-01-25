-- Create database
CREATE DATABASE IF NOT EXISTS asmitadb;
USE asmitadb;

-- Create admins table
CREATE TABLE IF NOT EXISTS admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert sample admin with plain text password
INSERT INTO admins (username, password) VALUES ('admin', 'admin123');

-- Create users table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert sample users with plain text passwords
INSERT INTO users (username, password, email) VALUES ('Asmita', 'asmita123', 'asmita@gmail.com');
INSERT INTO users (username, password, email) VALUES ('Jamuna', 'jamuna123', 'jamuna@gmail.com');

-- Create parts table
CREATE TABLE IF NOT EXISTS parts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    part_name VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert sample parts
INSERT INTO parts (part_name, description, price) VALUES ('Brake Pad', 'High-quality brake pad', 50);
INSERT INTO parts (part_name, description, price) VALUES ('Oil Filter', 'Durable oil filter', 100);
INSERT INTO parts (part_name, description, price) VALUES ('Air Filter', 'Efficient air filter', 150);

-- Create service_bookings table
CREATE TABLE IF NOT EXISTS service_bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    vehicle VARCHAR(100) NOT NULL,
    status VARCHAR(50) DEFAULT 'Pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Insert sample service bookings
INSERT INTO service_bookings (user_id, vehicle, status) VALUES (1, 'Toyota', 'Pending');
INSERT INTO service_bookings (user_id, vehicle, status) VALUES (2, 'Honda', 'Completed');