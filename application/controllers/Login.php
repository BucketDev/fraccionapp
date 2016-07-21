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
        $this->load->model('user_model');
        $user = $this->user_model->getByUser($data->email);

        if(!empty($user)){
            if($user->password === $data->password) {
                $newdata = array(
                    'email'     => $user->email,
                    'logged_in' => TRUE
                );

                $this->session->set_userdata($newdata);
                $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode(array('msg' => 'ingresar...')))
                    ->set_status_header(200);
            } else {
                $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode(array('msg' => 'password dont match...')))
                    ->set_status_header(404);
            }
        } else {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('msg' => 'not found...')))
                ->set_status_header(404);
        }
    }
}