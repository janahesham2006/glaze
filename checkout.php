<!DOCTYPE html>
<html>
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

    <h2>Item:</h2>

    <div class="cardsContainer">
        <div class="card">
            <img src="image.webp" alt="">
            <h2>Cleansing Oil</h2>
            <p>
                Beauty of Joseon Ginseng cleansing oil. 
            </p>

            <a href="project checkout.html">
                <button>300EGP</button>
            </a>
        </div>
    </div>
    <h2>Fill the Payment Form for checking out:</h2>


<div class="checkoutform">
<form>
    
    <input type="TEXT" placeholder="Name"><br>
    <input type="email" placeholder="email"><br>
    <textarea placeholder="Home address" style="text-align: left;"></textarea><br>
    <h3>Select Payment type:</h3><br>
    <ul>
    <li>Cash</li><input type="radio" name="cash"></ul><br>
     <ul><li>VISA</li><input type="radio" name="visa" placeholder="visa"></ul><br>
    <ul><li>Apple Pay</li><input type="radio" name="Apple pay" placeholder="Apple pay"></ul><br>
    <ul><li>Telda</li><input type="radio" name="Telda" placeholder="Telda"></ul><br>
    <input type="submit" name="submit">
</form>
</div>




    <div class="footer">
        <p>All Rights Reserved &copy; 2025</p>
    </div>


</body>
</html>