<div class="container">
    <form action="<?php echo base_url('/Account/newticket') ?>" method="post" accept-charset="utf-8">
        <div class="form-group">
            <button type="submit" id="send_form" class="btn btn-success disabled">Create a new ticket</button>
        </div>
    </form>
    <h2>My tickets<h2>
    <div class="card">
        <h4 class="text-success">Open (0)</h4>
    </div>
    <div class="card">
        <h4 class="text-danger">Closed (0)</h4>
    </div>
</div>