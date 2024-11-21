<?php

include '../components/connect.php';

if (isset($_COOKIE['user_id'])) {
   $user_id = $_COOKIE['user_id'];
} else {
   $user_id = '';
}

if (isset($_POST['submit'])) {

   $id = unique_id();
   $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
   $phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
   $pass = filter_var(sha1($_POST['pass']), FILTER_SANITIZE_STRING);
   $cpass = filter_var(sha1($_POST['cpass']), FILTER_SANITIZE_STRING);

   $image = filter_var($_FILES['image']['name'], FILTER_SANITIZE_STRING);
   $ext = pathinfo($image, PATHINFO_EXTENSION);
   $rename = unique_id() . '.' . $ext;
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = '../uploaded_files/' . $rename;

   try {
      $select_user = $conn->prepare("SELECT * FROM `users` WHERE phone = ?");
      $select_user->execute([$phone]);

      if ($select_user->rowCount() > 0) {
         $message[] = 'Phone number already taken!';
      } else {
         if ($pass !== $cpass) {
            $message[] = 'Passwords do not match!';
         } else {
            $insert_user = $conn->prepare("INSERT INTO `users`(id, name, phone, password, image) VALUES(?,?,?,?,?)");
            $insert_user->execute([$id, $name, $phone, $pass, $rename]);
            move_uploaded_file($image_tmp_name, $image_folder);

            $verify_user = $conn->prepare("SELECT * FROM `users` WHERE phone = ? AND password = ? LIMIT 1");
            $verify_user->execute([$phone, $pass]);
            $row = $verify_user->fetch(PDO::FETCH_ASSOC);

            if ($verify_user->rowCount() > 0) {
               setcookie('user_id', $row['id'], time() + 60 * 60 * 24 * 30, '/');
               header('location:community.php');
               exit;
            }
         }
      }
   } catch (PDOException $e) {
      $message[] = 'Database error: ' . $e->getMessage();
   }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Brgy Hub Register</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/style.css">

</head>

<body style="padding-left: 0;"      >

   <section class="form-container">

      <form class="register" action="" method="post" enctype="multipart/form-data">
         <h3>create residents account</h3>
         <div class="flex">
            <div class="col">
               <p>your name <span>*</span></p>
               <input type="text" name="name" placeholder="enter your name" maxlength="50" required class="box">
               <p>your phone <span>*</span></p>
               <input type="phone" name="phone" placeholder="enter your phone number" maxlength="11" required class="box">
            </div>
            <div class="col">
               <p>your password <span>*</span></p>
               <input type="password" name="pass" placeholder="enter your password" maxlength="20" required class="box">
               <p>confirm password <span>*</span></p>
               <input type="password" name="cpass" placeholder="confirm your password" maxlength="20" required class="box">
            </div>
         </div>
         <p>select pic <span>*</span></p>
         <input type="file" name="image" accept="image/*" required class="box">
         <p class="link">already have an account? <a href="login.php">login now</a></p>
         <input type="submit" name="submit" value="register now" class="btn">
      </form>

   </section>

   <!-- custom js file link  -->
   <script src="js/script.js"></script>

</body>

</html>