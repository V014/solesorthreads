<?php
session_start();
if (!isset($_SESSION['user_id'])){
    header("Location.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accessories - Soles or Threads</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Accessories</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="sneakers.html">Sneakers</a>
            <a href="bags.html">Bags</a>
            <a href="womens-shoes.html">Women's Shoes</a>
            <a href="mens-shoes.html">Men's Shoes</a>
        </nav>
    </header>

    <section>
        <h2>Our Accessories Collection</h2>
        <div class="product">
            <img src="imgs/watch.jpg" alt="Watch">
            <p>Gold Chain Watch - $150</p>
        </div>
        <div class="product">
            <img src="imgs/hat.jpg" alt="Hat">
            <p>Snapback Hat - $30</p>
        </div>
    </section>
</body>
</html>