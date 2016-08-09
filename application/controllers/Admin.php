<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends FA_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Admin_Model', 'admin_model');
    }

    public function index()
    {
        $this->load->view('admin_view');
    }

    public function signOut()
    {
        $this->session->sess_destroy();
    }

    public function getModules($idModule = NULL) {
    	$modules = $this->admin_model->getModules($idModule);
    	$this->msgreturn->data($modules);
    }
}