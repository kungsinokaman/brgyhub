<?php

$db_name = 'brgyhub';
$user_name = 'root';
$user_password = '';

// Construct the DSN (Data Source Name)
$dsn = "mysql:host=localhost;dbname=$db_name";

try {
    // Create a new PDO instance
    $conn = new PDO($dsn, $user_name, $user_password);
    
    // Set PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Define a function to generate a unique ID
    function unique_id() {
        $str = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $rand = array();
        $length = strlen($str) - 1;
        for ($i = 0; $i < 20; $i++) {
            $n = mt_rand(0, $length);
            $rand[] = $str[$n];
        }
        return implode($rand);
    }
} catch (PDOException $e) {
    // If connection fails, catch the exception and display error message
    echo "Connection failed: " . $e->getMessage();
    die(); // Terminate script execution
}

?>
