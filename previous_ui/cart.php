<?php
session_start();
require "php/db_connect.php";

if (!isset($_SESSION['logged'])) {
    header("Location: index.php");
    exit;
}

if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
    // Get inventory data from the database
    $stmt = $conn->prepare("SELECT * FROM cart where user_id = :user_id");
    $stmt->bindParam(':user_id', $_SESSION['user_id']);
    $stmt->execute();
    
    if ($stmt->rowCount() > 0) {
        $cart = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        echo "<script>alert('No items in cart');</script>";
    }

} else {
    echo "<script>alert('User ID is not set');</script>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="imgs\LOGO.png"
            alt=" The soles or threads logo">
        </div>
        <button class="menu-toggle"
        onclick="toggleMenu()"></button>
        <nav id="nav-menu">
            <a href="index.php">Home</a>
            <a href="bags.php">Bags</a>
            <a href="shoes.php">Shoes</a>
            <a href="clothes.php">Clothes</a>
            <a href="cart.php">Cart</a>
            <a href="php/logout.php">Logout</a>
        </nav>
    </header>

    <section id="cart-container">
        <?php foreach ($cart as $item) { ?>
            <h2>Your Cart</h2>
            <div id="cart-list"></div>
            <h3 id="total-price">Total: MK<? $item['price']; ?></h3>
        <?php } ?>
        <table>
          <thead>
              <tr>
                  <th>Item Name</th>
                  <th>Quantity</th>
                  <th>Price</th>
              </tr>
          </thead>
          <tbody>
          <?php foreach ($cart as $item) { ?>
                  <tr>
                      <td><?php echo $item['item_name']; ?></td>
                      <td><?php echo $item['quantity']; ?></td>
                      <td><?php echo $item['price']; ?></td>
                  </tr>
              <?php } ?>
          </tbody>
      </table>
    </section>

    <!-- <script src="js/script.js"></script> -->
</body>
</html>