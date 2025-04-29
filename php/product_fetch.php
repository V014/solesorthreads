<?php

class Product {
    private $connection;

    // Constructor to initialize the database connection
    public function __construct($connection) {
        $this->connection = $connection;
    }

    // Fetch all products
    public function fetchAll() {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM products");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetch all products as an associative array
        } catch (PDOException $e) {
            $this->logError($e->getMessage(), "Error fetching products");
            return false;
        }
    }

    // Fetch a single product by ID
    public function fetchById($product_id) {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM products WHERE id = :id");
            $stmt->bindParam(':id', $product_id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC); // Fetch the product as an associative array
        } catch (PDOException $e) {
            $this->logError($e->getMessage(), "Error fetching product by ID");
            return false;
        }
    }

    // Private method to log errors
    private function logError($errorMessage, $context) {
        // Assuming $_SESSION['email'] is available
        $userEmail = $_SESSION['email'] ?? 'unknown';
        log_error($this->connection, $errorMessage, $context, $userEmail);
    }
}
?>