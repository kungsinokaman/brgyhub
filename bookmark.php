<?php

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
   header('location:home.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>bookmarks</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php include 'components/user_header.php'; ?>

<section class="community">

   <h1 class="heading">bookmarked lists</h1>

   <div class="box-container">

      <?php
         $select_bookmark = $conn->prepare("SELECT * FROM `bookmark` WHERE user_id = ?");
         $select_bookmark->execute([$user_id]);
         if($select_bookmark->rowCount() > 0){
            while($fetch_bookmark = $select_bookmark->fetch(PDO::FETCH_ASSOC)){
               $select_community = $conn->prepare("SELECT * FROM `list` WHERE id = ? AND status = ? ORDER BY date DESC");
               $select_community->execute([$fetch_bookmark['list_id'], 'active']);
               if($select_community->rowCount() > 0){
                  while($fetch_community = $select_community->fetch(PDO::FETCH_ASSOC)){

                  $community_id = $fetch_community['id'];

                  $select_head = $conn->prepare("SELECT * FROM `head` WHERE id = ?");
                  $select_head->execute([$fetch_community['head_id']]);
                  $fetch_head = $select_head->fetch(PDO::FETCH_ASSOC);
      ?>
      <div class="box">
         <div class="head">
            <img src="uploaded_files/<?= $fetch_head['image']; ?>" alt="">
            <div>
               <h3><?= $fetch_head['name']; ?></h3>
               <span><?= $fetch_community['date']; ?></span>
            </div>
         </div>
         <img src="uploaded_files/<?= $fetch_community['thumb']; ?>" class="thumb" alt="">
         <h3 class="title"><?= $fetch_community['title']; ?></h3>
         <a href="list.php?get_id=<?= $community_id; ?>" class="inline-btn">view list</a>
      </div>
      <?php
               }
            }else{
               echo '<p class="empty">no community topics found!</p>';
            }
         }
      }else{
         echo '<p class="empty">nothing bookmarked yet!</p>';
      }
      ?>

   </div>

</section>











<!-- custom js file link  -->
<script src="js/script.js"></script>
   
</body>
</html>