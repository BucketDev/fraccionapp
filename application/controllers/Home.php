<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends FA_Controller
{
    public function index()
    {
        $this->load->view('home_view');
    }

    public function signOut()
    {
        $this->session->sess_destroy();
        redirect('login', 'show', 302);
    }
}