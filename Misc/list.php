<?php

include '../components/connect.php';

if(isset($_COOKIE['head_id'])){
   $head_id = $_COOKIE['head_id'];
}else{
   $head_id = '';
   header('location:login.php');
}

if(isset($_POST['delete'])){
   $delete_id = $_POST['list_id'];
   $delete_id = filter_var($delete_id, FILTER_SANITIZE_STRING);

   $verify_list = $conn->prepare("SELECT * FROM `list` WHERE id = ? AND head_id = ? LIMIT 1");
   $verify_list->execute([$delete_id, $head_id]);

   if($verify_list->rowCount() > 0){

   

   $delete_list_thumb = $conn->prepare("SELECT * FROM `list` WHERE id = ? LIMIT 1");
   $delete_list_thumb->execute([$delete_id]);
   $fetch_thumb = $delete_list_thumb->fetch(PDO::FETCH_ASSOC);
   unlink('../uploaded_files/'.$fetch_thumb['thumb']);
   $delete_bookmark = $conn->prepare("DELETE FROM `bookmark` WHERE list_id = ?");
   $delete_bookmark->execute([$delete_id]);
   $delete_list = $conn->prepare("DELETE FROM `list` WHERE id = ?");
   $delete_list->execute([$delete_id]);
   $message[] = 'list deleted!';
   }else{
      $message[] = 'list already deleted!';
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Lists</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php'; ?>

<section class="lists">

   <h1 class="heading">added lists</h1>

   <div class="box-container">
   
      <div class="box" style="text-align: center;">
         <h3 class="title" style="margin-bottom: .5rem;">create new list</h3>
         <a href="add_list.php" class="btn">add list</a>
      </div>

      <?php
         $select_list = $conn->prepare("SELECT * FROM `list` WHERE head_id = ? ORDER BY date DESC");
         $select_list->execute([$head_id]);
         if($select_list->rowCount() > 0){
         while($fetch_list = $select_list->fetch(PDO::FETCH_ASSOC)){
            $list_id = $fetch_list['id'];
            $count_images = $conn->prepare("SELECT * FROM `content` WHERE list_id = ?");
            $count_images->execute([$list_id]);
            $total_images = $count_images->rowCount();
      ?>
      <div class="box">
         <div class="flex">
            <div><i class="fas fa-circle-dot" style="<?php if($fetch_list['status'] == 'active'){echo 'color:limegreen'; }else{echo 'color:red';} ?>"></i><span style="<?php if($fetch_list['status'] == 'active'){echo 'color:limegreen'; }else{echo 'color:red';} ?>"><?= $fetch_list['status']; ?></span></div>
            <div><i class="fas fa-calendar"></i><span><?= $fetch_list['date']; ?></span></div>
         </div>
         <div class="thumb">
            <span><?= $total_images; ?></span>
            <img src="../uploaded_files/<?= $fetch_list['thumb']; ?>" alt="">
         </div>
         <h3 class="title"><?= $fetch_list['title']; ?></h3>
         <p class="description"><?= $fetch_list['description']; ?></p>
         <form action="" method="post" class="flex-btn">
            <input type="hidden" name="list_id" value="<?= $list_id; ?>">
            <a href="update_list.php?get_id=<?= $list_id; ?>" class="option-btn">update</a>
            <input type="submit" value="delete" class="delete-btn" onclick="return confirm('delete this list?');" name="delete">
         </form>
         <a href="view_list.php?get_id=<?= $list_id; ?>" class="btn">view list</a>
      </div>
      <?php
         } 
      }else{
         echo '<p class="empty">no list added yet!</p>';
      }
      ?>

   </div>

</section>














<script src="../js/admin_script.js"></script>

<script>
   document.querySelectorAll('.lists .box-container .box .description').forEach(content => {
      if(content.innerHTML.length > 100) content.innerHTML = content.innerHTML.slice(0, 100);
   });
</script>

</body>
</html>