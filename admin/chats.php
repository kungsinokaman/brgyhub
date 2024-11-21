<?php

include '../components/connect2.php';

// Admin session or user session
if (isset($_COOKIE['head_id'])) {
   $head_id = $_COOKIE['head_id'];
} else {
   $head_id = '';
}

// Fetch users and admins
$users = [];
$admins = [];

// Query all users (from "users" table) and all admins (from "head" table)
$queryUsers = "SELECT id, name, image FROM users";
$queryAdmins = "SELECT id, name, image FROM head";

// Execute query and check for errors
$resultUsers = $conn->query($queryUsers);
$resultAdmins = $conn->query($queryAdmins);

// Fetch users if the query was successful
if ($resultUsers->rowCount() > 0) {
    while ($row = $resultUsers->fetch(PDO::FETCH_ASSOC)) {
        $users[] = $row;
    }
}

// Fetch admins if the query was successful
if ($resultAdmins->rowCount() > 0) {
    while ($row = $resultAdmins->fetch(PDO::FETCH_ASSOC)) {
        $admins[] = $row;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>BrgyHub Chats (Admin)</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<?php include '../components/admin_header.php';?>

<section class="about">

   <div class="row">

      <div class="image">
         <img src="../about-img.svg" alt="">
      </div>

      <div class="content">
         <h3>Admin Chats</h3>
         <a href="/brgyhubchat/login.php"><h1>BrgyHub Chats (Admin)</h1></a>
         
      </div>

   </div>

</section>

<!-- custom js file link -->
<script src="js/script.js"></script>


</body>
</html>
