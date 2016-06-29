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
        $data = json_decode(file_get_contents('php://input'));
        $newdata = array(
            'email'     => $data->email,
            'logged_in' => TRUE
        );

        $this->session->set_userdata($newdata);
    }
}