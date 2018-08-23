<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AdministracionModel extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
	}

	//////////////////////////////////////////////
	/**************** CATEGORIAS ****************/
	//////////////////////////////////////////////
	
	public function getCategorias($tipo, $idcategoria, $idsubcategoria, $nombre_es, $nombre_en, $activa, $idusuario, $parametro){

		$query = $this->db->query("CALL sp_categoria_B (?,?,?,?,?,?,?,?)",array($tipo, $idcategoria, $idsubcategoria, $nombre_es, $nombre_en, $activa, $idusuario, $parametro));
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

	public function setCategorias($tipo, $idcategoria, $idsubcategoria, $nombre_es, $nombre_en, $descripcion_es, $descripcion_en, $activa, $idusuario, $parametro){

		$query = $this->db->query("CALL sp_categoria_UID (?,?,?,?,?,?,?,?,?,?)",array($tipo, $idcategoria, $idsubcategoria, $nombre_es, $nombre_en, $descripcion_es, $descripcion_en, $activa, $idusuario, $parametro));
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
	/**************** PRODUCTOS ****************/
	//////////////////////////////////////////////
	
	public function getTipoProducto($tipo, $idtipo_producto, $idusuario, $parametro){

		$query = $this->db->query("CALL sp_tipo_producto_B (?,?,?,?)",array($tipo, $idtipo_producto, $idusuario, $parametro));
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

	public function getProductos($tipo, $idproducto, $idtipo_producto, $idcategoria, $idsubcategoria, $codigo_pos, $nombre_es, $nombre_en,  $activo, $idusuario, $parametro, $parametro2){

		$query = $this->db->query("CALL sp_producto_B (?,?,?,?,?,?,?,?,?,?,?,?)",array($tipo, $idproducto, $idtipo_producto, $idcategoria, $idsubcategoria, $codigo_pos, $nombre_es, $nombre_en,  $activo, $idusuario, $parametro, $parametro2));
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

	public function getProducto_deta($tipo, $idproducto, $idtipo_producto, $idcategoria, $idsubcategoria, $codigo_pos, $nombre_es, $nombre_en,  $activo, $idusuario, $parametro, $parametro2){

		$query = $this->db->query("CALL sp_producto_B (?,?,?,?,?,?,?,?,?,?,?,?)",array($tipo, $idproducto, $idtipo_producto, $idcategoria, $idsubcategoria, $codigo_pos, $nombre_es, $nombre_en,  $activo, $idusuario, $parametro, $parametro2));
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

	public function setProducto($tipo, $idproducto, $idtipo_producto, $idcategoria, $idsubcategoria, $codigo_pos, $nombre_es, 
								$nombre_en, $descripcion_es, $descripcion_en, $precio, $precio_esp, $activo, $idusuario, $parametro){

		$query = $this->db->query("CALL sp_producto_UID (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)",array($tipo, $idproducto, $idtipo_producto, $idcategoria, $idsubcategoria, $codigo_pos, $nombre_es, 
									$nombre_en, $descripcion_es, $descripcion_en, $precio, $precio_esp, $activo, $idusuario, $parametro));
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
	/**************** PROMOCIONES ****************/
	//////////////////////////////////////////////
	
	public function getPromociones($tipo, $idpromocion, $idproducto, $nombre_es, $nombre_en, $activa, $idusuario,  $parametro){

		$query = $this->db->query("CALL sp_promocion_B (?,?,?,?,?,?,?,?)",array($tipo, $idpromocion, $idproducto, $nombre_es, $nombre_en, $activa, $idusuario,  $parametro));
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

	public function getPromocion_master($tipo, $idpromocion, $idproducto, $nombre_es, $nombre_en, $activa, $idusuario,  $parametro){

		$query = $this->db->query("CALL sp_promocion_B (?,?,?,?,?,?,?,?)",array($tipo, $idpromocion, $idproducto, $nombre_es, $nombre_en, $activa, $idusuario,  $parametro));
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

	public function setPromocion($tipo, $idpromocion, $idproducto, $nombre_es, $nombre_en, $descripcion_es, $descripcion_en, $porc_descuento, $fecha_ini, $fecha_fin, $activa, $idusuario, $parametro){

		$query = $this->db->query("CALL sp_promocion_UID (?,?,?,?,?,?,?,?,?,?,?,?,?)",array($tipo, $idpromocion, $idproducto, $nombre_es, $nombre_en, $descripcion_es, $descripcion_en, $porc_descuento, $fecha_ini, $fecha_fin, $activa, $idusuario, $parametro));
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
	/**************** TEMPORADA ****************/
	//////////////////////////////////////////////
	public function getTemporadas($tipo, $idtemporada, $nombre_es, $nombre_en, $activa, $idusuario, $parametro){

		$query = $this->db->query("CALL sp_temporada_B (?,?,?,?,?,?,?)",array($tipo, $idtemporada, $nombre_es, $nombre_en, $activa, $idusuario,  $parametro));
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

	public function getTemporada_master($tipo, $idtemporada, $nombre_es, $nombre_en, $activa, $idusuario, $parametro){

		$query = $this->db->query("CALL sp_temporada_B (?,?,?,?,?,?,?)",array($tipo, $idtemporada, $nombre_es, $nombre_en, $activa, $idusuario,  $parametro));
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

	public function setTemporada($tipo, $idtemporada, $idpaquete, $nombre_es, $nombre_en, $descripcion_es, $descripcion_en, $fecha_ini, $fecha_fin, $activa, $idimagen, $nombre_imagen, $url_imagen, $idusuario, $parametro){

		$query = $this->db->query("CALL sp_temporada_UID (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)",array($tipo, $idtemporada, $idpaquete, $nombre_es, $nombre_en, $descripcion_es, $descripcion_en, $fecha_ini, $fecha_fin, $activa, $idimagen, $nombre_imagen, $url_imagen, $idusuario, $parametro));
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
	/****************** PAQUETE *****************/
	//////////////////////////////////////////////
	public function getPaquetes($tipo, $idpaquete, $idpaquete_deta, $idtemporada, $idcategoria, $nombre_es, $nombre_en, $activo, $idusuario, $parametro){

		$query = $this->db->query("CALL sp_paquete_B (?,?,?,?,?,?,?,?,?,?)",array($tipo, $idpaquete, $idpaquete_deta, $idtemporada, $idcategoria, $nombre_es, $nombre_en, $activo, $idusuario, $parametro));
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

	public function getPaquete($tipo, $idpaquete, $idpaquete_deta, $idtemporada, $idcategoria, $nombre_es, $nombre_en, $activo, $idusuario, $parametro){

		$query = $this->db->query("CALL sp_paquete_B (?,?,?,?,?,?,?,?,?,?)",array($tipo, $idpaquete, $idpaquete_deta, $idtemporada, $idcategoria, $nombre_es, $nombre_en, $activo, $idusuario, $parametro));
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

	public function setPaquete($tipo, $idpaquete, $idtemporada, $idcategoria, $descripcion_es, $descripcion_en, $fecha_ini_vta, 
							$fecha_fin_vta, $dias_vence_canje, $fecha_vence_canje, $activo, $cantidad_max, $idusuario, $parametro){

		$query = $this->db->query("CALL sp_paquete_UID (?,?,?,?,?,?,?,?,?,?,?,?,?,?)",array(	$tipo, $idpaquete, $idtemporada, $idcategoria, $descripcion_es, $descripcion_en, $fecha_ini_vta, 
																						$fecha_fin_vta, $dias_vence_canje, $fecha_vence_canje, $activo, $cantidad_max, $idusuario, $parametro));
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