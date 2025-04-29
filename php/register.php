<?php
session_start();
include 'db_connect.php';

class User {
    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    // Check if email already exists
    public function emailExists($email) {
        $stmt = $this->connection->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bindParam(1, $email, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

    // Register a new user
    public function register($username, $email, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->connection->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->bindParam(1, $username, PDO::PARAM_STR);
        $stmt->bindParam(2, $email, PDO::PARAM_STR);
        $stmt->bindParam(3, $hashedPassword, PDO::PARAM_STR);
        return $stmt->execute();
    }
}

// Initialize database connection
$db = new Database();
$connection = $db->connect();

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $user = new User($connection);

    if ($user->emailExists($email)) {
        $_SESSION['error'] = "Email already exists. Please use a different email.";
        header("Location: ../register.php?email_already_exists"); // Redirect to register page
    } else {
        if ($user->register($username, $email, $password)) {
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $connection->lastInsertId(); // Get the last inserted user ID
            header("Location: ../home.php"); // Redirect to dashboard page
        } else {
            $_SESSION['error'] = "Error registering user. Please try again.";
            header("Location: ../register.php?registration_failed"); // Redirect to register page
        }
    }
}
?>