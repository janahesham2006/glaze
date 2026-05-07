-- WEEK 1 - DATABASE SCHEMA
-- This SQL file creates the complete database structure for the demo project
-- Run this file in phpMyAdmin to set up the database

-- Create the database if it doesn't exist
CREATE DATABASE IF NOT EXISTS GLAZE;
USE GLAZE;

-- ===== USERS TABLE =====
-- Stores all user account information
CREATE TABLE IF NOT EXISTS Customer (
    Customer_ID INT PRIMARY KEY AUTO_INCREMENT,
    Name VARCHAR(255) NOT NULL,
    Email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('Admin', 'Customer') DEFAULT 'user'
);

-- ===== PRODUCTS TABLE =====
-- Stores product/service information
CREATE TABLE IF NOT EXISTS Product (
    Product_ID INT PRIMARY KEY AUTO_INCREMENT,
    Product_Name VARCHAR(255) NOT NULL,
    Key_Ingredients VARCHAR(255) NOT NULL,
    price VARCHAR(255) NOT NULL,
    image_url VARCHAR(255)
);

-- ===== ORDERS TABLE =====
-- Stores customer orders
CREATE TABLE IF NOT EXISTS Customer_order (
    Order_ID INT PRIMARY KEY AUTO_INCREMENT,
    Customer_ID INT NOT NULL,
    Product_ID INT NOT NULL,
    Quantity INT NOT NULL DEFAULT 1,
    Status ENUM('Pending', 'Paid', 'Shipped','Delivered'),
    FOREIGN KEY (Customer_ID) REFERENCES Customer(Customer_ID),
    FOREIGN KEY (Product_ID) REFERENCES Product(Product_ID)
);

-- ===== SAMPLE DATA =====

-- Insert admin user (password: admin123)
INSERT INTO Customer (`Name`, `Email`, `password`, `role`) VALUES
('Admin', 'admin@demo.com', 'admin123', 'admin');

-- Insert regular user (password: user123)
INSERT INTO Customer (`Name`, `Email`, `password`, `role`) VALUES
('John Doe', 'john@demo.com', 'user123', 'user');

-- Insert sample products
INSERT INTO Product (`Product_Name`, `Key_Ingredients`, `price`, `image_url`) VALUES
('Web Design Package', 'A full professional website design service', 299.00, 'images/web-design.jpg'),
('SEO Optimization', 'Boost your search engine rankings', 149.00, 'images/seo.jpg'),
('Logo Design', 'Custom logo design for your brand', 99.00, 'images/logo.jpg');

-- Insert sample orders
INSERT INTO Customer_order (Customer_ID, Product_ID, Quantity, Status) VALUES
(2, 1, 1, 'Delivered'),
(2, 2, 1, 'pending');