<div class="container">
    <div class="row">
    <div>
        <script>
            function setstonkaction(value){
                document.getElementById("stonkaction").value = value;
            }
            function setuseraction(value){
                document.getElementById("useraction").value = value;
            }
        </script>
        <div id="users" class="card"><div class="card-body">
            <h3 class="card-title">User management</h3>
            <form action="<?php echo base_url('/admin/manageusers') ?>" method="post" accept-charset="utf-8">
                <div class="form-group">
                    <input type="text" name="username" placeholder="Enter username">
                    <input type="text" name="action" id="useraction">
                    </br>
                    <input type="button" onclick="setuseraction(this.value)" value="list_users" class="btn">
                    <input type="button" onclick="setuseraction(this.value)" value="register_user" class="btn">
                    <input type="button" onclick="setuseraction(this.value)" value="unregister_user" class="btn">
                    <input type="button" onclick="setuseraction(this.value)" value="reset_user" class="btn">
                    <input type="button" onclick="setuseraction(this.value)" value="restore_user" class="btn">
                    <input type="button" onclick="setuseraction(this.value)" value="suspend_user" class="btn">
                    </br>
                    <button type="submit" id="send_form" class="btn btn-success">send_form</button>
                </div>
            </form>
        </div></div>
        <div id="stonk" class="card"><div class="card-body">
            <h3 class="card-title">Stonk management</h3>
            <form action="<?php echo base_url('/admin/managestonks') ?>" method="post" accept-charset="utf-8">
                <div class="form-group">
                    <input type="text" name="action" id="stonkaction">
                    </br>
                    <input type="button" onclick="setstonkaction(this.value)" value="list_stonks" class="btn">
                    <input type="button" onclick="setstonkaction(this.value)" value="add_stonk" class="btn">
                    </br>
                    <button type="submit" id="send_form" class="btn btn-success">send_form</button>
                </div>
            </form>
        </div></div>
        <div id="server" class="card"><div class="card-body">
            <h3 class="card-title">Server and database configuration</h3>
            <form action="<?php echo base_url('/admin/setupdb') ?>" method="post" accept-charset="utf-8">
                <div class="form-group">
                    <button type="submit" id="send_form" class="btn btn-success">Create tables and 4 stonks</button>
                </div>
            </form>
            <form action="<?php echo base_url('/admin/setupdbnodefaults') ?>" method="post" accept-charset="utf-8">
                <div class="form-group">
                    <button type="submit" id="send_form" class="btn btn-warning">Create tables only (you need to add stonks manually)</button>
                </div>
            </form>
            <form action="<?php echo base_url('/admin/dropdb') ?>" method="post" accept-charset="utf-8">
                <div class="form-group">
                    <button type="submit" id="send_form" class="btn btn-danger">Drop all tables</button>
                </div>
            </form>
        </div></div>
    </div>
    </div>