<?php
session_start();

include("../components/connect.php");
if(isset($_COOKIE['head_id'])){
   $head_id = $_COOKIE['head_id'];
}else{
   $head_id = '';
}

// Retrieve users from the database
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

// Close the database connection by setting it to null
// Comment out or remove this line, as it's closing the connection before executing the query
// $conn = null;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USERS</title>
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../css/userstyle.css">
    <link rel="stylesheet" href="../css/admin_style.css">
</head>

    <style>
        .print-button {
            background-color: #ff0000; 
            padding: 5px;
            color: white; /* White text */
            border: none; /* Remove borders */
            border-radius: 5px; /* Rounded corners */
            cursor: pointer; /* Pointer/hand icon on hover */
            font-size: 16px; /* Increase font size */
        }

        .print-button:hover {
            background-color: #45a049; /* Darker green on hover */
        }
    </style>

<body>
    <?php include '../components/admin_header.php'; ?>


    <section id="content" class="community">
        <h2 class="heading">User Logs</h2>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <!-- Add more table headings if needed -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->rowCount() > 0) {
                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                            echo "<tr>";
                            echo "<td>" . $row["id"] . "</td>";
                            echo "<td>" . $row["name"] . "</td>";
                            echo "<td>" . $row["email"] . "</td>";
                            
                        }
                    } else {
                        echo "<tr><td colspan='3'>No users found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>

</body>
<script src="js/script.js"></script>
</html>
