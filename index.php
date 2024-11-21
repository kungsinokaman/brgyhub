<?php
session_start();

include("components/connect.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome!</title>
    <link rel="stylesheet" href="./css/style2.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div>
        
    </div>
    <div class="main">
        <nav class="container">
            <ul>
                <li><a class="btn flex-btn fa-user" href="admin/login.php">ADMIN</a></li>
                <li><a class="btn flex-btn fa-user" href="login.php">USER</a></li>
            </ul>
        </nav>
    </div>
</body>

</html>