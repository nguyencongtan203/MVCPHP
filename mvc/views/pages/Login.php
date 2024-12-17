<!-- CONTENT BEGIN -->
    <div class="container-form container-child-body-area">
        <div class="container-form-child">
            <h1>LOGIN</h1>
            <form class="container-input-form" action="<?php echo URL; ?>login/authenticate" method="post">
                <label class="label-text-form" for="fusername">Username *</label>
                <input class="text-box-form" type="text" name="username" id="ftext-box"
                    placeholder="Enter your Username or Email Address" value="<?php echo $data["username"]; ?>">
                <?php
                    if(!empty($data['usernameError']))
                    ?>
                    <p style="color: red;padding: 0;"><?php echo $data["usernameError"]; ?></p>
                    <?php
                ?>
                <label class="label-text-form" for="fusername">Password *</label>
                <input class="text-box-form" type="password" name="password" id="ftext-box"
                    placeholder="Enter your Password" value="">
                <?php
                    if(!empty($data['passwordError'])){
                        ?>
                        <p style="color: red;padding: 0;"><?php echo $data["passwordError"]; ?></p>
                        <?php
                    }
                    if(!empty($data['errorMessage'])){
                        ?>
                        <p style="color: red;padding: 0;"><?php echo $data["errorMessage"]; ?></p>
                        <?php
                    }
                ?>
                <button style="width: 100px;" class="btn-send-submit" type="submit" name="login">LOG IN</button>
            </form>
        </div>
    </div>
<!-- CONTENT END -->