<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginLib
{
    public function isLoggedIn()
    {

        $CI =& get_instance();
        log_message('debug', $CI->session->email);
        return !empty($CI->session->email);
    }
}