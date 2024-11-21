<?php
if(!defined('DB_SERVER')){
    require_once("initialize.php");
}
class Database {

    private $host = "127.0.0.1:3325"; // DB_SERVER 
                                      // PORT
                                      // 3306 = MySQL Workbench
                                      // 3325 = Xampp MySQL  
    private $username = DB_USERNAME;
    private $password = DB_PASSWORD;
    private $database = DB_NAME;
    
    public $conn;
    
    public function __construct(){

        if (!isset($this->conn)) {
            
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
            
            if (!$this->conn) {
                echo 'Cannot connect to database server';
                exit;
            }            
        }    
        
    }
    public function __destruct(){
        $this->conn->close();
    }
}
?>