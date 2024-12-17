<link rel="stylesheet" href="/MVCPHP/public/styles/formproduct.css">
<div class="container-form container-child-body-area flex-column align-items-center">
    <div class="form-container">
        <h2 class="text-center">UPDATE PRODUCT</h2>
        <form action="<?php echo URL; ?>updateproduct/updateproduct/<?php echo $data["Pro"][0]["id"]."/".$data["Pro"][0]["image"]; ?>" method="post" enctype="multipart/form-data">
            <label for="category">Category:</label>
            <select name="category" id="category">
                <option value="0">Chưa chọn</option>
                <?php
                $selectedCategory = $data["Pro"][0]["id_category"];
                $cate = $data["Cate"];
                foreach($cate as $item){
                    ?>
                    <option value="<?php echo $item["id"]; ?>" <?php echo $item['id'] == $selectedCategory ? 'selected' : ''; ?>>
                        <?php echo $item["name"]; ?>
                    </option>
                    <?php
                }
                ?>
            </select>
            <?php
                if(!empty($data['categoryError']))
                ?>
                <p style="color: red;padding: 0;"><?php echo $data['categoryError']; ?></p>
                <?php
            ?>

            <label for="nameproduct">Name:</label>
            <input type="text" name="nameproduct" id="nameproduct" value="<?php echo $data["Pro"][0]["name"] ?>">
            <?php
                if(!empty($data['nameproductError']))
                ?>
                <p style="color: red;padding: 0;"><?php echo $data['nameproductError']; ?></p>
                <?php
            ?>
            
            <label for="priceproduct">Price:</label>
            <input type="number" name="priceproduct" id="priceproduct" value="<?php echo $data["Pro"][0]["price"] ?>">
            <?php
                if(!empty($data['priceproductError']))
                ?>
                <p style="color: red;padding: 0;"><?php echo $data['priceproductError']; ?></p>
                <?php
            ?>

            <label for="imageproduct">Image:</label>
            <input type="file" name="imageproduct" id="imageproduct">
            <?php
                if(!empty($data['imageError']))
                ?>
                <p style="color: red;padding: 0;"><?php echo $data['imageError']; ?></p>
                <?php
                if(!empty($data['errorMessage']))
                ?>
                <p style="color: red;padding: 0;"><?php echo $data['errorMessage']; ?></p>
                <?php
            ?>
            <button type="submit" name="updateproduct">UPDATE</button>
        </form>
    </div>
</div>