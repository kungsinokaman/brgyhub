<?php

include 'components/connect2.php';

if (isset($_COOKIE['user_id'])) {
   $user_id = $_COOKIE['user_id'];
} else {
   $user_id = '';
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
   <title>About</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

   <style>
      /* Styling for profile images (circle) */
      .profile-img {
         width: 50px;
         height: 50px;
         border-radius: 50%;
         object-fit: cover;
         margin-right: 10px;
      }

      /* Layout for users and admins */
      .chat-sidebar {
         display: flex;
         justify-content: space-between;
         margin: 20px;
      }

      .chat-list {
         list-style: none;
         padding: 0;
      }

      .chat-item {
         display: flex;
         align-items: center;
         margin-bottom: 10px;
         cursor: pointer;
         padding: 10px;
         border: 1px solid #ccc;
         border-radius: 10px;
         transition: background-color 0.3s;
      }

      .chat-item:hover {
         background-color: #f0f0f0;
      }

      .chat-section {
         width: 45%;
      }

      .section-title {
         font-weight: bold;
         font-size: 18px;
         margin-bottom: 10px;
      }

      /* Chatbox styling */
      .chat-box {
         border: 1px solid #ccc;
         padding: 10px;
         height: 300px;
         overflow-y: scroll;
         margin-top: 20px;
      }

      .chat-input {
         margin-top: 10px;
         display: flex;
      }

      .chat-input input {
         flex: 1;
         padding: 10px;
         border: 1px solid #ccc;
         border-radius: 5px;
      }

      .chat-input button {
         margin-left: 10px;
         padding: 10px;
         background-color: #007BFF;
         color: #fff;
         border: none;
         border-radius: 5px;
         cursor: pointer;
      }
   </style>
</head>
<body>

<?php include 'components/user_header.php'; ?>

<section class="about">

   <div class="row">

      <div class="image">
         <img src="about-img.svg" alt="">
      </div>

      <div class="content">
         <h3>Access Chats!</h3>
         <a href="/brgyhubchat/login.php"><h1>BrgyHub Chats </h1></a>
      </div>

   </div>

</section>

<!-- custom js file link -->
<script src="js/script.js"></script>



</body>
</html>
