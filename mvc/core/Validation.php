<?php
$username = "";
$password = "";
$confirmpass = "";
$catename= "";
$search = "";
$usernameError = $passwordError = $confirmPassError = $cateNameError = $searchError = "";

// Kiểm tra nếu nhấn nút REGISTER và LOGIN
if (isset($_POST['register']) || isset($_POST['login']) || isset($_POST['insertcate']) || isset($_POST["searchproduct"])) {
    $username = isset($_POST['username']) ? trim($_POST['username']) : "";
    $password = isset($_POST['password']) ? trim($_POST['password']) : "";
    $confirmpass = isset($_POST['confirmpass']) ? trim($_POST['confirmpass']) : "";
    $catename = isset($_POST['catename']) ? trim($_POST['catename']) : "";
    $search = isset($_POST['search']) ? trim($_POST['search']) : "";

    // Gọi hàm kiểm tra và lưu thông báo lỗi
    $usernameError = validateUsername($username);
    $passwordError = validatePassword($password);
    $confirmPassError = validateConfirmPassword($password, $confirmpass);
    $cateNameError = validateCateName($catename);
    $searchError = validateSearch($search);
}

// Hàm kiểm tra Username
function validateUsername($username) {
    if (empty($username)) {
        return "Username không được để trống.";
    }
    return "";
}

// Hàm kiểm tra Password
function validatePassword($password) {
    if (empty($password)) {
        return "Password không được để trống.";
    }
    return "";
}

// Hàm kiểm tra Confirm Password
function validateConfirmPassword($password, $confirmpass) {
    if (empty($confirmpass)) {
        return "Confirm Password không được để trống.";
    }
    if ($password !== $confirmpass) {
        return "Password và Confirm Password không khớp.";
    }
    return "";
}
function validateCateName($catename){
    if (empty($catename)) {
        return "Cate name không được để trống.";
    }
    return "";
}
function validateSearch($search){
    if (empty($search)) {
        return "chua co thong tin";
    }
    return "";
}
?>
