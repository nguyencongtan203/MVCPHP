<?php
class ConfigurationDetailManage extends Controller{
    public function Show($id){
        $product = $this->model("ProductsModel");
        $productcurrent = $product->getProductById($id);
        $config = $this->model("ConfigurationDetailsModel");
        $configdetail = $config->getConfigById($id);
        $configs = $this->model("ConfigurationsModel");

        $this->view("Admin",[
            "Page"=>"ConfigurationDetailManage",
            "productcurrent"=>$productcurrent,
            "configdetail"=> $configdetail,
            "configs"=>$configs->getCofig(),
            "brand"=>"",
            "code"=>"",
            "describe"=>"",
            "size"=>"",
            "material"=>"",
            "color"=>"",
            "feature"=>"",
            "guarantee"=>"",
            "brandError"=>"",
            "codeError"=>"",
            "describeError"=>"",
            "sizeError"=>"",
            "materialError"=>"",
            "colorError"=>"",
            "featureError"=>"",
            "guaranteeError"=>"",
        ]);
    }

    public function updateconfigdetail($id){
        require_once "mvc/core/ValidationConfigDetail.php";

        $product = $this->model("ProductsModel");
        $productcurrent = $product->getProductById($id);
        $config = $this->model("ConfigurationDetailsModel");
        $configdetail = $config->getConfigById($id);
        $configs = $this->model("ConfigurationsModel");

        if(!empty($brandError) || !empty($codeError) 
            || !empty($describeError) || !empty($sizeError) 
            || !empty($materialError) || !empty($colorError) 
            || !empty($featureError) || !empty($guaranteeError)){
                $this->view("Admin",[
                    "Page"=>"ConfigurationDetailManage",
                    "productcurrent"=>$productcurrent,
                    "configdetail"=> $configdetail,
                    "configs"=>$configs->getCofig(),
                    "brand"=>$brand,
                    "code"=>$code,
                    "describe"=>$describe,
                    "size"=>$size,
                    "material"=>$material,
                    "color"=>$color,
                    "feature"=>$feature,
                    "guarantee"=>$guarantee,
                    "brandError"=>$brandError,
                    "codeError"=>$codeError,
                    "describeError"=>$describeError,
                    "sizeError"=>$sizeError,
                    "materialError"=>$materialError,
                    "colorError"=>$colorError,
                    "featureError"=>$featureError,
                    "guaranteeError"=>$guaranteeError
                ]);
                exit;
        }
        $config->update($id);
    }
    public function deleteconfigdetail($id){
        $config = $this->model("ConfigurationDetailsModel");
        $config->delete($id);
    }
}
?>