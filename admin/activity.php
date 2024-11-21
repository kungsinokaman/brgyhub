<?php
include '../components/connect.php';

if (isset($_COOKIE['head_id'])) {
    $head_id = $_COOKIE['head_id'];
} else {
    $head_id = '';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    </noscript>
    <title>Admin Upload</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" preconnect href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../css/fontawesome-6-2-0.min.css">
    <link rel="stylesheet" href="../css/admin_style.css">
    <!-- <link rel="stylesheet" href="admin.css"> -->
</head>

<style>
        /* body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .community {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            padding: 20px;
            max-width: 500px;
            width: 100%;
        }
        .heading {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        } */
        label {
            display: block;
            margin-bottom: 8px;
            font-size: 20px;
            font-weight: bold;
            color: #555;
        }
        input[type="file"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid black;
            border-radius: 5px;
        }
        input[type="submit"] {
            width: 100%;
            background-color: #28a745;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
        @media (max-width: 600px) {
            .community {
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <?php include '../components/admin_header.php'; ?>
    <section class="community">
        <h1 class="heading">Admin Uploads</h1>
        <form action="../controllers/community_controller.php?action=store" method="POST" enctype="multipart/form-data">
            <label for="image">Select Image:</label>
            <input type="file" name="image" id="image">
            <br>
            <label for="description">Description:</label>
            <textarea name="description" id="description"></textarea>
            <br>
            <input type="submit" value="Upload">
        </form>
    </section>
    <script src="../js/script.js"></script>
</body>
</html>