-- Create the database
CREATE DATABASE IF NOT EXISTS login_system;

-- Use the newly created database
USE login_system;

-- Create the users table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'user') NOT NULL DEFAULT 'user'
);

-- Insert the default admin account
INSERT INTO users (username, password, role) 
VALUES ('Admin123', '$2y$10$/nnd9T.L/PCtsrYSobIfieShX2wPi1XLgRVUWH3y.lxbo.8XlLW4K', 'admin');
