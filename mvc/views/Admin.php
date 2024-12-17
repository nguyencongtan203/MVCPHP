<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOMAROOM</title>
    <link rel="stylesheet" href="/MVCPHP/public/styles/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="/MVCPHP/public/styles/style.css">
</head>

<body>
    <?php
        $session = null;
    // Kiểm tra nếu session chưa được khởi tạo, thì bắt đầu session
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Kiểm tra và lấy giá trị username từ session nếu tồn tại
    $session = isset($_SESSION["username"]) ? $_SESSION["username"] : null;
    ?>
    <script src="/MVCPHP/public/scripts/jquery-3.7.1.min.js"></script>
    <script src="/MVCPHP/public/scripts/jquery-ui.min.js"></script>
    <script src="/MVCPHP/public/scripts/popper.min.js"></script>
    <script src="/MVCPHP/public/scripts/bootstrap/bootstrap.js"></script>
    <script src="/MVCPHP/public/scripts/animation.js"></script>


    <main class="d-grid container-main no-slide-bar position-relative">
        <?php require_once "mvc/views/block/HeaderMenuAdmin.php" ?>

        <?php require_once "mvc/views/pages/".$data["Page"].".php" ?>

    </main>
</body>

</html>