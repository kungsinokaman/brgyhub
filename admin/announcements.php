<?php
session_start();
// Check if head_id cookie exists
$head_id = isset($_COOKIE['head_id']) ? $_COOKIE['head_id'] : '';

// Ensure that connect.php is included only once
if (!defined('CONNECT_INCLUDED')) {
    define('CONNECT_INCLUDED', true);
    include('../components/connect2.php');
}

// Check if the connection is established
if (!isset($conn)) {
    echo "Error: Database connection is not established.";
    exit; // Terminate the script if connection is not established
}

if (isset($_SESSION['flash_message'])) {
    echo '<div class="message form">
            <span>' . $_SESSION['flash_message'] . '</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
          </div>';
    unset($_SESSION['flash_message']); // Clear the flash message after displaying it
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Announcement</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <!-- custom css file link -->
    <link rel="stylesheet" href="../css/admin_style.css">

</head>

<style>
    hr {
        border: 0;
        height: 1px;
        background: #ddd;
        margin: 20px 0;
    }

    p {
        font-size: 20px;
        margin-bottom: 10px;
        font-weight: bold;
        color: #555;
    }

    textarea.ed {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-bottom: 20px;
    }

    input.btn {
        width: 100%;
        background-color: #007bff;
        color: #fff;
        padding: 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    input.btn:hover {
        background-color: #0056b3;
    }

    .message-log {
        margin-top: 20px;
    }

    .message-log h2 {
        font-size: 22px;
        color: #333;
        text-align: center;
        margin-bottom: 20px;
    }

    table.table {
        width: 100%;
        border-collapse: collapse;
    }

    table.table thead th {
        font-size: 20px;
        background-color: #007bff;
        color: #fff;
        padding: 10px;
        text-align: left;
    }

    table.table tbody tr {
        background-color: #f9f9f9;
        border-bottom: 1px solid #ddd;
    }

    table.table tbody tr:hover {
        background-color: #f1f1f1;
    }

    table.table tbody td {
        padding: 10px;
        border-bottom: 1px solid #ddd;
        position: relative;
    }

    table.table tbody tr:last-child td {
        border-bottom: 0;
    }

    .message-box {
        font-size: 20px;
        padding: 15px;
        border-radius: 5px;
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
        transition: box-shadow 0.3s ease, transform 0.3s ease;
    }

    .message-box:hover {
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        transform: translateY(-5px);
    }

    .delete-btn {
        position: relative;
        top: 5px;
        background-color: #ff4d4d;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        padding: 5px 10px;
        font-size: 14px;
    }

    /* .delete-btn:hover {
            background-color: #e60000;
        } */
</style>
</head>

<body>

    <?php include '../components/admin_header.php'; ?>
    <section class="community">
        <div id="content">
            <h1 class="heading">Announcement</h1>
            <p>Message</p>
            <form action="../controllers/announcement_controller.php?action=store" method="post">
                <textarea type="text" name="message" class="ed" rows="5"></textarea><br /><br />
                <input type="submit" class="btn btn-primary" value="Send" />
            </form>
        </div>
        <hr />
        <div class="message-log">
            <h2 align="center">Message Log</h2>
            <hr />
            <table class="table table-bordered">
                <thead>
                    <div class="btn btn-primary ">
                        <h1>Residents</h1>
                    </div>
                </thead>
                <tbody>
                    <?php
                    // Fetch all rows from noticemsg table specifically for the table
                    $stmt = $conn->query("SELECT * FROM noticemsg ORDER BY id DESC"); // Changed to order by id DESC for LIFO
                    if ($stmt) {
                        // Fetch and display rows
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo '<tr><div class="message-box">' . htmlspecialchars($row['message']) . '<form action="../controllers/announcement_controller.php?action=delete&id=' . $row['id'] . '" method="post">
                            <button type="submit" class="delete-btn">Delete</button></form></div></tr>';
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
    <script src="../js/script.js"></script>
</body>

</html>