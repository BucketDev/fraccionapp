<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Social extends FA_Controller
{
    public function index()
    {
        $this->load->view('social_view');
    }
    
}