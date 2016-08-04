<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if ($this->loginlib->isLoggedIn()) {
            log_message('debug', $this->loginlib->getController());
            redirect($this->loginlib->getController(), 'auto', 302);
        }
    }

    public function index()
    {
        $this->load->view('login_view');
    }

    public function signIn()
    {
        $data = json_decode(file_get_contents('php://input'));
        $this->load->model('security/user_model');
        $user = $this->user_model->getByUser($data->email);

        if(!empty($user)){
            if($user->password === $data->password) {
                    $newdata = array(
                    'email'     => $user->email,
                    'idRole'    => $user->idRole,
                    'controller'=> $user->controller,
                    'idUser'    => $user->id,
                    'logged_in' => TRUE
                );

                $this->session->set_userdata($newdata);
                $this->msgreturn->msg('signing in...');
            } else {
                $this->msgreturn->msg('password does not match...', 404);
            }
        } else {
            $this->msgreturn->msg('user not found...', 404);
        }
    }
}