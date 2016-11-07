<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends FA_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('security/User_Model', 'user_model');
    }

    public function index()
    {
        $users = $this->user_model->getAllWithRole();
        $this->msgreturn->data($users);
    }
}