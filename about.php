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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style3.css">
   <link rel="stylesheet" href="css/style.css">

   <style>
       .images {
           text-align: center;
       }
       .images img {
           width: 100%;
           max-width: 600px;
           margin: 20px auto;
           display: block;
       }
   </style>
</head>
<body>
    <?php include 'components/user_header.php'; ?>
    <div class="about-us">
        <h2>Our Barangay Officials</h2>

        <br>
        <h2>Lopez Jaena Street, located in Barangay Lopez Jaena, is a vibrant and close-knit community known for its warm and friendly residents. The area features a mix of residential homes, small businesses, and local establishments, reflecting the simple yet bustling life of the barangay</h2>
        <br><br>

        <!-- Inserted Images -->
        <div class="images">
            <img src="uploaded_files/chart.jpg" alt="Barangay Organizational Chart" style="width:100%; max-width:600px; margin-bottom: 20px;">
            <img src="uploaded_files/map.png" alt="Map of Barangay Lopez Jaena" style="width:100%; max-width:600px;">
        </div>
        

        <!-- Organizational Chart -->
        <!-- <div class="organizational-chart">
            <div class="official">
                <img src="bryl.jpg" alt="Bryl Cedric Gumban">
                <h3>Barangay Captain - Bryl Cedric Gumban</h3>
                <p>Bryl Cedric Gumban is our dedicated Barangay Captain who leads the community with passion and commitment.</p>
            </div>
            <div class="official">
                <img src="renald.jpg" alt="Renald Capillo">
                <h3>Barangay Secretary - Renald Capillo</h3>
                <p>Renald Capillo serves as our Barangay Secretary, ensuring efficient administrative support for our barangay.</p>
            </div>
            <div class="official">
                <img src="cj.jpg" alt="CJ Funa">
                <h3>Barangay Treasurer - CJ Funa</h3>
                <p>CJ Funa manages the barangay finances with transparency and accountability.</p>
            </div>
            <div class="official">
                <img src="dazel.jpg" alt="Dazel Dane Lee R. Palo">
                <h3>Barangay Kagawad - Dazel Dane Lee R. Palo</h3>
                <p>Dazel Dane Lee R. Palo is one of our Barangay Kagawads, dedicated to serving the needs of our community.</p>
            </div>
        </div> -->

        <!-- Contact Information -->
        <div class="contact-us">
            <h3>Contact Us</h3>
            <p>For inquiries, please call: 09384107657</p>
        </div>
    </div>
    <script src="js/script.js"></script>
</body>
</html>
