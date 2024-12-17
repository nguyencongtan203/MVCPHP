<!-- LOGO BEGIN -->
<div class="container-child container-child-logo">
    <div class="d-flex p-2">
        <img src="/MVCPHP/public/images/logo.png" alt="">
        <div>
            <h1> SHOWROOM NỘI THẤT HOMAROOM</h1>
        </div>
    </div>
</div>
<!-- LOGO END -->

<!-- MENU BEGIN -->
<div class="container-child container-child-nav sticky-top">
    <nav class="navbar navbar-expand-lg bg-body-sticky">
        <div class="container-fluid">
            <a class="nav-link" href="<?php echo URL; ?>home">TRANG CHỦ</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"><img src="/MVCPHP/public/images/menu-icon.png" alt=""></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#">GIỚI THIỆU</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="<?php echo URL; ?>product">SẢN PHẨM</a>
                        <ul class="dropdown-content dropdown-menu">
                            <?php
                                foreach($cate as $item){
                                    ?>
                                    <li><a class="dropdown-item" href="<?php echo URL."product/showproduct/".$item["id"] ?>">
                                    <?php echo $item["name"]; ?>
                                    </a></li>
                                    <?php
                                }
                            ?>
                        </ul>
                    </li>
                </ul>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 navbar-fix">
                    <li class="nav-item">
                        <a class="nav-link" href="#">LIÊN HỆ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URL; ?>login">ĐĂNG NHẬP</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URL; ?>register">ĐĂNG KÝ</a>
                    </li>
                </ul>
                <form action="<?php echo URL; ?>product/search" class="d-flex" role="search" method="post">
                    <input class="form-control me-2" type="search" placeholder="Nhập từ khóa..." aria-label="Search" name="search">
                    <button class="btn btn-outline-success" type="submit" name="searchproduct">Search</button>
                </form>
                <p style="align-self: flex-start; margin-top: auto; margin-left: 20px; margin-bottom: auto; color: rgb(218, 216, 216);">
                    <?php if (!empty($session)) {
                        echo $session; 
                        ?>
                        <a href="<?php echo URL; ?>login/logout" id="logout-link" onclick="hideLogoutLink()">Đăng xuất</a>
                        <?php 
                    }
                    ?>
                </p>
            </div>
    </nav>
</div>
<!-- MENU END -->
<script>
    function hideLogoutLink() {
        document.getElementById('logout-link').style.display = 'none'; // Ẩn thẻ <a>
    }
</script>