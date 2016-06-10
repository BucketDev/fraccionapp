<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: rodrigo
 * Date: 09/06/16
 * Time: 11:06 PM
 */
class Home extends CI_Controller
{
    public function index() {
        $this->load->view('home_view');
    }
}