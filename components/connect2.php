<?php
// Import necessary environment variables for security
// You can use dotenv library or other methods to load environment variables

// Define connection parameters
$db_host = getenv('DB_HOST') ?: '127.0.0.1:3325';
$db_name = getenv('DB_NAME') ?: 'brgyhub';
$db_user = getenv('DB_USER') ?: 'root';
$db_password = getenv('DB_PASSWORD') ?: '';

// Set default character set encoding for the database connection
$options = [
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4',
];

try {
    // Establish connection to MySQL database using PDO
    $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password, $options);
    // Set PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Remove debug line: echo "Connected successfully";
} catch (PDOException $e) {
    // If connection fails, return null and handle error appropriately elsewhere
    return null;
}

// Function to generate a unique ID with a specified length and character set
function generateUniqueId($length = 20, $charset = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890') {
    $rand = [];
    $charsetLength = strlen($charset) - 1;
    for ($i = 0; $i < $length; $i++) {
        $rand[] = $charset[random_int(0, $charsetLength)];
    }
    return implode($rand);
}
?>
