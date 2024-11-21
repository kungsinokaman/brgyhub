<?php

include 'components/connect.php';

if (isset($_COOKIE['user_id'])) {
   $user_id = $_COOKIE['user_id'];
} else {
   $user_id = '';
}

if (isset($_POST['submit'])) {

   $email = isset($_POST['email']) ? filter_var($_POST['email'], FILTER_SANITIZE_EMAIL) : '';
   $pass = isset($_POST['pass']) ? sha1($_POST['pass']) : '';

   if (!empty($email) && !empty($pass)) {
      $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ? LIMIT 1");
      $select_user->execute([$email, $pass]);
      $row = $select_user->fetch(PDO::FETCH_ASSOC);

      if ($select_user->rowCount() > 0) {
         setcookie('user_id', $row['id'], time() + 60 * 60 * 24 * 30, '/');
         header('Location: communities.php');
         exit();
      } else {
         $message[] = 'Incorrect email or password!';
      }
   } else {
      $message[] = 'Please enter both email and password!';
   }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>BRGY HUB</title>
   <link rel="stylesheet" href="css/style.css">
</head>

<body style="padding-left: 0; padding-top: 50px">

   <section class="form-container">

      <form action="" method="post" enctype="multipart/form-data" class="login">
         <h3>Welcome back!</h3>
         <p>Your email <span>*</span></p>
         <input type="email" name="email" placeholder="Enter your email" maxlength="100" required class="box">
         <p>Your password <span>*</span></p>
         <input type="password" name="pass" placeholder="Enter your password" maxlength="20" required class="box">
         <input type="submit" name="submit" value="Login now" class="btn">
      </form>

   </section>

   <!-- custom js file link  -->
   <script src="js/script.js"></script>

</body>

</html>
