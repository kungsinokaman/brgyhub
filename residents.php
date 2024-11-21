<?php

require_once 'core/config.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Announcement</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" type="text/css"/>
    <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
</head>

<style>
        /* h2 {
            text-align: center;
            color: #333;
        } */

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
        background-color: lightskyblue;
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

        /* Style for the list items */
        li {
            list-style-type: none; /* Remove bullet points */
        }

        /* Add responsiveness for smaller screens */
        @media (max-width: 600px) {
            #main {
                padding: 15px;
            }
        }
    </style>
</head>

<body>
    <?php include 'components/user_header.php'; ?>

    <div id="main" class="container community">
        <h2 class="heading">Announcements</h2>
        <hr />
        <div id="content">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td>
                            <?php foreach ($DBQuery->getMessages() as $message): ?>
                                <div class="message-box">
                                    <li><?= htmlspecialchars($message->getMessage()); ?></li>
                                </div>
                            <?php endforeach; ?>
                            <div class="clearfix"></div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script src="js/script.js"></script>
</body>

</html>