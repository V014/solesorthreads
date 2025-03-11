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
    <title>Women's Shoes - Soles or Threads</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Women's Shoes</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="sneakers.html">Sneakers</a>
            <a href="bags.html">Bags</a>
            <a href="accessories.html">Accessories</a>
            <a href="mens-shoes.html">Men's Shoes</a>
        </nav>
    </header>

    <section>
        <h2>Our Women's Shoes Collection</h2>
        <div class="product">
            <img src="imgs/womens1.jpg" alt="Women's Shoe 1">
            <p>High Heel Sandals - $90</p>
        </div>
        <div class="product">
            <img src="imgs/womens2.jpg" alt="Women's Shoe 2">
            <p>Casual Flats - $60</p>
        </div>
    </section>
</body>
</html>