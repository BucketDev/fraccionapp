<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loginlib
{
    public function isLoggedIn()
    {
        $CI =& get_instance();
        log_message('debug', $CI->session->email);
        return !empty($CI->session->email);
    }
}
