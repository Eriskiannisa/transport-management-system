<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

	public function login($username, $password)
	{
		$query = $this->db->where('username',$username)
		->where('password',$password)
		->where('user_status', 1)
		->limit(1)
		->get('users');
		if ($query->num_rows() == 1) {
		    return $query->row();
		}else{
			return false;
		}
	}
}
