<?php
$brand = $code = $describe = $size = $material = $color = $feature = $guarantee = "";
$brandError = $codeError = $describeError = $sizeError = 
$materialError = $colorError = $featureError = $guaranteeError = "";

if(isset($_POST["updateconfigdetail"])){
    $brand = isset($_POST['brand']) ? trim($_POST['brand']) : "";
    $code = isset($_POST['code']) ? trim($_POST['code']) : "";
    $describe = isset($_POST['describe']) ? trim($_POST['describe']) : "";
    $size = isset($_POST['size']) ? trim($_POST['size']) : "";
    $material = isset($_POST['material']) ? trim($_POST['material']) : "";
    $color = isset($_POST['color']) ? trim($_POST['color']) : "";
    $feature = isset($_POST['feature']) ? trim($_POST['feature']) : "";
    $guarantee = isset($_POST['guarantee']) ? trim($_POST['guarantee']) : "";

    $brandError = validbrand($brand);
    $codeError = validcode($code);
    $describeError = validdescribe($describe);
    $sizeError = validsize($size);
    $materialError = validmaterial($material);
    $colorError = validcolor($color);
    $featureError = validfeature($feature);
    $guaranteeError = validguarantee($guarantee);
}
function validbrand($brand){
    if (empty($brand)) {
        return "Thương hiệu không được để trống.";
    }
    return "";
}
function validcode($code){
    if (empty($code)) {
        return "Mã không được để trống.";
    }
    return "";
}
function validdescribe($describe){
    if (empty($describe)) {
        return "Mô tả không được để trống.";
    }
    return "";
}
function validsize($size){
    if (empty($size)) {
        return "Kích thước không được để trống.";
    }
    return "";
}
function validmaterial($material){
    if (empty($material)) {
        return "Chất liệu không được để trống.";
    }
    return "";
}
function validcolor($color){
    if (empty($color)) {
        return "Màu sắc không được để trống.";
    }
    return "";
}
function validfeature($feature){
    if (empty($feature)) {
        return "Tính năng không được để trống.";
    }
    return "";
}
function validguarantee($guarantee){
    if (empty($guarantee)) {
        return "Bảo hành không được để trống.";
    }
    return "";
}
?>