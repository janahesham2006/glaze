<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GLAZE</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
</head>
<body>
    <!-- HEADER / NAVIGATION -->
        <div class="nav">
            <a href="index_admin.php"><img src="glazeyellow.png" alt=""></a>
        <ul>
            <li>
                <a href="index_admin.php">Dashboard</a>
            </li>
            <li>
                <a href="index.php">View Site</a>
            </li>
            <li>
                <a href="profile.php"><i class="fa-solid fa-circle-user"></i></a>
            </li>
        </ul>
    </div>
    <!-- ADMIN LAYOUT -->
     <div class="navbar">
        <ul>
            <li>
                <h3>Menu</h3>
            </li>
            <li>
                <a href="index_admin.php">Dashboard</a>
            </li>
            <li>
                <a href="manage_products.php">Products</a>
            </li>
            <li>
                <a href="manage_users.php">Users</a>
            </li>
            <li>
                <a href="manage_orders.php">Orders</a>
            </li>
        </ul>
    </div>
    <div class="admin-container">
        <!-- SIDEBAR NAVIGATION -->
</div>
<!-- MAIN CONTENT -->
        <main class="admin-content">
            <h1>Dashboard</h1>
            <p>Welcome to GLAZE, <?php echo htmlspecialchars($_SESSION['name']); ?>!</p>

            <!-- STATISTICS CARDS -->
            <div class="stats-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin: 30px 0;">
                
                <!-- TOTAL USERS CARD -->
                <div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                    <h3 style="color: #e65cbb;">Total Users</h3>
                    <p style="font-size: 32px; color: #e65cbb; font-weight: bold;"><?php echo $total_users; ?></p>
                    <a href="manage_users.php" style="color: #e65cbb; text-decoration: none;">Manage Users <i class="fa-solid fa-circle-arrow-right"></i></a>
                </div>

                <!-- TOTAL PRODUCTS CARD -->
                <div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                    <h3 style="color: #e65cbb;">Total Products</h3>
                    <p style="font-size: 32px; color: #e65cbb; font-weight: bold;"><?php echo $total_products; ?></p>
                    <a href="manage_products.php" style="color: #e65cbb; text-decoration: none;">Manage Products <i class="fa-solid fa-circle-arrow-right"></i></a>
                </div>

                <!-- TOTAL ORDERS CARD -->
                <div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                    <h3 style="color: #e65cbb;">Total Orders</h3>
                    <p style="font-size: 32px; color: #e65cbb; font-weight: bold;"><?php echo $total_orders; ?></p>
                    <a href="manage_orders.php" style="color: #e65cbb; text-decoration: none;">Manage Orders <i class="fa-solid fa-circle-arrow-right"></i></a>
                </div>

            </div>

            <!-- QUICK ACTIONS -->
            <div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); margin: 20px 0;">
                <h2>Quick Actions</h2>
                <p>
                    <a href="manage_products.php" class="btn btn-primary" style="margin-right: 10px;text-decoration: none;">Add Product</a>
                    <a href="manage_users.php" class="btn btn-secondary" style="text-decoration: none;">View Users</a>
                </p>
            </div>
        </main>
    </div>

<script src="script.js"></script>

    <!-- FOOTER -->
<div class="footer-admin">
        <p>All Rights Reserved &copy; 2025</p>
    </div>

</body>
</html>

 <?php
/**
 * WEEK 3 - ADMIN DASHBOARD
 * 
 * This page displays the admin dashboard with summary statistics:
 * - Total number of users
 * - Total number of products
 * - Total number of orders
 * 
 * Guard: Only admins can access. Redirects to login if not admin.
 */

require 'auth.php';
require 'admin_db.php';

// Check if user is admin
// If not, redirect to login page
if (!isAdmin()) {
    header("Location:login.php");
    exit;
}

// Get statistics for the dashboard
$users = getAllUsers();
$products = getAllProducts();
$orders = getAllOrders();

// Count totals
$total_users = count($users);
$total_products = count($products);
$total_orders = count($orders);
?>