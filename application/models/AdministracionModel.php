<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AdministracionModel extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
	}

	public function get_data()
	{
		// $query = $this->db->query("SELECT idcategoria, nombre_es, descripcion_en FROM sentolux_db.categoria");
		$query = $this->db->query("SELECT title, body FROM postapp.post");


		//SELECT detalle_menu.nombre, detalle_menu.url FROM detalle_menu WHERE detalle_menu.idMenu = 1

		if ($query->num_rows() > 0) {

        return $query->result();
        //return $query->row()->id_menu;

     	}
     return false;
	}

	//////////////////////////////////////////////
	/**************** CATEGORIAS ****************/
	//////////////////////////////////////////////

	public function getCategorias($tipo, $idcategoria, $idsubcategoria, $nombre_es, $nombre_en, $activa, $idusuario, $parametro){

		$query = $this->db->query("CALL sp_categoria_B (?,?,?,?,?,?,?,?)",array($tipo, $idcategoria, $idsubcategoria, $nombre_es, $nombre_en, $activa, $idusuario, $parametro));

		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function setCategorias($tipo, $idcategoria, $idsubcategoria, $nombre_es, $nombre_en, $descripcion_es, $descripcion_en, $activa, $idusuario, $parametro){

		$query = $this->db->query("CALL sp_categoria_UID (?,?,?,?,?,?,?,?,?,?)",array($tipo, $idcategoria, $idsubcategoria, $nombre_es, $nombre_en, $descripcion_es, $descripcion_en, $activa, $idusuario, $parametro));

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
	/**************** PRODUCTOS ****************/
	//////////////////////////////////////////////

	public function getTipoProducto($tipo, $idtipo_producto, $idusuario, $parametro){

		$query = $this->db->query("CALL sp_tipo_producto_B (?,?,?,?)",array($tipo, $idtipo_producto, $idusuario, $parametro));

		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}





}
