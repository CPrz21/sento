<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AjaxCMS extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		
	}

	function getMenu_ajax()
	{
		//usleep(500000);
		$this->load->model('CMSModel');

		$tipo           = $this->input->post('tipo');
        $idusuario      = $this->session->userdata('user_id');
        $idmenu         = 2;  
        $idmenu_deta 	= 0;  
        $parametro      = $this->input->post('parametro');  
		
		$resultado = $this->CMSModel->getMenu($tipo, $idusuario, $idmenu, $idmenu_deta, $parametro);

        if ($resultado) {
            $resultado_ = array('status'=>'OK', 'datatable' =>  $resultado);
            echo json_encode($resultado_);
        }
        else{
            echo json_encode(array('status'=>'SIN_DATOS','mensaje'=>'Usuario, no tiene privilegios al sistema'));
        }
	}

}

/* End of file AjaxCMS.php */
/* Location: ./application/controllers/AjaxCMS.php */