<!-- CONTENT BEGIN -->
<link rel="stylesheet" href="/MVCPHP/public/styles/liststyle.css">
<div class="container-form container-child-body-area flex-column align-items-center">
    <div class="container-form-child">
        <h1>CATEGORY MANAGE</h1>
        <form class="container-input-form" action="<?php echo URL; ?>categorymanage/insertcategory" method="post">
            <label class="label-text-form" for="fusername">Name Cate *</label>
            <input class="text-box-form" type="text" name="catename" id="ftext-box"
                placeholder="Enter name category" value="<?php echo $data['catename']; ?>">
            <?php
                if(!empty($data['cateNameError']))
                ?>
                <p style="color: red;padding: 0;"><?php echo $data['cateNameError']; ?></p>
                <?php
                if(!empty($data['errorMessage']))
                ?>
                <p style="color: red;padding: 0;"><?php echo $data['errorMessage']; ?></p>
                <?php
            ?>
            <button style="width: 100px;" class="btn-send-submit" type="submit" name="insertcate">INSERT</button>
        </form>
    </div>
    <table class="custom-table">
        <thead>
            <tr>
                <td>ID</td>
                <td>NAME</td>
                <td>EDIT</td>
            </tr>
        </thead>
        <tbody>
        <?php
            $cate = $data["Cate"];
            foreach($cate as $item){
            ?>
                <tr>
                    <td><?php echo $item["id"] ?></td>
                    <td><?php echo $item["name"] ?></td>
                    <td class="edit-column">
                        <a href="<?php echo URL; ?>categorymanage/deletecategory/<?php echo $item['id']; ?>" name="deletecate">Delete</a>
                        <form class="update-form" action="<?php echo URL; ?>categorymanage/updatecategory/<?php echo $item['id']; ?>" method="post">
                                <input type="text" name="nameupdate" id="" required>
                                <button type="submit" name="updatecate">Update</button>
                        </form>
                    </td>
                </tr>
            <?php
                        
            }
        ?>
        </tbody>
    </table>
</div>
<!-- CONTENT END -->