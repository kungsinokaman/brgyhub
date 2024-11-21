<?php
// Include the database connection file
include '../components/connect4.php';

if(isset($_COOKIE['head_id'])){
   $head_id = $_COOKIE['head_id'];
}else{
   $head_id = '';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Brgy Activities</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">
   <style type="text/css">
   /* Style for the feed */
.post {
    border: 1px solid #ccc;
    padding: 10px;
    margin-bottom: 20px;
}

.post img {
    max-width: 100%;
    height: auto;
}

.post video {
    max-width: 100%;
    height: auto;
}

</style>
</head>
<body>
<?php include '../components/admin_header.php'; ?>

<?php
// Handle comment submission
if (isset($_POST['comment'])) {
    $post_id = $_POST['post_id'];
    $comment = $_POST['comment']; // No need to escape with PDO prepared statements
    // Insert comment into database
    $query = "INSERT INTO comments (post_id, comment) VALUES (:post_id, :comment)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':post_id', $post_id, PDO::PARAM_INT);
    $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
    $stmt->execute();
}

// Retrieve posts from the database
$query = "SELECT * FROM posts ORDER BY created_at DESC";
$stmt = $conn->query($query);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Display posts
foreach ($result as $row) {
    $post_id = $row['id'];
    $post_description = $row['description'];
    $post_image = $row['image'];
    $post_video = $row['video'];
    $post_likes = $row['likes'];

    // Output post HTML
    echo '<div class="post">';
    echo '<p>' . htmlspecialchars($post_description) . '</p>';
    if (!empty($post_image)) {
        echo '<img src="' . htmlspecialchars($post_image) . '" alt="Post Image">';
    }
    if (!empty($post_video)) {
        echo '<video controls><source src="' . htmlspecialchars($post_video) . '" type="video/mp4"></video>';
    }

    // Like button
    echo '<form method="post">';
    echo '<input type="hidden" name="post_id" value="' . $post_id . '">';
    echo '<button type="submit" name="like">Like (' . $post_likes . ')</button>';
    echo '</form>';

    // Comment section
    echo '<form method="post">';
    echo '<input type="hidden" name="post_id" value="' . $post_id . '">';
    echo '<textarea name="comment" placeholder="Write a comment"></textarea>';
    echo '<button type="submit">Submit</button>';
    echo '</form>';

    // Display comments
    $comment_query = "SELECT * FROM comments WHERE post_id = :post_id ORDER BY created_at DESC";
    $stmt = $conn->prepare($comment_query);
    $stmt->bindParam(':post_id', $post_id, PDO::PARAM_INT);
    $stmt->execute();
    $comment_result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo '<div class="comments">';
    foreach ($comment_result as $comment_row) {
        echo '<p>' . htmlspecialchars($comment_row['comment']) . '</p>';
    }
    echo '</div>';

    echo '</div>';
}

// Close the database connection
$conn = null;
?>
<script src="../js/script.js"></script>
</body>
</html>
