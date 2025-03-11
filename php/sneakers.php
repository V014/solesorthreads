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
    <title>Sneakers - Soles or Threads</title>
    <link rel="stylesheet" href="style.css"> <!-- Link to CSS -->
</head>
<body>
    <header>
        <h1>Sneakers</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="bags.html">Bags</a>
            <a href="accessories.html">Accessories</a>
            <a href="womens-shoes.html">Women's Shoes</a>
            <a href="mens-shoes.html">Men's Shoes</a>
        </nav>
    </header>

    <section>
        <h2>Our Sneakers Collection</h2>
        <div class="product">
            <img src="imgs/sneaker1.jpg" alt="Sneaker 1">
            <p>Nike Air Force 1 - $120</p>
        </div>
        <div class="product">
            <img src="imgs/sneaker2.jpg" alt="Sneaker 2">
            <p>Adidas Campus Green - $250</p>
        </div>
    </section>
    
</body>
</html>