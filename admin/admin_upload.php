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
    <link rel="stylesheet" href="admin.css">
</head>

<body>
    <?php include '../components/admin_header.php'; ?>
    <h1>Admin Upload</h1>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="image">Select Image:</label>
        <input type="file" name="image" id="image" required>
        <br>
        <label for="description">Description:</label>
        <textarea name="description" id="description" required></textarea>
        <br>
        <input type="submit" name="submit" value="Upload">
    </form>
    <script src="../js/script.js"></script>
</body>

</html>