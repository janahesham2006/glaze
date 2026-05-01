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
        <a href="index.html"><img src="glazeyellow.png" alt=""></a>
        <ul>
            <li>
                <a href="index.html">Home</a>
            </li>
            <li>
                <a href="product.html">Products</a>
            </li>
            <li>
                <a href="about.html">About</a>
            </li>
            <li>
                <a href="contact.html">Contact</a>
            </li>
            <li>
                <a href="signup.html">Register</a>
            </li>
            <li>
                <a href="login.html">Log In</a>
            </li>
            <li>
                <a href="cart.html"><i class="fa-solid fa-basket-shopping"></i></a>
            </li>
        </ul>
    </div>

     <form action="index.html">
  <div class="login">
     <div class="imgcontainer">
    <img src="glazeyellow.png">
  </div>

  <div class="containerlg">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

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