<?php
class DB{
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "homaroom_db";
    public $conn;

    function __construct(){
        // Kết nối đến MySQL sử dụng PDO
        try {
                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database, $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Kích hoạt chế độ báo lỗi
                return $this->conn;
            } catch (PDOException $e) {
                die("Kết nối Database thất bại: " . $e->getMessage());
            }
    }
}
?>