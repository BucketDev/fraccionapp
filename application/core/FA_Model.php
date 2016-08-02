<?php

/**
 * Created by PhpStorm.
 * User: Rodrigo
 * Date: 11/07/2016
 * Time: 09:04 PM
 */
class FA_Model extends CI_Model
{

    var $table = '';

    public function __construct()
    {
        parent::__construct();
    }

    public function withTable($table)
    {
        parent::__construct();

        $this->table = $table;
    }

    public function findById($id = 0)
    {
        $result = $this->db->query("SELECT * FROM {$this->table} WHERE id = {$id}");
        return $result->row();

    }

}