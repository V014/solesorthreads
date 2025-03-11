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
    <title>Bags - Soles or Threads</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Bags</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="sneakers.html">Sneakers</a>
            <a href="accessories.html">Accessories</a>
            <a href="womens-shoes.html">Women's Shoes</a>
            <a href="mens-shoes.html">Men's Shoes</a>
        </nav>
    </header>

    <section>
        <h2>Our Bags Collection</h2>
        <div class="product">
            <img src="imgs/bag1.jpg" alt="Bag 1">
            <p>Leather Shoulder Bag - $80</p>
        </div>
        <div class="product">
            <img src="imgs/bag2.jpg" alt="Bag 2">
            <p>Canvas Tote Bag - $50</p>
        </div>
    </section>
</body>
</html>