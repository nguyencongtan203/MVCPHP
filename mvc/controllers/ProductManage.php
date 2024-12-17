<?php
class ProductManage extends Controller{
    public function Show(){
        $cate = $this->model("CategoriesModel");
        $product = $this->model("ProductsModel");
        $this->view("Admin",[
            "Page"=>"ProductManage",
            "Cate"=>$cate->getCate(),
            "Pro"=>$product->getPro(),
            "nameproductError"=>"",
            "priceproductError"=>"",
            "categoryError"=>"",
            "imageError"=>"",
            "errorMessage"=>""
        ]);
        exit;
    }
    public function insertproduct(){
        require_once "mvc/core/ValidationProduct.php";
        $cate = $this->model("CategoriesModel");
        $product = $this->model("ProductsModel");
        if(!empty($nameproductError)||!empty($priceproductError)||!empty($categoryError)||!empty($imageError)){
            $this->view("Admin",[
                "Page"=>"ProductManage",
                "Cate"=>$cate->getCate(),
                "Pro"=>$product->getPro(),
                "nameproductError"=>$nameproductError,
                "priceproductError"=>$priceproductError,
                "categoryError"=>$categoryError,
                "imageError"=>$imageError,
                "errorMessage"=>""
            ]);
            exit;
        }
        $isNameExists=$product->insert();
        if(!$isNameExists){
            $this->view("Admin",[
                "Page"=>"ProductManage",
                "Cate"=>$cate->getCate(),
                "Pro"=>$product->getPro(),
                "nameproductError"=>"",
                "priceproductError"=>"",
                "categoryError"=>"",
                "imageError"=>"",
                "errorMessage"=>"Tên sản phẩm đã tồn tại."
            ]);
        }
    }
    public function deleteproduct($id,$image){
        $cate = $this->model("ProductsModel");
        $cate->delete($id,$image);
    }
}
?>