<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Rodrigo
 * Date: 11/07/2016
 * Time: 08:57 PM
 */
class Admin_Model extends FA_Model
{

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

    public function getModules($idModule, $idRole) {
    	$this->db
    		->select('modules.*')
    		->from('modules')    		
			->join('actions', 'actions.idModule = modules.id')
			->join('profiles', 'profiles.idAction = actions.id')
    		->where(array('profiles.idRole' => $idRole));
		return $this->db->get()->result();
    }

}