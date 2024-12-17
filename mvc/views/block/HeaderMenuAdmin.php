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
                        <a class="nav-link" href="<?php echo URL; ?>categorymanage">QUẢN LÝ DANH MỤC</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URL; ?>productmanage">QUẢN LÝ SẢN PHẨM</a>
                    </li>
                </ul>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 navbar-fix">
                    <p style="align-self: flex-start; margin-top: auto; margin-left: 20px; margin-bottom: auto; color: rgb(218, 216, 216);">
                    <?php if (!empty($session)) {
                        echo $session; 
                        ?>
                        <a href="<?php echo URL; ?>login/logout" id="logout-link" onclick="hideLogoutLink()">Đăng xuất</a>
                        <?php 
                    }
                    ?>
                    </p>
                </ul>
            </div>
    </nav>
</div>
<!-- MENU END -->
<script>

</script>