<?php
ob_start();
ini_set('date.timezone','Asia/Manila');
date_default_timezone_set('Asia/Manila');
session_start();

require_once __DIR__ . '/initialize.php';
require_once __DIR__ . '/database.php';
require_once __DIR__ . '/../models/community.php';
require_once __DIR__ . '/../models/user.php';
require_once __DIR__ . '/../models/message.php';

$db = new Database;
$conn = $db->conn;

class DBQuery extends Database
{
	private $settings;

	public function __construct() {
		global $_settings;
		$this->settings = $_settings;

		parent::__construct();
		ini_set('display_error', 1);
	}

	public function getUser(): User
	{
	    $stmt = $this->conn->prepare("SELECT * FROM `users` WHERE id = ?");
	    $stmt->bind_param('i', $_COOKIE['user_id']);
	    $stmt->execute();
	    $result = $stmt->get_result();

	    $result = $result->fetch_assoc();

	    if ($result === null) {
	        throw new Exception('User not found or invalid result.');
	    }

	    $user = new User($result['image'], $result['name']);
	    $stmt->close();
	    return $user;
	}

	public function getCommunityPosts(): array
	{
		$communityPosts = [];
		$query = 'SELECT * FROM images';
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		$result = $stmt->get_result();
		$resultPosts = $result->fetch_all(MYSQLI_ASSOC);
		foreach ($resultPosts as $post) {
			array_push($communityPosts, new Community($post['image_path'], $post['description']));
		}
		$stmt->close();
		return $communityPosts;
	}

	public function getMessages(): array
{
    $messages = [];
    $query = 'SELECT * FROM noticemsg ORDER BY id DESC'; // Order by latest first
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    $resultMessages = $result->fetch_all(MYSQLI_ASSOC);
    
    foreach ($resultMessages as $mesage) {
        array_push($messages, new Message($mesage['message']));
    }
    
    $stmt->close();
    return $messages;
}

}

$DBQuery = new DBQuery();