<!-- SLIDE BAR BEGIN -->
<div class="container-child container-child-slide text-center">
    <h4 class="container text-center">Danh Mục</h4>
    <div class="container text-center">
        <?php
            foreach($cate as $item){
                ?>
                <div class="row">
                    <a href="<?php echo URL."product/showproduct/".$item["id"] ?>">
                        <?php echo $item["name"]; ?>
                    </a>
                </div>
                <?php
            }
        ?>
    </div>
</div>
<!-- SLIDE BAR END -->