<?php

include '../components/connect.php';

if(isset($_COOKIE['head_id'])){
   $head_id = $_COOKIE['head_id'];
}else{
   $head_id = '';
   header('location:login.php');
}

if(isset($_POST['submit'])){

   $id = unique_id();
   $status = $_POST['status'];
   $status = filter_var($status, FILTER_SANITIZE_STRING);
   $title = $_POST['title'];
   $title = filter_var($title, FILTER_SANITIZE_STRING);
   $description = $_POST['description'];
   $description = filter_var($description, FILTER_SANITIZE_STRING);
   $list = $_POST['list'];
   $list = filter_var($list, FILTER_SANITIZE_STRING);

   $thumb = $_FILES['thumb']['name'];
   $thumb = filter_var($thumb, FILTER_SANITIZE_STRING);
   $thumb_ext = pathinfo($thumb, PATHINFO_EXTENSION);
   $rename_thumb = unique_id().'.'.$thumb_ext;
   $thumb_size = $_FILES['thumb']['size'];
   $thumb_tmp_name = $_FILES['thumb']['tmp_name'];
   $thumb_folder = '../uploaded_files/'.$rename_thumb;

   $image = $_FILES['image']['name'];
   $image = filter_var($image, FILTER_SANITIZE_STRING);
   $image_ext = pathinfo($image, PATHINFO_EXTENSION);
   $rename_image = unique_id().'.'.$image_ext;
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = '../uploaded_files/'.$rename_image;

   if($thumb_size > 2000000){
      $message[] = 'image size is too large!';
   }else{
      $add_list = $conn->prepare("INSERT INTO `content`(id, head_id, list_id, title, description, image, thumb, status) VALUES(?,?,?,?,?,?,?,?)");
      $add_list->execute([$id, $head_id, $list, $title, $description, $rename_image, $rename_thumb, $status]);
      move_uploaded_file($thumb_tmp_name, $thumb_folder);
      move_uploaded_file($image_tmp_name, $image_folder);
      $message[] = 'new content uploaded!';
   }

   

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Brgy Hub Dashboard</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php'; ?>
   
<section class="image-form">

   <h1 class="heading">Upload content</h1>

   <form action="" method="post" enctype="multipart/form-data">
      <p>image status <span>*</span></p>
      <select name="status" class="box" required>
         <option value="" selected disabled>-- select status</option>
         <option value="active">active</option>
         <option value="deactive">deactive</option>
      </select>
      <p>image title <span>*</span></p>
      <input type="text" name="title" maxlength="100" required placeholder="enter image title" class="box">
      <p>image description <span>*</span></p>
      <textarea name="description" class="box" required placeholder="write description" maxlength="1000" cols="30" rows="10"></textarea>
      <p>image list <span>*</span></p>
      <select name="list" class="box" required>
         <option value="" disabled selected>--select list</option>
         <?php
         $select_lists = $conn->prepare("SELECT * FROM `list` WHERE head_id = ?");
         $select_lists->execute([$head_id]);
         if($select_lists->rowCount() > 0){
            while($fetch_list = $select_lists->fetch(PDO::FETCH_ASSOC)){
         ?>
         <option value="<?= $fetch_list['id']; ?>"><?= $fetch_list['title']; ?></option>
         <?php
            }
         ?>
         <?php
         }else{
            echo '<option value="" disabled>no list created yet!</option>';
         }
         ?>
      </select>
      <p>select thumbnail <span>*</span></p>
      <input type="file" name="thumb" accept="image/*" required class="box">
      <p>select image <span>*</span></p>
      <input type="file" name="image" accept="image/*" required class="box">
      <input type="submit" value="upload" name="submit" class="btn">
   </form>

</section>
















<script src="../js/admin_script.js"></script>

</body>
</html>