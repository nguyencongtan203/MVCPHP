<?php
class Admin extends Controller{
    public function __construct() {
        session_start();
    }

    public function Show(){
        if (!isset($_SESSION["role"]) || $_SESSION["role"] === "user") {
            echo "Bạn không có quyền truy cập vào trang Admin.";
            exit;
        }

        $this->view("Admin", [
            "Page" => "Admin",
        ]);
    }
}
?>