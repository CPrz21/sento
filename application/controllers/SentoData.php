<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SentoData extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

  public function getIdioma(){
	  $idioma=$this->session->userdata('language');
		echo json_encode(array('idioma'=>$idioma));
	}

	function getSecciones(){
	  $tipo = $this->input->post('tipo');
	  //$idioma = $this->input->post('idioma');
		$idioma=$this->session->userdata('language');
	  $id_Seccion = $this->input->post('id');
	  $query = $this->db->query("CALL sp_carga_secciones_F_B($tipo,'".$idioma."',$id_Seccion)");

	  if ($query->num_rows() > 0) {
	      echo json_encode($query->result());
	  }else{
	      echo json_encode(array('status'=>'Error','message'=>'Data Error'));
	  }
	}




}
