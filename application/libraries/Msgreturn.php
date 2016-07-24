<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Msgreturn {

    protected $CI;

    // We'll use a constructor, as you can't directly call a function
    // from a property definition.
    public function __construct()
    {
            // Assign the CodeIgniter super-object
            $this->CI =& get_instance();
    }

    public function msg($message='', $error_code=200)
    {
            $this->CI->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('msg' => $message)))
                ->set_status_header($error_code)
                ->_display();
                exit(0);
    }

}