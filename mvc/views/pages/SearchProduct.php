<!-- CONTENT BEGIN -->
<?php
$products = $data["Product"];
$details = $data["ConfigDetail"];
?>
<div class="container container-child container-child-body-area content-fix">
    <h1 class="text-center">Tìm Kiếm</h1>
    <div class="row text-start row-fix w-100">
        <?php
        foreach ($products as $item) {
            ?>
            <div class="col-md-6 col-lg-4" onclick="showDetails('<?php echo 'card-detail-'.$item['id']; ?>')">
                <div class="card card-fix">
                    <img src="<?php echo "/MVCPHP/public/images/" . $item["image"]; ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title title">HOMAROOM</h5>
                        <h5 class="card-title title-proc"><?php echo $item["name"] ?></h5>
                        <p class="card-text cost"><?php echo number_format($item["price"], 0, ".", ",") . "đ"; ?></p>
                        <a href="#" class="btn btn-outline-success">Mua</a>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>
<!-- CONTENT END -->

<!-- CARD DETAIL BEGIN -->
<?php
    // Lưu trữ các card-detail cho từng sản phẩm
    foreach ($products as $product) {
        // Lọc các chi tiết chỉ dành cho sản phẩm hiện tại
        $productDetails = array_filter($details, function ($detail) use ($product) {
            return $detail["id_product"] == $product["id"];
        });
        
        // Nếu có chi tiết cho sản phẩm này
        if (!empty($productDetails)) {
            ?>
            <div id="card-detail-<?php echo $product['id']; ?>" class="card-detail" onclick="hideDetails('<?php echo 'card-detail-'.$product['id']; ?>')">
                <div class="card position-absolute card-main">
                    <div class="card-body text-center card-item">
                        <h5>Thông tin sản phẩm</h5>
                    </div>
                    <?php
                    // Hiển thị chi tiết cấu hình cho sản phẩm
                    foreach ($productDetails as $detail) {
                        ?>
                        <div class="card-body card-item d-flex">
                            <div class="col-4"><?php echo $detail["configuration_name"]; ?></div>
                            <div class="col-8"><?php echo $detail["value"]; ?></div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <?php
        }
    }
?>
<!-- CARD DETAIL END -->