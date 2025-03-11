<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
            <a href="register.php">Register</a>
            <a href="login.php">Login</a>
        </nav>
    </header>
    <h2>Register</h2>
    <form id="register-form" action="php/register.php" method="POST">
        <input type="text" id="name" placeholder="username" name="username" required>
        <input type="email" id="email" placeholder="Email" name="email">
        <input type="password" id="password" placeholder="Password" name="password" required>
        <button type="submit">Register</button>
    </form>
    <p>Already have an account? <a href="login.html">Login</a></p>

    <script src="script.js"></script>
</body>
</html>