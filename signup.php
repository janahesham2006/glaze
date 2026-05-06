<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
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


     <form   method="post" >
    <div class="signup">
          <div class="imgcontainer">
    <img src="glazeyellow.png">
  </div>

  <div class="containerlg">
    <label for="uname"><b>Name</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

<label for="uname"><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

 <label for="psw"><b>Confirm Password</b></label>
    <input type="password" placeholder="Enter Password" name="cpsw" required>

    <button type="submit">Sign in</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>
    </div>
  <div class="containerbtnlg">
      <a href="index.html"><button type="button" class="cancelbtn">Cancel</button></a>
      <P><b>Already Have An Account? </b> <a href="login.html">Login</a></P>
  </div>
  <script src="jscript.js"></script>
</form>
<?php
$username= $_POST["uname"];
$email= $_POST["email"];
$psw1= $_POST["psw"];
$psw2= $_POST["cpsw"];
if ($pwd1 != $pwd2)
{ echo "Incorrect Password! Please try again ";
die(); }
$conn= mysqli_connect("localhost", "root", "", "GLAZE");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$stmt = "INSERT INTO `Customer` ( `name`, `email`, `password`)
VALUES ('$username', '$email', '$psw1')";
$result = mysqli_query($conn, $stmt);
if($result==FALSE)
echo "Error. $username was not added";
else
echo "$username was successfully added";
?>
    <div class="footer">
        <p>All Rights Reserved &copy; 2025</p>
    </div>
</body>
</html>