<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if ($this->loginlib->isLoggedIn()) {
            redirect('home', 'auto', 302);
        }
    }

    public function index()
    {
        $this->load->view('login_view');
    }

    public function signIn()
    {
        $newdata = array(
            'email'     => $this->input->post('email'),
            'logged_in' => TRUE
        );

        $this->session->set_userdata($newdata);
        redirect('home', 'show', 302);
    }
}