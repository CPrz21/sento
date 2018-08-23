<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SeguridadModel extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}


	//////////////////////////////////////////////
	/**************** Usuarios ****************/
	//////////////////////////////////////////////
	
	public function getUsuarios($tipo, $idusuario, $usuario, $nombre, $activo, $idusuario_filtra, $parametro){

		$query = $this->db->query("CALL sp_usuario_B (?,?,?,?,?,?,?)",array($tipo, $idusuario, $usuario, $nombre, $activo, $idusuario_filtra, $parametro));
		$query->next_result();

		if ($query->num_rows() > 0) 
		{ 
			return $query->result();
		}
		else
		{  
			return false;	
		}
	}

	public function getUsuario($tipo, $idusuario, $usuario, $nombre, $activo, $idusuario_filtra, $parametro){

		$query = $this->db->query("CALL sp_usuario_B (?,?,?,?,?,?,?)",array($tipo, $idusuario, $usuario, $nombre, $activo, $idusuario_filtra, $parametro));
		$query->next_result();

		if ($query->num_rows() > 0) 
		{ 
			return $query->row();
		}
		else
		{  
			return false;	
		}
	}

	public function setUsuario($tipo, $idusuario, $usuario, $nombre, $email, $password, $activo, $idusuario_tipo, $idusuario_filtra, $parametro){

		$query = $this->db->query("CALL sp_usuario_UID (?,?,?,?,?,?,?,?,?,?)",array($tipo, $idusuario, $usuario, $nombre, $email, $password, $activo, $idusuario_tipo, $idusuario_filtra, $parametro));
		$query->next_result();

		if ($query->num_rows() > 0) 
		{ 
			return $query->row();
		}
		else
		{  
			return false;	
		}
	}

	////////////////////////////////////////////////////////////////////
	/**************** Administracion de menu - usuario ****************/
	///////////////////////////////////////////////////////////////////

	public function getMenuUsuario($tipo, $idusuario, $idmenu, $idmenu_deta, $parametro){

		$query = $this->db->query("CALL sp_menu_usuario_B (?,?,?,?,?)",array($tipo, $idusuario, $idmenu, $idmenu_deta, $parametro));
		$query->next_result();

		if ($query->num_rows() > 0) { 
			return $query->result();
		}else{  
			return false;	
		}
	}

	public function setMenuUsuario($tipo, $idusuario, $idmenu, $idmenu_deta, $idmodulo, $idusuario_filtra, $parametro){

		$query = $this->db->query("CALL sp_menu_usuario_UID (?,?,?,?,?,?,?)",array($tipo, $idusuario, $idmenu, $idmenu_deta, $idmodulo, $idusuario_filtra, $parametro));
		$query->next_result();

		if ($query->num_rows() > 0) 
		{ 
			return $query->row();
		}
		else
		{  
			return false;	
		}
	}


	//////////////////////////////////////////////
	/************** LOG DE ACCESOS **************/
	//////////////////////////////////////////////

	public function getUsuarioAccesoLog($tipo, $idusuario, $parametro){

		$query = $this->db->query("CALL sp_usuario_acceso_log_B (?,?,?)",array($tipo, $idusuario, $parametro));
		$query->next_result();

		if ($query->num_rows() > 0) { 
			return $query->result();
		}else{  
			return false;	
		}
	}

	public function setUsuarioAccesoLog($tipo, $idusuario, $idmenu_deta){

		$query = $this->db->query("CALL sp_usuario_acceso_log_UID (?,?,?)",array($tipo, $idusuario, $idmenu_deta));
		$query->next_result();

		if ($query->num_rows() > 0) 
		{ 
			return $query->row();
		}
		else
		{  
			return false;	
		}
	}

	
}

/* End of file SeguridadModel.php */
/* Location: ./application/models/SeguridadModel.php */