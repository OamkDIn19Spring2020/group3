<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Controllers\Error;
use App\Controllers\Pages;
use App\Models\Tables;

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
        $username = $this->request->getVar('username');
    }
    function managestonks()
    {
        $stonkid = $this->request->getVar('stonkid');
    }
}
