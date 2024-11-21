<?php 
include 'components/connect.php';
?>

<header class="header">

   <section class="flex">

      <a href="communities.php" class="logo">BARANGAY HUB</a>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="search-btn" class="fas fa-search"></div>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="profile">
      <?php
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            if($select_profile->rowCount() > 0){
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <img src="uploaded_files/<?= $fetch_profile['image']; ?>" alt="">
         <h3><?= $fetch_profile['name']; ?></h3>
         <span>student</span>
         <a href="components/user_logout.php" onclick="return confirm('logout from this website?');" class="delete-btn">logout</a>
         <?php
            }
         ?>
      </div>

   </section>

</header>


<div class="side-bar">

   <div class="close-side-bar">
      <i class="fas fa-times"></i>
   </div>

   <div class="profile">
         <?php
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            if($select_profile->rowCount() > 0){
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <img src="uploaded_files/<?= $fetch_profile['image']; ?>" alt="">
         <h3><?= $fetch_profile['name']; ?></h3>
         <span>Resident</span>
         <?php
            }
         ?>
      </div>

   <nav class="navbar">
      <a href="communities.php"><i class="fas fa-home"></i><span>COMMUNITY</span></a>
      <a href="residents.php"><i class="fas fa-exchange-alt"></i><span>ANNOUNCEMENT</span></a>
      <a href="files.php"><i class="fas fa-book"></i><span>FORMS</span></a>
      <a href="chats.php"><i class="fas fa-headset"></i><span>CHATS</span></a>
      <a href="about.php"><i class="fa fa-question
      "></i><span>ABOUT US</span></a>
   </nav>

</div>
