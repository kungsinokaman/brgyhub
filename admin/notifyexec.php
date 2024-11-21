<?php
// Include the database connection file
include('../components/connect2.php'); // Make sure the path to connect2.php is correct

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the message from the form
    $message = isset($_POST['message']) ? $_POST['message'] : '';

    // Check if the message is not empty
    if (!empty($message)) {
        try {
            // Prepare an SQL statement for inserting the message
            $stmt = $conn->prepare("INSERT INTO noticemsg (message) VALUES (:message)");

            // Bind the message parameter
            $stmt->bindParam(':message', $message);

            // Execute the statement
            $stmt->execute();

            // Success: Display a success message (you can redirect or display a success page)
            echo "Announcement sent successfully.";

        } catch (PDOException $e) {
            // Handle database insertion error
            echo "Error: " . $e->getMessage();
        }
    } else {
        // Handle empty message
        echo "Error: Message cannot be empty.";
    }
} else {
    // Handle invalid request method
    echo "Error: Invalid request method.";
}
?>
