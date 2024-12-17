<?php
require_once "mvc/core/Session.php";
class RegisterModel extends DB{
    public function __construct(){
		parent::__construct();
		Session::init();
	}

    public function isUsernameExists($username) {
        $sql = "SELECT * FROM users WHERE username = :username";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        // Nếu có kết quả, username đã tồn tại
        if ($stmt->rowCount() > 0) {
            return true;
        }
        return false;
    }

    public function run(){
        $username = $_POST["username"];
        $password = md5($_POST["password"]);
        $role = 'user';

        // Kiểm tra username đã tồn tại
        if ($this->isUsernameExists($username)) {
            return false;
        }

        // Viết câu truy vấn
        $sql = "INSERT INTO users (username, password, role) VALUES ('" . $username . "', '" . $password . "', '" . $role . "')";

        // Chuẩn bị và thực thi truy vấn
        $stmt = $this->conn->prepare($sql);

        if($stmt->execute()){
            header('location: ' . URL . 'login');
        }else {
            return false;
		}
    }
}
?>
