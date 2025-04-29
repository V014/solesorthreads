<?php
class Database {
    // Placeholder for database connection
    private $host = 'localhost';
    private $dbname = 'solesorthreads_db';
    private $username = 'root';
    private $password = ''; // Default password for XAMPP is empty
    private $conn;

    // Method to establish a database connection
    public function connect() {
        if ($this->conn === null) {
            try {
                $this->conn = new PDO(
                    "mysql:host={$this->host};dbname={$this->dbname};charset=utf8",
                    $this->username,
                    $this->password
                );
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                // Handle connection error
                echo "Connection failed: " . $e->getMessage();
                $this->conn = null;
            }
        }
        return $this->conn;
    }
}
?>
