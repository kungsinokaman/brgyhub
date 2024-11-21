<?php
$dsn = 'mysql:host=localhost;dbname=barangay'; // DSN (Data Source Name)
$username = 'root'; // Database username
$password = ''; // Database password

try {
    // Create a new PDO instance
    $conn = new PDO($dsn, $username, $password);

    // Set PDO to throw exceptions on error
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Optional: Set character set to utf8 if needed
    $conn->exec("SET NAMES 'utf8'");
    
    // Optional: Display a success message (remove in production)
    echo "Connected successfully";
} catch(PDOException $e) {
    // Handle connection errors
    die("Connection failed: " . $e->getMessage());
}
?>
