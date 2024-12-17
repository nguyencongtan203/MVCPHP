<?php
require_once "mvc/core/Session.php";
class LoginModel extends DB{
    public function __construct(){
		parent::__construct();
		Session::init();
	}

    public function run(){
        $username = $_POST["username"];
        $password = md5($_POST["password"]);
        // Viết câu truy vấn
        $sql = "SELECT * FROM users WHERE username = '".$username."' AND password = '".$password."'";

        // Chuẩn bị và thực thi truy vấn
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        // Lấy kết quả và trả về
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($result){
            Session::init();
            Session::set('role', $result[0]['role']);
            Session::set('loggedIn', true);
            Session::set('username', $username);
            Session::set('password', $result[0]['password']);
            if($result[0]['role']=='user'){
                header('location: '.URL.'home');
            } else if($result[0]['role']=='admin'){
                header('location: '.URL.'admin');
            }
            
        }else {
            return false;
		}
    }
}
?>
