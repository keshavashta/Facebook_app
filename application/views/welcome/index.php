<div class="span12">
    <br>


    <?php if (@$user_profile): ?>
        <div>Hi <?php echo $user_profile['name'] ?>
        <a href="<?php echo $logout_url ?>">Logout</a></div>
    <?php else: ?>
    <div class="fb-login-button" data-scope="email,publish_stream" data-show-faces="false" data-width="200"
         data-max-rows="1"></div>
    <?php endif; ?>


</div>
