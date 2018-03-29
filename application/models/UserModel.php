<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UserModel extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function login($user, $pwrd){

		$query = $this->db->query("CALL sp_usuario_login_B (1,0,?,?,'') ", array($user, $pwrd));
		if ($query->num_rows() > 0) { 
			return $query->row();
		}else{  
			return false;	
		}

	}

	
}

/* End of file usermodel.php */
/* Location: ./application/models/usermodel.php */