<link rel="stylesheet" href="/MVCPHP/public/styles/formproduct.css">
<link rel="stylesheet" href="/MVCPHP/public/styles/liststyle.css">
<div class="container-form container-child-body-area flex-column align-items-center">
    <div class="form-container">
        <h2 class="text-center">CONFIGURATION DETAIL</h2>
        <form id="config-form" action="" method="post">
            <label for="">Sản phẩm: <?php echo $data["productcurrent"][0]["name"]; ?></label>
            
            <label for="">Thương hiệu:</label>
            <input type="hidden" name="hbrand" value="<?php echo $data["configs"][0]["id"]; ?>">
            <input type="text" name="brand" id="brand" 
                value="<?php echo isset($data["configdetail"][0]["value"]) ? $data["configdetail"][0]["value"] : $data["brand"]; ?>">
            <?php
                if(!empty($data['brandError']))
                ?>
                <p style="color: red;padding: 0;"><?php echo $data['brandError']; ?></p>
                <?php
            ?>

            <label for="">Mã:</label>
            <input type="hidden" name="hcode" value="<?php echo $data["configs"][1]["id"]; ?>">
            <input type="text" name="code" id="code" 
                value="<?php echo isset($data["configdetail"][1]["value"]) ? $data["configdetail"][1]["value"] : $data["code"]; ?>">
            <?php
                if(!empty($data['codeError']))
                ?>
                <p style="color: red;padding: 0;"><?php echo $data['codeError']; ?></p>
                <?php
            ?>

            <label for="">Mô tả:</label>
            <input type="hidden" name="hdescribe" value="<?php echo $data["configs"][2]["id"]; ?>">
            <textarea name="describe" id="describe" placeholder="Enter text here"><?php echo isset($data["configdetail"][2]["value"]) ? $data["configdetail"][2]["value"] : $data["describe"]; ?></textarea>
            <?php
                if(!empty($data['describeError']))
                ?>
                <p style="color: red;padding: 0;"><?php echo $data['describeError']; ?></p>
                <?php
            ?>

            <label for="">Kích thước:</label>
            <input type="hidden" name="hsize" value="<?php echo $data["configs"][3]["id"]; ?>">
            <input type="text" name="size" id="size" 
                value="<?php echo isset($data["configdetail"][3]["value"]) ? $data["configdetail"][3]["value"] : $data["size"]; ?>">
                <?php
                if(!empty($data['sizeError']))
                ?>
                <p style="color: red;padding: 0;"><?php echo $data['sizeError']; ?></p>
                <?php
            ?>

            <label for="">Chất liệu:</label>
            <input type="hidden" name="hmaterial" value="<?php echo $data["configs"][4]["id"]; ?>">
            <input type="text" name="material" id="material" 
                value="<?php echo isset($data["configdetail"][4]["value"]) ? $data["configdetail"][4]["value"] : $data["material"]; ?>">
                <?php
                if(!empty($data['materialError']))
                ?>
                <p style="color: red;padding: 0;"><?php echo $data['materialError']; ?></p>
                <?php
            ?>

            <label for="">Màu sắc:</label>
            <input type="hidden" name="hcolor" value="<?php echo $data["configs"][5]["id"]; ?>">
            <input type="text" name="color" id="color" 
                value="<?php echo isset($data["configdetail"][5]["value"]) ? $data["configdetail"][5]["value"] : $data["color"]; ?>">
                <?php
                if(!empty($data['colorError']))
                ?>
                <p style="color: red;padding: 0;"><?php echo $data['colorError']; ?></p>
                <?php
            ?>

            <label for="">Tính năng:</label>
            <input type="hidden" name="hfeature" value="<?php echo $data["configs"][6]["id"]; ?>">
            <input type="text" name="feature" id="feature" 
                value="<?php echo isset($data["configdetail"][6]["value"]) ? $data["configdetail"][6]["value"] : $data["feature"]; ?>">
            <?php
                if(!empty($data['featureError']))
                ?>
                <p style="color: red;padding: 0;"><?php echo $data['featureError']; ?></p>
                <?php
            ?>

            <label for="">Bảo hành:</label>
            <input type="hidden" name="hguarantee" value="<?php echo $data["configs"][7]["id"]; ?>">
            <input type="text" name="guarantee" id="guarantee" 
                value="<?php echo isset($data["configdetail"][7]["value"]) ? $data["configdetail"][7]["value"] : $data["guarantee"]; ?>">
            <?php
                if(!empty($data['guaranteeError']))
                ?>
                <p style="color: red;padding: 0;"><?php echo $data['guaranteeError']; ?></p>
                <?php
            ?>

            <div class="button-group">
                <button type="submit" id="update-btn-config" name="updateconfigdetail" class="submit-button">UPDATE</button>
                <button type="submit" id="delete-btn-config" name="deleteconfigdetail" class="submit-button">DELETE</button>
            </div>
        </form>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById('config-form');
    const productId = "<?php echo htmlspecialchars($data['productcurrent'][0]['id'], ENT_QUOTES, 'UTF-8'); ?>";
    document.getElementById('update-btn-config').addEventListener('click', function () {
        form.action = `http://localhost/MVCPHP/public/configurationdetailmanage/updateconfigdetail/${productId}`;
        form.submit();
    });

    document.getElementById('delete-btn-config').addEventListener('click', function () {
        form.action = `http://localhost/MVCPHP/public/configurationdetailmanage/deleteconfigdetail/${productId}`;
        form.submit();
    });
});
</script>