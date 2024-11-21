<?php

$db_name = 'mysql:host=localhost;dbname=brgyhub';
$user_name = 'root';
$user_password = '';

$conn = new PDO($db_name, $user_name, $user_password);

// Check if the function is not already defined before declaring it
if (!function_exists('unique_id')) {
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
}

?>
