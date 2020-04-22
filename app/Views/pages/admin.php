<div class="container">
    <div class="row">
    <div>
        <div id="users" class="card"><div class="card-body">
            <h3 class="card-title">User management</h3>
            <form action="<?php echo base_url('/admin/manageusers') ?>" method="post" accept-charset="utf-8">
                <button class="btn btn-success disabled">List users</button>
                <div class="form-group">
                    <input type="text" name="username" placeholder="Enter username">
                    <button type="submit" id="send_form" class="btn btn-success disabled">Register user</button>
                    <button type="submit" id="send_form" class="btn btn-danger disabled">Unregister user</button>
                    <button type="submit" id="send_form" class="btn btn-success disabled">Edit user data</button>
                    <button type="submit" id="send_form" class="btn btn-danger disabled">Reset user data</button>
                    <button type="submit" id="send_form" class="btn btn-success disabled">Restore user from suspended state</button>
                    <button type="submit" id="send_form" class="btn btn-danger disabled">Suspend user</button>
                </div>
            </form>
        </div></div>
        <div id="stonk" class="card"><div class="card-body">
            <h3 class="card-title">Stonk management</h3>
                <button class="btn btn-success disabled">List stonks</button>
                <button class="btn btn-success disabled">New stonk</button>
            <form action="<?php echo base_url('/admin/managestonks') ?>" method="post" accept-charset="utf-8">
                <div class="form-group">
                    <input type="text" name="stonkid" placeholder="Enter stonkid">
                    <button type="submit" id="send_form" class="btn btn-success disabled">Edit stonk data</button>
                    <button type="submit" id="send_form" class="btn btn-success disabled">Change stonk tradable flag</button>
                    <button type="submit" id="send_form" class="btn btn-danger disabled">Delete stonk</button>
                </div>
            </form>
            <button class="btn btn-success disabled">Open trading</button>
            <button class="btn btn-danger disabled">Close market</button>
        </div></div>
        <div id="server" class="card"><div class="card-body">
            <h3 class="card-title">Server and database configuration</h3>
            <button class="btn btn-success disabled">Edit announcements</button>
            <button class="btn btn-success disabled">Show admin log</button>
            <form action="<?php echo base_url('/admin/setupdb') ?>" method="post" accept-charset="utf-8">
                <div class="form-group">
                    <button type="submit" id="send_form" class="btn btn-success">Create default tables and entries</button>
                </div>
            </form>
            <form action="<?php echo base_url('/admin/setupdbnodefaults') ?>" method="post" accept-charset="utf-8">
                <div class="form-group">
                    <button type="submit" id="send_form" class="btn btn-success">Create tables only</button>
                </div>
            </form>
            <form action="<?php echo base_url('/admin/dropdb') ?>" method="post" accept-charset="utf-8">
                <div class="form-group">
                    <button type="submit" id="send_form" class="btn btn-danger">Drop all tables</button>
                </div>
            </form>
        </div></div>
        <div id="stats" class="card"><div class="card-body">
            <h3 class="card-title">Statistics</h3>
            <p class="card-text text-danger">(insufficient data)</h2>
            <p class="card-text">Number of users: null</p>
            <p class="card-text">Total balances: null</p>
            <p class="card-text">Total deposited: null</p>
            <p class="card-text">Total withdrawn: null</p>
            <p class="card-text">Total transactions: null</p>
        </div></div>
    </div>
    </div>