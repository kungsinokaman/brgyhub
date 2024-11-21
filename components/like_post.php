<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $postId = $_POST['post_id'];
    // Update likes count in the database
    $sql = "UPDATE posts SET likes = likes + 1 WHERE id = $postId";
    mysqli_query($conn, $sql);
    // Fetch updated likes count
    $sql = "SELECT likes FROM posts WHERE id = $postId";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    echo $row['likes'];
} else {
    echo 'Error: Method not allowed';
}
?>
