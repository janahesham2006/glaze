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

        <!-- MAIN CONTENT -->
        <main class="admin-content">
            <h1>Order Management</h1>

            <!-- SUCCESS/ERROR MESSAGES -->
            <?php if ($success): ?>
                <div class="success-message"><?php echo htmlspecialchars($success); ?></div>
            <?php endif; ?>
            <?php if ($error): ?>
                <div class="error-message"><?php echo htmlspecialchars($error); ?></div>
            <?php endif; ?>

            <!-- ORDERS TABLE -->
            <div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                <h2>All Orders</h2>

                <?php if (empty($orders)): ?>
                    <p>No orders found.</p>
                <?php else: ?>
                    <table>
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($orders as $order): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($order['id']); ?></td>
                                    <td><?php echo htmlspecialchars($order['user_name']); ?></td>
                                    <td><?php echo htmlspecialchars($order['product_name']); ?></td>
                                    <td><?php echo htmlspecialchars($order['quantity']); ?></td>
                                    <td>
                                        <span style="padding: 4px 8px; background-color: <?php 
                                            echo $order['status'] === 'completed' ? '#27ae60' : ($order['status'] === 'pending' ? '#f39c12' : '#e74c3c');
                                        ?>; color: white; border-radius: 4px;">
                                            <?php echo ucfirst(htmlspecialchars($order['status'])); ?>
                                        </span>
                                    </td>
                                    <td><?php echo htmlspecialchars(date('M d, Y', strtotime($order['created_at']))); ?></td>
                                    <td>
                                        <form method="POST" style="display: inline;">
                                            <input type="hidden" name="order_id" value="<?php echo htmlspecialchars($order['id']); ?>">
                                            <select name="status" style="padding: 6px; border-radius: 4px; border: 1px solid #ddd;">
                                                <option value="pending" <?php echo $order['status'] === 'pending' ? 'selected' : ''; ?>>Pending</option>
                                                <option value="completed" <?php echo $order['status'] === 'completed' ? 'selected' : ''; ?>>Completed</option>
                                                <option value="cancelled" <?php echo $order['status'] === 'cancelled' ? 'selected' : ''; ?>>Cancelled</option>
                                            </select>
                                            <button type="submit" class="btn btn-primary" style="padding: 6px 12px; font-size: 14px;">Update</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </main>
    </div>

    <!-- FOOTER -->
<div class="footer-admin">
        <p>All Rights Reserved &copy; 2025</p>
    </div>

</body>
</html>

<?php
require 'auth.php';
require 'admin_db.php';

// Check if user is admin
if (!isAdmin()) {
    header("Location:login.php");
    exit;
}

// Initialize variables
$error = '';
$success = '';

// Get all orders
$orders = getAllOrders();

// Handle UPDATE order status
if (isset($_POST['order_id']) && isset($_POST['status'])) {
    $order_id = $_POST['order_id'];
    $status = $_POST['status'];
    
    if (updateOrderStatus($order_id, $status)) {
        $success = "Order status updated successfully!";
        $orders = getAllOrders(); // Refresh the list
    } else {
        $error = "Failed to update order status";
    }
}
?>
