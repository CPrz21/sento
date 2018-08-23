<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SeccionesModel extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}


	//////////////////////////////////////////////
	/**************** Secciones ****************/
	//////////////////////////////////////////////
	
	public function getSecciones($tipo, $idseccion, $idusuario, $parametro){

		$query = $this->db->query("CALL sp_seccion_B (?,?,?,?)",array($tipo, $idseccion, $idusuario, $parametro));
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

	public function getSeccion($tipo, $idseccion, $idusuario, $parametro){

		$query = $this->db->query("CALL sp_seccion_B (?,?,?,?)",array($tipo, $idseccion, $idusuario, $parametro));
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

	public function setSeccion($tipo, $idseccion, $nombre_es, $nombre_en, $idusuario, $parametro){

		$query = $this->db->query("CALL sp_seccion_UID (?,?,?,?,?,?)",array($tipo, $idseccion, $nombre_es, $nombre_en, $idusuario, $parametro));
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
	/**************** Texto ****************/
	//////////////////////////////////////////////
	
	public function getSeccionTextos($tipo, $idseccion, $idtexto, $idusuario, $parametro){

		$query = $this->db->query("CALL sp_seccion_texto_B (?,?,?,?,?)",array($tipo, $idseccion, $idtexto, $idusuario, $parametro));
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

	public function setSeccionTexto($tipo, $idseccion, $idtexto, $orden, $texto_es, $texto_en, $idusuario, $parametro){

		$query = $this->db->query("CALL sp_seccion_texto_UID(?,?,?,?,?,?,?,?)",array($tipo, $idseccion, $idtexto, $orden, $texto_es, $texto_en, $idusuario, $parametro));
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
	/**************** Imagen ****************/
	//////////////////////////////////////////////
	
	public function getSeccionImagen($tipo, $idseccion, $idimagen, $idusuario, $parametro){

		$query = $this->db->query("CALL sp_seccion_imagen_B (?,?,?,?,?)",array($tipo, $idseccion, $idimagen, $idusuario, $parametro));
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

	public function setSeccionImagen($tipo, $idseccion, $idimagen, $nombre, $url, $orden, $idusuario, $parametro){

		$query = $this->db->query("CALL sp_seccion_imagen_UID (?,?,?,?,?,?,?,?)",array($tipo, $idseccion, $idimagen, $nombre, $url, $orden, $idusuario, $parametro));
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

	public function setSeccionImagenTexto($tipo, $idimagen_texto, $idimagen, $texto_es, $texto_en, $orden, $nota, $idusuario, $parametro){

		$query = $this->db->query("CALL sp_seccion_imagen_texto_UID (?,?,?,?,?,?,?,?,?)",array($tipo, $idimagen_texto, $idimagen, $texto_es, $texto_en, $orden, $nota, $idusuario, $parametro));
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

	public function getSeccionImagenTexto($tipo, $idseccion, $idimagen_texto, $idimagen, $orden, $idusuario, $parametro){

		$query = $this->db->query("CALL sp_seccion_imagen_texto_B (?,?,?,?,?,?,?)",array($tipo, $idseccion, $idimagen_texto, $idimagen, $orden, $idusuario, $parametroo));
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

}

/* End of file SeccionesModel.php */
/* Location: ./application/models/SeccionesModel.php */