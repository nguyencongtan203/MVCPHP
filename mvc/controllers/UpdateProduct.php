<?php
class UpdateProduct extends Controller{
    public function showformupdate($id) {
        $cate = $this->model("CategoriesModel");
        $product = $this->model("ProductsModel");
        $productDetail = $product->getProductById($id); // Lấy chi tiết sản phẩm theo ID
    
        $this->view("Admin", [
            "Page" => "UpdateProduct",
            "Cate" => $cate->getCate(),
            "Pro" => $productDetail,
            "nameproductError" => "",
            "priceproductError" => "",
            "categoryError" => "",
            "imageError" => "",
            "errorMessage" => ""
        ]);
        exit;
    }
    public function updateproduct($id,$image){
        require_once "mvc/core/ValidationProduct.php";
        $cate = $this->model("CategoriesModel");
        $product = $this->model("ProductsModel");
        $productDetail = $product->getProductById($id);
        if(!empty($nameproductError)||!empty($priceproductError)||!empty($categoryError)||!empty($imageError)){
            $this->view("Admin",[
                "Page"=>"UpdateProduct",
                "Cate"=>$cate->getCate(),
                "Pro"=>$productDetail,
                "nameproductError"=>$nameproductError,
                "priceproductError"=>$priceproductError,
                "categoryError"=>$categoryError,
                "imageError"=>$imageError,
                "errorMessage"=>""
            ]);
            exit;
        }
        $isNameExists=$product->update($id,$image);
        if(!$isNameExists){
            $this->view("Admin",[
                "Page"=>"UpdateProduct",
                "Cate"=>$cate->getCate(),
                "Pro"=>$productDetail,
                "nameproductError"=>"",
                "priceproductError"=>"",
                "categoryError"=>"",
                "imageError"=>"",
                "errorMessage"=>"Tên sản phẩm đã tồn tại."
            ]);
        }
    }
}
?>