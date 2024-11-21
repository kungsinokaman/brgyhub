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
   if(isset($_POST['fullname'], $_POST['age'], $_POST['clearance'])){
       $fullname = $_POST['fullname'];
       $fullname = filter_var($fullname, FILTER_SANITIZE_STRING);
       $age = $_POST['age'];
       $age = filter_var($age, FILTER_SANITIZE_STRING);
       $clearance = $_POST['clearance'];
       $clearance = filter_var($clearance, FILTER_SANITIZE_STRING);

       $insert_clearance = $conn->prepare("INSERT INTO `clearance`(fullname, age, clearance) VALUES(?,?,?)");
       $insert_clearance->execute([$fullname, $age, $clearance]);
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
   <title>Clearance</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php include 'components/user_header.php'; ?>

<section class="form-container">

   <form class="register" action="" method="post" enctype="multipart/form-data">
      <h3>Barangay Clearance</h3>
      <div class="flex">
         <div class="col">
            <p>Full Name<span>*</span></p>
            <input type="text" name="fullname" placeholder="enter your fullname" maxlength="50" required class="box">
            <p>Your Age <span>*</span></p>
            <input type="age" name="age" placeholder="enter your age" maxlength="20" required class="box">
            <p>Select the purpose(s) of your application:<span>*</span></p>
            <select name="clearance" class="box" required>
               <option value="" disabled selected>-- select clearance --</option>
               <option value="Application for Employment">Application for Employment</option>
               <option value="Overseas Travel Papers">Overseas Travel Papers</option>
               <option value="Transfer of Residence">Transfer of Residence</option>
               <option value="School Reference">School Reference</option>
               <option value="Application for Senior Citizen ID">Application for Senior Citizen ID</option>
               <option value="Application for PWD ID">Application for PWD ID</option>
               <input type="submit" name="submit" value="submitted" class="btn">
         </div>
   </form>

</section>














<!-- custom js file link  -->
<script src="js/script.js"></script>
   
</body>
</html>