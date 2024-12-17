<link rel="stylesheet" href="/MVCPHP/public/styles/formproduct.css">
<link rel="stylesheet" href="/MVCPHP/public/styles/liststyle.css">
<div class="container-form container-child-body-area flex-column align-items-center">
    <div class="form-container">
        <h2 class="text-center">PRODUCT MANAGE</h2>
        <form action="<?php echo URL; ?>productmanage/insertproduct" method="post" enctype="multipart/form-data">
            <label for="category">Category:</label>
            <select name="category" id="category">
                <option value="0">Chưa chọn</option>
                <?php
                $cate = $data["Cate"];
                foreach($cate as $item){
                    ?>
                    <option value="<?php echo $item["id"]; ?>"><?php echo $item["name"]; ?></option>
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
            <input type="text" name="nameproduct" id="nameproduct">
            <?php
                if(!empty($data['nameproductError']))
                ?>
                <p style="color: red;padding: 0;"><?php echo $data['nameproductError']; ?></p>
                <?php
            ?>
            
            <label for="priceproduct">Price:</label>
            <input type="number" name="priceproduct" id="priceproduct">
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
            <button type="submit" name="insertproduct">INSERT</button>
        </form>
    </div>
    <table class="custom-table">
        <thead>
            <tr>
                <td>ID</td>
                <td>Cate ID</td>
                <td>NAME</td>
                <td>PRICE</td>
                <td>IMAGE</td>
                <td>EDIT</td>
            </tr>
        </thead>
        <tbody>
        <?php
            $pro = $data["Pro"];
            foreach($pro as $item){
            ?>
                <tr>
                    <td><?php echo $item["id"] ?></td>
                    <td><?php echo $item["id_category"] ?></td>
                    <td><?php echo $item["name"] ?></td>
                    <td><?php echo number_format($item["price"], 0, ".", ",") . "đ"; ?></td>
                    <td><img style="width: 60px;height: 60px;" src="/MVCPHP/public/images/<?php echo $item["image"] ?>" alt=""></td>
                    <td class="edit-column">
                        <a href="<?php echo URL; ?>productmanage/deleteproduct/<?php echo $item['id']."/".$item['image']; ?>" name="deletecate">Delete</a>
                        <a href="<?php echo URL; ?>updateproduct/showformupdate/<?php echo $item['id']; ?>" name="deletecate">Update</a>
                        <a href="<?php echo URL; ?>configurationdetailmanage/show/<?php echo $item['id']; ?>" name="configurationdetails">Configuration</a>
                    </td>
                </tr>
            <?php
                        
            }
        ?>
        </tbody>
    </table>
</div>