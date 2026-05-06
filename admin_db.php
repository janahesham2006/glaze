<?php

require 'db.php';

function getAllProducts() {
    global $conn;
    
    $query = "SELECT id, name, description, price, image_url FROM products ORDER BY id";
    $result = mysqli_query($conn, $query);
    $products = array();
    
    while ($row = mysqli_fetch_assoc($result)) {
        $products[] = $row;
    }
    
    return $products;
}

function addProduct($name, $description, $price, $image_url) {
    global $conn;
    
    // INSERT new product into products table
    $query = "INSERT INTO products (name, description, price, image_url) VALUES ('$name', '$description', '$price', '$image_url')";
    
    return mysqli_query($conn, $query);
}

function updateProduct($id, $name, $description, $price, $image_url) {
    global $conn;
    
    // UPDATE product where ID matches
    $query = "UPDATE products SET name = '$name', description = '$description', price = '$price', image_url = '$image_url' WHERE id = '$id'";
    
    return mysqli_query($conn, $query);
}

function deleteProduct($id) {
    global $conn;
    
    // DELETE product where ID matches
    $query = "DELETE FROM products WHERE id = '$id'";
    
    return mysqli_query($conn, $query);
}

function getAllUsers() {
    global $conn;
    
    $query = "SELECT id, name, email, role, created_at FROM users ORDER BY id";
    $result = mysqli_query($conn, $query);
    $users = array();
    
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }
    
    return $users;
}

function deleteUser($id) {
    global $conn;
    
    // DELETE user where ID matches
    $query = "DELETE FROM users WHERE id = '$id'";
    
    return mysqli_query($conn, $query);
}

function getAllOrders() {
    global $conn;
    
    // SELECT orders with user names and product names
    // JOIN users to get user name
    // JOIN products to get product name
    $query = "SELECT 
                o.id, 
                o.user_id, 
                u.name as user_name,
                o.product_id,
                p.name as product_name,
                o.quantity,
                o.status,
                o.created_at
              FROM orders o
              JOIN users u ON o.user_id = u.id
              JOIN products p ON o.product_id = p.id
              ORDER BY o.id DESC";
    
    $result = mysqli_query($conn, $query);
    $orders = array();
    
    while ($row = mysqli_fetch_assoc($result)) {
        $orders[] = $row;
    }
    
    return $orders;
}

function updateOrderStatus($id, $status) {
    global $conn;
    
    // UPDATE order status where ID matches
    $query = "UPDATE orders SET status = '$status' WHERE id = '$id'";    
    return mysqli_query($conn, $query);
}

?>