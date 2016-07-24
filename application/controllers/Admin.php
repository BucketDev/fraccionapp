<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends FA_Controller
{
    public function index()
    {
        $this->load->view('admin_view');
    }

    public function signOut()
    {
        $this->session->sess_destroy();
        redirect('login', 'show', 302);
    }
}