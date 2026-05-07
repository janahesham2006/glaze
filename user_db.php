<?php

require 'db.php';

function getUserById($id) {
    global $conn;
    
    // SELECT user information WHERE id matches
    $query = "SELECT `Customer_ID`, `Name`, `Email`, `password`, `role` FROM `Customer` WHERE `Customer_ID` = '$id' LIMIT 1";
    
    // Execute the query
    $result = mysqli_query($conn, $query);
    
    // Check if user was found
    if (mysqli_num_rows($result) === 0) {
        return null;
    }
    
    // Return user data as associative array
    return mysqli_fetch_assoc($result);
}

function updateUser($id, $name, $email, $password = '') {
    global $conn;
    
    // Build the UPDATE query

    
    // Start with name and email in the UPDATE query
    $query = "UPDATE `Customer` SET `Name` = '$name', `Email` = '$email'";
    
    // Only update password if a new password was provided
    if (!empty($password)) {
        $query .= ", `password`= '$password'";
    }
    
    // Complete the query with WHERE clause
    $query .= " WHERE `Customer_ID` = '$id'";
    
    // Execute the update query
    if (mysqli_query($conn, $query)) {
        return true;
    }
    
    return false;
}

?>