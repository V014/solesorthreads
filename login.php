<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css"> 
</head>
<body>
    <h2>Login</h2>
    <form id="login-form" action="php/login.php" method="POST">
        <input type="text" id="username" placeholder="Username" name="username" required>
        <input type="password" id="login-password" placeholder="Password" name="password" required>
        <button type="submit">Login</button>
    </form>
    <p>Don't have an account? <a href="register.html">Register</a></p>

    <script src="script.js"></script>
</body>
</html>