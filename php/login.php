<?php
session_start();
require 'db_connect.php'; // reference connection page
include 'logs.php'; // reference logs page

// Handle login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
    $stmt->bindParam(':username', $user);
    $stmt->bindParam(':password', $pass);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $user_id = $result['id']; // Fetch the user_id from the query result

        $_SESSION['logged'] = 'logged';
        $_SESSION['email'] = $user;
        $_SESSION['user_id'] = $user_id; // Store the user_id in the session
        header("Location: ../home.php"); // Redirect to dashboard page
    } else {
        log_error($connection, "Invalid login credentials", "User login", $email); // Log the error
        echo "<script>alert('Invalid login credentials');</script>";
    }
}
?>