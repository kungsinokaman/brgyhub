<?php

include 'components/connect2.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Files</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

   <?php include 'components/user_header.php'; ?>

<!-- courses section starts  -->

<section class="community">

   <div class="box-container" align="center">
      <div class="box" align="center">
         <h3 class="title">Barangay Certificates</h3>
         <a href="certificates.php" class="inline-btn">Click Here</a><br></br>
      </div><br></br>
      <div class="box">
         <h3 class="title">Barangay Clearance</h3>
         <a href="clearance.php" class="inline-btn">Click Here</a>
      </div><br></br>
   </div>
   




   <script src="js/script.js"></script>

</body>
</html>