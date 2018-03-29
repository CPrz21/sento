<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CMSModel extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
	}

	//menu
	public function getMenu($tipo, $idusuario, $idmenu, $idmenu_deta, $parametro){

		$query = $this->db->query("CALL sp_menu_usuario_B (?,?,?,?,?)",array($tipo, $idusuario, $idmenu, $idmenu_deta, $parametro));

		if ($query->num_rows() > 0) { 
			return $query->result();
		}else{  
			return false;	
		}
	}


}