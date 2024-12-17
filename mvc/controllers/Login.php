<?php
require_once "mvc/core/Session.php";

class Login extends Controller{
    public function Show(){
        $cate = $this->model("CategoriesModel");
        $this->view("LoginAndRegister",[
            "Page"=>"Login",
            "Cate"=>$cate->getCate(),
            "username" => "",
            "password" => "",
            "usernameError" => "",
            "passwordError" => "",
            "errorMessage" => ""
        ]);
    }

    public function authenticate() {
        require_once "mvc/core/Validation.php";

        $cate = $this->model("CategoriesModel");

        // Kiểm tra lỗi validation
        if (!empty($usernameError) || !empty($passwordError)) {
            $this->view("LoginAndRegister", [
                "Page" => "Login",
                "Cate" => $cate->getCate(),
                "username" => $username,
                "password" => $password,
                "usernameError" => $usernameError,
                "passwordError" => $passwordError,
                "errorMessage" => ""
            ]);
            exit;
        }

        $login = $this->model("LoginModel");
        $isAuthenticated = $login->run();
        //Thông báo đăng nhập không thành công
        if (!$isAuthenticated) {
            $this->view("LoginAndRegister", [
                "Page" => "Login",
                "Cate" => $cate->getCate(),
                "username" => $username,
                "password" => "",
                "usernameError" => "",
                "passwordError" => "",
                "errorMessage" => "Sai tài khoản hoặc mật khẩu."
            ]);
        }
    }

    function logout()
	{
        Session::init();
		Session::destroy();
		header('Location: ' . URL . 'login');
		exit;
	}

}
?>