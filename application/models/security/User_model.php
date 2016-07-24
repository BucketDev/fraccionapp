<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Rodrigo
 * Date: 11/07/2016
 * Time: 08:57 PM
 */
class User_model extends FA_Model
{

    public function __construct()
    {
        parent::__construct('users');
    }

    public function getByUser($user, $status = NULL) {
		$this->db
			->select('users.id, email, password, idRole, controller')
			->from($this->table)
			->join('roles', "roles.id = {$this->table}.idRole")
			->where(array('email' => $user));
		if(!empty($status)){
			$this->db->where(array('status'));
		}
		return $this->db->get()->row();
    }

}