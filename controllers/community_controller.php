<?php
require_once '../core/config.php';

/**
 * 
 */
class CommunityController extends Database
{
    private $settings;

    public function __construct(){
        global $_settings;
        $this->settings = $_settings;

        parent::__construct();
        ini_set('display_errors', 1); // Fixed typo: 'display_error' -> 'display_errors'
    }

    public function store()
    {
        // Define the directory to store the image on the server
        $uploadDir = COMMUNITY_POSTS;

        // Generate a unique filename to avoid overwriting
        $uniqueFileName = uniqid() . '.' . strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));
        $target_file = $uploadDir . $uniqueFileName;

        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            $uploadOk = $check !== false ? 1 : 0;

            if (!$uploadOk) {
                exit("File is not an image.");
            }
        }

        if (file_exists($target_file)) {
            exit("Sorry, file already exists.");
        }

        if ($_FILES["image"]["size"] > 500000000) {
            exit("Sorry, your file is too large.");
        }

        $allowedFormats = ["jpg", "jpeg", "png", "gif"];
        if (!in_array($imageFileType, $allowedFormats)) {
            exit("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
        }

        if ($uploadOk === 0) {
            exit("Sorry, your file was not uploaded.");
        }

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $description = $_POST['description'];
            
            // Store the relative path in the database
            $relativePath = 'storage/community_post_images/' . $uniqueFileName;

            $stmt = $this->conn->prepare("INSERT INTO images (image_path, description) VALUES (?, ?)");
            $stmt->bind_param("ss", $relativePath, $description);

            if ($stmt->execute()) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

// Initialize and handle the action
$communityController = new CommunityController();
$action = isset($_GET['action']) ? $_GET['action'] : null;

switch ($action) {
    case 'store':
        $communityController->store();
        break;

    default:
        // default code or action
        break;
}
