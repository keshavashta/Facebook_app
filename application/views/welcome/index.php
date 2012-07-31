<div class="span12">
    <br>


    <?php if (@$user_profile): ?>
        <div>Hi <?php echo $user_profile['name'] ?>
        <a href="<?php echo $logout_url ?>">Logout</a></div>
    <?php else: ?>
    <div><a href="<?php echo $login?>">Login</a></div>
    <?php endif; ?>


</div>
