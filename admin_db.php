<?php

require 'db.php';

function getAllProducts() {
    global $conn;
    
    $query = "SELECT `Product_ID`, `Product_Name`, `Key_Ingredients`, `price`, `image_url` FROM `Product` ORDER BY `Product_ID`";
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
    $query = "INSERT INTO `Product` (`Product_Name`, `Key_Ingredients`, `price`, `image_url`) VALUES ('$name', '$description', '$price', '$image_url')";
    
    return mysqli_query($conn, $query);
}

function updateProduct($id, $name, $description, $price, $image_url) {
    global $conn;
    
    // UPDATE product where ID matches
    $query = "UPDATE `Product` SET `Product_Name` = '$name', `Key_Ingredients` = '$description', `price` = '$price', `image_url` = '$image_url' WHERE `Product_ID` = '$id'";
    
    return mysqli_query($conn, $query);
}

function deleteProduct($id) {
    global $conn;
    
    // DELETE product where ID matches
    $query = "DELETE FROM `Product` WHERE `Product_ID` = '$id'";
    
    return mysqli_query($conn, $query);
}

function getAllUsers() {
    global $conn;
    
    $query = "SELECT `Customer_ID`, `Name`, `Email`, `password`, `role` FROM `Customer` ORDER BY `Customer_ID`";
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
    $query = "DELETE FROM `Customer` WHERE `Customer_ID` = '$id'";
    
    return mysqli_query($conn, $query);
}

function getAllOrders() {
    global $conn;
    
    // SELECT orders with user names and product names
    // JOIN users to get user name
    // JOIN products to get product name
    $query = "SELECT 
                c_o.`Order_ID`, 
                c_o.`Customer_ID`, 
                c_o.`Name` as user_name,
                o.`Product_ID`,
                p.`Product_Name` as product_name,
                o.`Quantity`,
                c_o.`Status`
              FROM `Customer_order` c_o
              JOIN `Customer` c ON c_o.`Customer_ID` = c.`Customer_ID`
              JOIN `Product` p ON c_o.`Product_ID` = p.`Product_ID`
              ORDER BY c_o.`Order_ID` DESC";
    
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
    $query = "UPDATE `Customer_order` SET `Status` = '$status' WHERE `Order_ID` = '$id'";    
    return mysqli_query($conn, $query);
}

?>