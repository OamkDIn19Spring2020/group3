<div class="container">
    <br>
    <?= \Config\Services::validation()->listErrors(); ?>
    <form action="<?php echo base_url('/account/changepassword') ?>" method="post" accept-charset="utf-8">
        <div class="form-group">
            <label for="password">Current Password</label>
            <input type="password" name="oldpassword" class="form-control" id="oldpassword" placeholder="Enter your current password">
        </div>

        <div class="form-group">
            <label for="password">New Password</label>
            <input type="password" name="newpassword" class="form-control" id="newpassword" placeholder="Enter your new password">
        </div>

        <div class="form-group">
            <label for="password">Confirm New Password</label>
            <input type="password" name="confirmnewpassword" class="form-control" id="confirmnewpassword" placeholder="Enter your new password again">
        </div>

        <div class="form-group">
            <button type="submit" id="send_form" class="btn btn-success">Confirm</button>
        </div>
    </form>
</div>