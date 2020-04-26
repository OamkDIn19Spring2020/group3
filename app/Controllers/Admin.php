<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Controllers\Error;
use App\Controllers\Pages;
use App\Models\Tables;
use App\Models\Users;
use App\Models\Stonks;

class Admin extends BaseController
{
    //Index redirect
    public function index()
    {
        $pages = new Pages();
        $pages->get('admin');
    }
    //Create tables in database
    public function setupdb()
    {
        $pages = new Pages();
        $error = new Error();
        $tables = new Tables();
        $success = $tables->initialize_database(true);
        if ($success) {
            $error->setErrorState('success', 'Tables and entries created');
            $pages->get('admin');
        } else {
            $error->setErrorState('danger', 'Error creating tables');
            $pages->get('admin');
        }
    }
    //Create tables in database
    public function setupdbnodefaults()
    {
        $pages = new Pages();
        $error = new Error();
        $tables = new Tables();
        $success = $tables->initialize_database(false);
        if ($success) {
            $error->setErrorState('success', 'Tables created');
            $pages->get('admin');
        } else {
            $error->setErrorState('danger', 'Error creating tables');
            $pages->get('admin');
        }
    }
    //Drop tables from database
    public function dropdb()
    {
        $pages = new Pages();
        $error = new Error();
        $tables = new Tables();
        $success = $tables->drop_db_tables();
        if ($success) {
            $error->setErrorState('success', 'Tables removed');
            $pages->get('admin');
        } else {
            $error->setErrorState('danger', 'Error while removing tables');
            $pages->get('admin');
        }
    }
    function manageusers()
    {
        $tables = new Tables();
        $pages = new Pages();
        $error = new Error();
        $users = new Users();
        $action = $this->request->getVar('action');
        $username = $this->request->getVar('username');
        if($action == "list_users"){
            echo view('templates/header');
            echo '<div class="container">';
            echo '<a href="'.base_url('/admin').'"><button class="btn">Back</button></a><br>';
            echo '<table class="table">';
            echo '<thead>';
            echo '    <tr>';
            echo '        <th scope="col">User ID</th>';
            echo '        <th scope="col">Username</th>';
            echo '        <th scope="col">Account standing</th>';
            echo '        <th scope="col">Suspend Reason</th>';
            echo '        <th scope="col">VIP Status</th>';
            echo '    </tr>';
            echo '</thead>';
            echo '<tbody>';
            foreach ($tables->gettable("users") as $row) {
                echo "</tr><td>";
                echo $row->user_id;
                echo "</td><td>";
                echo $row->username;
                echo "</td><td>";
                if ($row->vip == 1){
                    echo "Suspended";
                } else {
                    echo "Active";
                }
                echo "</td><td>";
                echo $row->disabled_reason;
                echo "</td><td>";
                if ($row->vip == 1){
                    echo "VIP Member";
                } else {
                    echo "Normal Member";
                }
                echo "</td><tr>";
            }
            echo '</tbody>';
            echo '</table>';
            echo '</div>';
            echo view('templates/footer');
        } else{
            if ($username == null) {
                $error->setErrorState('danger', 'No username provided');
                $pages->get('admin');
            } elseif ($users->user_exists($username) == false){
                if($action == "register_user"){
                    $users->addUser($username, "\$2y\$10\$HDkqe/ehs0mZInyGLnn24e3A2wmTdwiqzHI0Yj/70a2hX7xxTMNZO");
                    if ($users->user_exists($username) == true) {
                        $error->setErrorState('success', 'New user '.$username.' created with default password: Passw0rd!');
                        $pages->get('admin');
                    } else {
                        $error->setErrorState('danger', 'Unable to create user');
                        $pages->get('admin');
                    }
                }
            } else {
                if($action == "unregister_user"){
                    $users->removeuser($username);
                    $error->setErrorState('success', 'User deleted');
                    $pages->get('admin');
                }
                if($action == "reset_user"){
                    $users->deleteinfo($username);
                    $error->setErrorState('success', 'User reset');
                    $pages->get('admin');
                }
                if($action == "restore_user"){
                    $users->restore($username);
                    $error->setErrorState('success', 'User restored');
                    $pages->get('admin');
                }
                if($action == "suspend_user"){
                    $users->disable($username, "admin");
                    $error->setErrorState('success', 'User suspended');
                    $pages->get('admin');
                }
            }
            $error->setErrorState('danger', 'Action could not be completed');
            $pages->get('admin');
        }
    }
    function managestonks()
    {
        $tables = new Tables();
        $pages = new Pages();
        $error = new Error();
        $action = $this->request->getVar('action');
        $stonkid = $this->request->getVar('stonkid');
        if ($action == "list_stonks"){
            echo view('templates/header');
            echo '<div class="container">';
            echo '<a href="'.base_url('/admin').'"><button class="btn">Back</button></a><br>';
            echo '<table class="table">';
            echo '<thead>';
            echo '    <tr>';
            echo '        <th scope="col">Stonk ID</th>';
            echo '        <th scope="col">Stonk Name</th>';
            echo '        <th scope="col">Issuer ID</th>';
            echo '        <th scope="col">Description</th>';
            echo '    </tr>';
            echo '</thead>';
            echo '<tbody>';
            foreach ($tables->gettable("stonks") as $row) {
                echo "</tr><td>";
                echo $row->stonk_id;
                echo "</td><td>";
                echo $row->stonk_name;
                echo "</td><td>";
                echo $row->issuer_id;
                echo "</td><td>";
                echo $row->stonk_desc;
                echo "</td><tr>";
            }
            echo '</tbody>';
            echo '</table>';
            echo '</div>';
            echo view('templates/footer');
        }
        if ($action == "add_stonk"){
            $stonks = new Stonks();
            $pages = new Pages();
            $error = new Error();
            $stonks->add_stonk();
            $error->setErrorState('danger', 'A new stonk added');
            $pages->get('admin');
        }
    }
}
