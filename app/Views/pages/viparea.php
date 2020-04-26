<div class="container">
    <div class="center">
        <?php
        if ($vip == true) {
            echo '<p class="h4">You are already a VIP member:</p>';
            echo '<br>';
            echo '<a href="'.base_url("/history").'">Find out what stonk you got as a bonus</a>';
            echo '<br>';
            echo '<a href="'.base_url("/dashboard").'">Access dashboard</a>';
            echo '<br>';
            echo '<a href="'.base_url("/avatar").'">Change my avatar</a>';

        } else {
            echo '<p class="h4">Buy VIP now and get access to the following benefits:</p>';
            echo '<p>1 Free stonk</p>';
            echo '<p>Cool badge</p>';
            echo '<p>Unlock all avatars</p>';
            echo '<br>';
            echo '<strike>20 000 stonk$</strike>';
            echo '<form action="'.base_url("/TX/upgrade").'" method="post" accept-charset="utf-8">';
            echo '<div class="form-group">';
            echo '    <button type="submit" id="send_form" class="btn btn-success">19 999 stonk$</button>';
            echo '</div>';
            echo '</form>';
        }
        ?>
    </div>
</div>