<?php
class Register extends Controller{
    public function Show(){
        $cate = $this->model("CategoriesModel");
        $this->view("LoginAndRegister",[
            "Page"=>"Register",
            "Cate"=>$cate->getCate(),
            "username" => "",
            "password" => "",
            "confirmpass" => "",
            "usernameError" => "",
            "passwordError" => "",
            "confirmPassError" => "",
            "userExisted" => ""
        ]);
    }
    public function validform(){
        require_once "mvc/core/Validation.php";

        $cate = $this->model("CategoriesModel");

        // Kiểm tra lỗi validation
        if (!empty($usernameError) || !empty($passwordError) || !empty($confirmPassError)) {
            $this->view("LoginAndRegister", [
                "Page" => "Register",
                "Cate" => $cate->getCate(),
                "username" => $username,
                "password" => $password,
                "confirmpass" => $confirmpass,
                "usernameError" => $usernameError,
                "passwordError" => $passwordError,
                "confirmPassError" => $confirmPassError,
                "userExisted" => ""
            ]);
            exit;
        }
        $register = $this->model("RegisterModel");
        $isUsernameExisted = $register->run($username);
        if(!$isUsernameExisted){
            $this->view("LoginAndRegister", [
                "Page" => "Register",
                "Cate" => $cate->getCate(),
                "username" => $username,
                "password" => $password,
                "confirmpass" => $confirmpass,
                "usernameError" => "",
                "passwordError" => "",
                "confirmPassError" => "",
                "userExisted" => "Tên người dùng đã tồn tại"
            ]);
            exit;
        }
    }
}
?>