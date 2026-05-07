<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
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

     <form action="index.html">
  <div class="login">
                    <!-- Display error message if login failed -->
                <?php if ($error): ?>
                    <div class="error-message">
                        <?php echo htmlspecialchars($error); ?>
                    </div>
                <?php endif; ?>
     <div class="imgcontainer">
    <img src="glazeyellow.png">
  </div>

  <div class="containerlg">
<label for="uname"><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <button type="submit">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>
  </div>
  <div class="containerbtnlg">
      <a href="index.html"><button type="button" class="cancelbtn">Cancel</button></a>
    <span class="psw">Forgot password?</span>
  </div>
</form>

    <div class="footer">
        <p>All Rights Reserved &copy; 2025</p>
    </div>
</body>
</html>
<?php
/**
 * LOGIN PAGE - GATEWAY
 * 
 * This page displays the login form.
 * Form submissions are handled by backend/login_handler.php
 */

require 'auth.php';

// Redirect if already logged in
if (isLoggedIn()) {
    if (isAdmin()) {
        header("Location:index_admin.php");
    } else {
        header("Location: product.php");
    }
    exit;
}

// Get error message from session if exists
$error = $_SESSION['login_error'] ?? '';
unset($_SESSION['login_error']);
?>