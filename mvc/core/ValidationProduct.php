<?php
$nameproduct = $priceproduct = $category = $imageproduct = "";
$nameproductError = $priceproductError = $categoryError = $imageError = "";

if(isset($_POST['insertproduct'])||isset($_POST['updateproduct'])){
    $nameproduct = isset($_POST['nameproduct']) ? trim($_POST['nameproduct']) : "";
    $priceproduct = isset($_POST['priceproduct']) ? trim($_POST['priceproduct']) : "";
    $category = isset($_POST['category']) ? trim($_POST['category']) : "";
    $imageproduct = isset($_FILES['imageproduct']['name']) ? trim($_FILES['imageproduct']['name']) : "";
    $priceproduct = intval($priceproduct);
    $category = intval($category);

    $nameproductError = validname($nameproduct);
    $priceproductError = validprice($priceproduct);
    $categoryError = validcate($category);
    $imageError = validimage($imageproduct);
}

function validname($nameproduct){
    if (empty($nameproduct)) {
        return "Name không được để trống.";
    }
    return "";
}
function validprice($priceproduct){
    if (empty($priceproduct)) {
        return "Price không được để trống.";
    }
    if($priceproduct < 0){
        return "Price không được âm.";
    }
    return "";
}
function validcate($category){
    if($category <= 0){
        return "Chưa chọn category.";
    }
    return "";
}
function validimage($imageproduct){
    if (empty($imageproduct)) {
        return "Chưa tải ảnh.";
    }
    else{
        $targetDir = $_SERVER['DOCUMENT_ROOT'] . "/MVCPHP/public/images/";
        $targetFile = $targetDir . basename($imageproduct);
        $imageType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));
        if($imageType != "jpg"&&$imageType != "png"&&$imageType != "jpeg"){
            return "Chỉ tải file jpg, png và jpeg.";
        }
    }
}
?>