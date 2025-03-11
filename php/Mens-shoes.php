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
    <title>Men's Shoes - Soles or Threads</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Men's Shoes</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="sneakers.html">Sneakers</a>
            <a href="bags.html">Bags</a>
            <a href="accessories.html">Accessories</a>
            <a href="womens-shoes.html">Women's Shoes</a>
        </nav>
    </header>

    <section>
        <h2>Our Men's Shoes Collection</h2>
        <div class="product">
            <img src="imgs/mens1.jpg" alt="Men's Shoe 1">
            <p>Leather Dress Shoes - $110</p>
        </div>
        <div class="product">
            <img src="imgs/mens2.jpg" alt="Men's Shoe 2">
            <p>Casual Sneakers - $75</p>
        </div>
    </section>
</body>
</html>