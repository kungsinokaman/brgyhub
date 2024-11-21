<?php

include '../components/connect.php';

if(isset($_COOKIE['head_id'])){
   $head_id = $_COOKIE['head_id'];
}else{
   $head_id = '';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Add User</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/fontawesome-6-2-0.min.css">
   <link rel="stylesheet" href="../css/style.css">

</head>
<body>

   <?php include '../components/admin_header.php'; ?>

<!-- courses section starts  -->

<section class="community">

   
   <div class="box-container" align="center">
      <div class="box" align="center">
         <h3 class="title">Brgy Hub Registration</h3>
         <a href="register_residents.php" class="inline-btn">Register</a><br></br>
      </div><br></br>
      <div class="box">
         <h3 class="title">Brgy Hub Chats</h3>
         <a href="../../brgyhubchat/index.php" class="inline-btn">Register</a>
      </div><br></br>
      <div class="box">
         <h3 class="title">Brgy Users</h3>
         <a href="users.php" class="inline-btn">View Users</a>
      </div><br></br>
   </div>
   
   <script src="../js/script.js"></script>

</body>
</html>