<?php
class CategoryManage extends Controller{
    public function Show(){
        $cate = $this->model("CategoriesModel");
        $this->view("Admin",[
            "Page"=>"CategoryManage",
            "Cate"=>$cate->getCate(),
            "catename" => "",
            "cateNameError" => "",
            "errorMessage" => ""
        ]);
    }
    public function insertcategory(){
        require_once "mvc/core/Validation.php";
        $cate = $this->model("CategoriesModel");
        // Kiểm tra lỗi validation
        if (!empty($cateNameError)) {
            $this->view("Admin", [
                "Page"=>"CategoryManage",
                "Cate"=>$cate->getCate(),
                "catename" => $catename,
                "cateNameError" => $cateNameError,
                "errorMessage" => ""
            ]);
            exit;
        }
        $isNameExists = $cate->insert($catename);
        if (!$isNameExists) {
            $this->view("Admin", [
                "Page"=>"CategoryManage",
                "Cate"=>$cate->getCate(),
                "catename" => $catename,
                "cateNameError" => "",
                "errorMessage" => "Tên danh mục đã tồn tại."
            ]);
        }
    }
    public function deletecategory($id){
        $cate = $this->model("CategoriesModel");
        $cate->delete($id);
    }
    public function updatecategory($id){
        $cate = $this->model("CategoriesModel");
        $cate->update($id);
    }
}
?>