<?php
session_start();
require 'db_connect.php'; // reference connection page
include 'logs.php'; // reference logs page

class User {
    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    // Authenticate user
    public function authenticate($email, $password) {
        $stmt = $this->connection->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            var_dump($user); // Check if the user data is fetched correctly
            // Verify password
            if (password_verify($password, $user['password'])) {
                return $user; // Return user data if authentication is successful
            }
        }
        return false; // Return false if authentication fails
    }
}

// Initialize database connection
$db = new Database();
$connection = $db->connect();

// Handle login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = new User($connection);
    $authenticatedUser = $user->authenticate($email, $password);

    if ($authenticatedUser) {
        // Set session variables
        $_SESSION['email'] = $authenticatedUser['email'];
        $_SESSION['user_id'] = $authenticatedUser['id']; // Store the user ID in the session
        header("Location: ../home.php"); // Redirect to dashboard page
    } else {
        $_SESSION['error'] = "Invalid login credentials"; // Set error message in session
        log_error($connection, "Invalid login credentials", "User login", $email); // Log the error
        header("Location: ../login.php?invalid_login_credentials"); // Redirect to register page
    }
}
?>