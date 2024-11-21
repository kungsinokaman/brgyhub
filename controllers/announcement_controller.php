<?php
session_start(); // Start the session to use flash messages
require_once '../core/config.php';

class AnnouncementController extends Database
{
    private $settings;

    public function __construct(){
        global $_settings;
        $this->settings = $_settings;

        parent::__construct();
        ini_set('display_errors', 1); // Enable error display
    }

    public function store()
    {
        $message = $_POST['message'] ?? '';

        if (!empty($message)) {
            $stmt = $this->conn->prepare("INSERT INTO noticemsg (message) VALUES (?)");
            $stmt->bind_param('s', $message);

            if ($stmt->execute()) {
                $_SESSION['flash_message'] = 'Announcement Successfully Created';
            } else {
                $_SESSION['flash_message'] = 'Error creating announcement';
            }

            $stmt->close();
        } else {
            $_SESSION['flash_message'] = 'Message cannot be empty';
        }

        header("Location: ../admin/announcements.php");
        exit(); // Terminate the script to prevent further execution
    }

    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM noticemsg WHERE id = ?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            $_SESSION['flash_message'] = 'Announcement Successfully Deleted';
        } else {
            $_SESSION['flash_message'] = 'Error when deleting announcement';
        }

        $stmt->close();
        header("Location: ../admin/announcements.php");
        exit(); // Terminate the script to prevent further execution
    }
}

$action = $_GET['action'] ?? '';
$announcementController = new AnnouncementController();

switch ($action) {
    case 'store':
        $announcementController->store();
        break;
    case 'delete':
        $id = $_GET['id'] ?? null;
        if ($id) {
            $announcementController->delete($id);
        }
        break;
    default:
        // code...
        break;
}
