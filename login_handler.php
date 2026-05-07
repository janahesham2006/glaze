<?php
require 'auth.php';

// Check if form was submitted via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get email and password from form
    $email = $_POST['email'] ?? '';
    $password = $_POST['psw'] ?? '';
    
    // Try to login
    if (loginUser($email, $password)) {
        // Login successful! Check if user is admin
        if (isAdmin()) {
            // Redirect admin to admin dashboard
            header("Location: index_admin.php");
        } else {
            // Redirect regular user to products page
            header("Location: product.php");
        }
        exit;
    } else {
        // Login failed - redirect back to login page with error
        $_SESSION['login_error'] = "Invalid email or password";
        header("Location: login.php");
        exit;
    }
}

// If no POST data, redirect to login page
header("Location: login.php");
exit;
?>
