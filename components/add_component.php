<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $postId = $_POST['post_id'];
    $commentText = $_POST['comment_text'];
    // Insert comment into the database
    $sql = "INSERT INTO comments (post_id, text) VALUES ($postId, '$commentText')";
    mysqli_query($conn, $sql);
    // Fetch the newly added comment
    $sql = "SELECT * FROM comments WHERE post_id = $postId ORDER BY created_at DESC LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    // Display the comment
    echo '<div class="comment">' . $row['text'] . '</div>';
} else {
    echo 'Error: Method not allowed';
}
?>
