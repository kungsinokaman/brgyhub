<?php
require_once 'core/config.php';
include 'components/connect2.php';

if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
} else {
    $user_id = '';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User View</title>
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="user.css"> -->
    <style>
        /* Modernized gallery styles */
        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            padding: 20px;
            box-sizing: border-box;
        }

        .gallery-item {
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .gallery-item:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .gallery-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .gallery-item-content {
            padding: 15px;
        }

        .gallery-item-content h3 {
            margin: 0 0 10px;
            font-size: 1.2em;
            color: #333;
        }

        .gallery-item-content p {
            margin: 0;
            color: #666;
            line-height: 1.5;
        }
    </style>
</head>

<body>

    <?php require_once 'components/user_header.php'; ?>
    <section class="community">
        <h1 class="heading">Community Updates</h1>
        <div class="gallery">
            <?php foreach ($DBQuery->getCommunityPosts() as $post) : ?>
                <!-- Modernized gallery item -->
                <div class="gallery-item">
                    <img src="<?= htmlspecialchars($post->getImage()) ?>" alt="">
                    <div class="gallery-item-content">
                        <h1><?= htmlspecialchars($post->getDescription()) ?></h1>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </section>
    <script src="js/script.js"></script>
</body>

</html>
