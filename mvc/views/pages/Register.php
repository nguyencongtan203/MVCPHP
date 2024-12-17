<!-- CONTENT BEGIN -->
<div class="container-form container-child-body-area">
    <div class="container-form-child">
        <h1>REGISTER</h1>
        <form class="container-input-form" action="<?php echo URL; ?>register/validform" method="post">
            <label class="label-text-form" for="fusername">Username *</label>
            <input class="text-box-form" type="text" name="username" id="ftext-box"
                   placeholder="Enter your Username" value="<?php echo $data["username"]; ?>">
            <?php
                if(!empty($data['usernameError'])){
                    ?>
                    <p style="color: red;padding: 0;"><?php echo $data["usernameError"]; ?></p>
                    <?php
                }
            ?>

            <label class="label-text-form" for="fpassword">Password *</label>
            <input class="text-box-form" type="password" name="password" id="ftext-box"
                   placeholder="Enter your Password" value="<?php echo $data["password"]; ?>">
            <?php
                if(!empty($data['passwordError'])){
                    ?>
                    <p style="color: red;padding: 0;"><?php echo $data["passwordError"]; ?></p>
                    <?php
                }
            ?>

            <label class="label-text-form" for="fconfirmpass">Confirm Password *</label>
            <input class="text-box-form" type="password" name="confirmpass" id="ftext-box"
                   placeholder="Confirm your Password" value="<?php echo $data["confirmpass"]; ?>">
            <?php
                if(!empty($data['confirmPassError'])){
                    ?>
                    <p style="color: red;padding: 0;"><?php echo $data["confirmPassError"]; ?></p>
                    <?php
                }
                if(!empty(!empty($data['userExisted']))){
                    ?>
                    <p style="color: red;padding: 0;"><?php echo $data["userExisted"]; ?></p>
                    <?php
                }
            ?>

            <button style="width: 100px;" class="btn-send-submit" type="submit" name="register">REGISTER</button>
        </form>
    </div>
</div>
<!-- CONTENT END -->