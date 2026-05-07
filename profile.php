    <!DOCTYPE html>
<html lang="en">
<head>
	<title>Glaze</title>
	<link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
</head>
<body>

<div class="nav">
        <a href="index.php"><img src="glazeyellow.png" alt=""></a>
        <ul>
            <li>
                <a href="index.php">Home</a>
            </li>
            <li>
                <a href="product.php">Products</a>
            </li>
            <li>
                <a href="about.html">About</a>
            </li>
            <li>
                <a href="contact.php">Contact</a>
            </li>
            <li>
                <a href="signup.php">Register</a>
            </li>
            <li>
                <a href="login.php">Log In</a>
            </li>
            <li>
                <a href="cart.php"><i class="fa-solid fa-basket-shopping"></i></a>
            </li>
            <li>
                <a href="profile.php"><i class="fa-solid fa-circle-user"></i></a>
            </li>
        </ul>
    </div>

    <div class="profile">
     <div class="imgcontainer">
    <img src="image.webp">
  </div>

  <div class="containerlg">
                <!-- Display success message -->
                <?php if ($success): ?>
                    <div class="success-message">
                        <?php echo htmlspecialchars($success); ?>
                    </div>
                <?php endif; ?>

                <!-- Display error message -->
                <?php if ($error): ?>
                    <div class="error-message">
                        <?php echo htmlspecialchars($error); ?>
                    </div>
                <?php endif; ?>

                <!-- USER INFO FORM - Posts to backend handler -->
                <form method="POST" action="../backend/profile_handler.php">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" required value="<?php echo htmlspecialchars($user['name']); ?>">
                    </div>

                    <div class="form-group">
                        <label for="email">Email </label>
                        <input type="email" id="email" name="email" required value="<?php echo htmlspecialchars($user['email']); ?>">
                    </div>

                    <div class="form-group">
                        <label for="password">New Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter new password or leave blank">
                    </div>

                    <div class="form-group">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm new password">
                    </div>

                    <button type="submit" class="btn btn-primary">Update Profile</button>
                </form>

                <!-- USER ROLE INFO -->
                <div class="user-info">
                    <p><strong>Account Type:</strong> <?php echo ucfirst(htmlspecialchars($user['role'])); ?></p>
                </div>
                <a href="index.php"><button>Log Out</button></a>
  </div>
  </div>
</body>
</html>
</body>
</html>
<?php
/**
 * PROFILE PAGE - GATEWAY
 * 
 * This page displays the user profile form.
 * Form submissions are handled by backend/profile_handler.php
 */

require '../backend/auth.php';
require '../backend/user_db.php';

// Check if user is logged in
if (!isLoggedIn()) {
    header("Location: login.php");
    exit;
}

// Get user data
$user = getUserById($_SESSION['user_id']);

// Get success/error messages from session if they exist
$success = $_SESSION['profile_success'] ?? '';
$error = $_SESSION['profile_error'] ?? '';
unset($_SESSION['profile_success']);
unset($_SESSION['profile_error']);
?>