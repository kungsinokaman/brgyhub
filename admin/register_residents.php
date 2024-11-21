<?php

include '../components/connect2.php';

if(isset($_POST['submit'])){

   $id = generateUniqueId();
   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);
   $cpass = sha1($_POST['cpass']);
   $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

   $image = $_FILES['image']['name'];
   $image = filter_var($image, FILTER_SANITIZE_STRING);
   $ext = pathinfo($image, PATHINFO_EXTENSION);
   $rename = generateUniqueId().'.'.$ext;
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = '../uploaded_files/'.$rename;

   $select_head = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
   $select_head->execute([$email]);
   
   if($select_head->rowCount() > 0){
      $message[] = 'email already taken!';
   }else{
      if($pass != $cpass){
         $message[] = 'confirm password not matched!';
      }else{
         $select_head = $conn->prepare("INSERT INTO `users`(id, name, email, password, image) VALUES(?,?,?,?,?)");
         $select_head->execute([$id, $name, $email, $cpass, $rename]);
         move_uploaded_file($image_tmp_name, $image_folder);
         $message[] = 'registered! please login now';
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Register</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../css/style.css">

</head>

<body style="padding-left: 0;">

    <section class="form-container">

        <form class="register" action="" method="post" enctype="multipart/form-data">
            <h3><a href="adduser.php">create resident account</h3></a>
            <div class="flex">
                <div class="col">
                    <p>Name <span>*</span></p>
                    <input type="text" name="name" placeholder="enter your name" maxlength="50" required class="box">
                    <p>Email <span>*</span></p>
                    <input type="email" name="email" placeholder="enter your email" maxlength="100" required class="box">
                </div>
                <div class="col">
                    <p>Password <span>*</span></p>
                    <input type="password" name="pass" placeholder="enter your password" maxlength="20" required class="box">
                    <p>Confirm password <span>*</span></p>
                    <input type="password" name="cpass" placeholder="confirm your password" maxlength="20" required class="box">
                </div>
            </div>
            <p>Upload Picture <span>*</span></p>
            <input type="file" name="image" accept="image/*" required class="box">
            <p class="link">Already have an account? <a href="login.php">login now</a></p>
            <input type="submit" name="submit" value="register now" class="btn">
        </form>

    </section>

    <!-- custom js file link  -->
    <script src="js/script.js"></script>

</body>

</html>
