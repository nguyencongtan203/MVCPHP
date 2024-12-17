<?php
class Product extends Controller{
    public function Show(){
        $cate = $this->model("CategoriesModel");
        $product = $this->model("ProductsModel");
        $configdetail = $this->model("ConfigurationDetailsModel");
        $this->view("Home",[
            "Page"=>"Product",
            "Cate"=>$cate->getCate(),
            "Product"=>$product->getPro(),
            "ConfigDetail"=>$configdetail->getConfigDetail()
        ]);
    }

    public function search() {
        require_once "mvc/core/Validation.php";
        $cate = $this->model("CategoriesModel");
        $product = $this->model("ProductsModel");
        $configdetail = $this->model("ConfigurationDetailsModel");
        //Nếu không có thông báo lỗi
        if (empty($searchError)) {
            $searchTerm = trim($search);
            $pro = $product->search($searchTerm);

            $this->view("Home", [
                "Page" => "SearchProduct", 
                "Cate" => $cate->getCate(),
                "Product" => $pro,
                "ConfigDetail" => $configdetail->getConfigDetail()
            ]);
        } else {
            $this->view("Home", [
                "Page" => "Product",
                "Cate" => $cate->getCate(),
                "Product" => $product->getPro(),
                "ConfigDetail" => $configdetail->getConfigDetail()
            ]);
        }
    }

    public function showproduct($idcate){
        $idcate = intval($idcate);
        $cate = $this->model("CategoriesModel");
        $cateById = $cate->findCateById($idcate);
        $product = $this->model("ProductsModel");
        $productByCate = $product->getProductByCate($idcate);
        $configdetail = $this->model("ConfigurationDetailsModel");
        $this->view("Home",[
            "Page"=>"CateProduct",
            "Cate"=>$cate->getCate(),
            "cateById"=>$cateById,
            "Product"=>$productByCate,
            "ConfigDetail"=>$configdetail->getConfigDetail()
        ]);
    }
    
}
?>