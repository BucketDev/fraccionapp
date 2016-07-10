<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loginlib
{
    public function isLoggedIn()
    {
        $CI =& get_instance();
        return !empty($CI->session->email);
    }
}
