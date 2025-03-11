<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash password

    // Check if email already exists
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo json_encode(["success" => false, "message" => "User already exists."]);
    } else {
        // Insert user into database
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param(NULL, $username, $email, $password, NULL);
        if ($stmt->execute()) {
            $_SESSION['logged'] = true;
            $_SESSION['username'] = $username;
            header("Location: ../home.php"); // Redirect to dashboard page
            // echo json_encode(["success" => true, "message" => "Registration successful!"]);
        } else {
            header("Location: ../register.php"); // Redirect to dashboard page
            echo "<script>alert('Invalid login credentials');</script>";
            // echo json_encode(["success" => false, "message" => "Error registering user."]);
        }
    }
}
?>