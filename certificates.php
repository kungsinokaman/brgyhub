<?php

include 'components/connect2.php';

$message = array(); // Initialize an empty array to store messages

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

if(isset($_POST['submit'])){
   // Check if the form fields are set before accessing their values
   if(isset($_POST['fullname'], $_POST['age'], $_POST['certificates'])){
       $fullname = $_POST['fullname'];
       $fullname = filter_var($fullname, FILTER_SANITIZE_STRING);
       $age = $_POST['age'];
       $age = filter_var($age, FILTER_SANITIZE_STRING);
       $certificates = $_POST['certificates'];
       $certificates = filter_var($certificates, FILTER_SANITIZE_STRING);

       $insert_certificates = $conn->prepare("INSERT INTO `certificates`(fullname, age, certificates) VALUES(?,?,?)");
       $insert_certificates->execute([$fullname, $age, $certificates]);
       $message[] = 'All Done! Please message the admin so that they can process your documents.';
   } else {
       $message[] = 'Please fill out all the required fields.';
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <body style="padding-left: 0;">

<?php
if(isset($message)){
   foreach($message as $msg){
      echo '
      <div class="message form">
         <span>'.$msg.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Certificates</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php include 'components/user_header.php'; ?>

<section class="form-container community">
 
   <form class="register" action="" method="post" enctype="multipart/form-data">
      <h3>Barangay Certificates</h3>
      <div class="flex">
         <div class="col">
            <p>Full Name<span>*</span></p>
            <input type="text" name="fullname" placeholder="enter your fullname" maxlength="50" required class="box">
            <p>Your Age <span>*</span></p>
            <input type="age" name="age" placeholder="enter your age" maxlength="20" required class="box">
            <p>Certificates <span>*</span></p>
            <select name="certificates" class="box" required>
               <option value="" disabled selected>-- select certicate type</option>
               <option value="Certificate of Indigency">Certificate of Indigency</option>
               <option value="Certificate of Residency">Certificate of Residency</option>
               <input type="submit" name="submit" value="submitted" class="btn">
         </div>
      </div>
      
   </form>

</section>














<!-- custom js file link  -->
<script src="js/script.js"></script>
   
</body>
</html>