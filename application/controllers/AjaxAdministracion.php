<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AjaxAdministracion extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
	}

	function get_data_C(){
		$this->load->model('AdministracionModel');
		$resultado = $this->AdministracionModel->get_data();
		if ($resultado)
		{
				$resultado_ = array('status'=>'OK', 'data' =>  $resultado);
				echo json_encode($resultado_);
		}
		else
		{
				echo json_encode(array('status'=>'SIN_DATOS','mensaje'=>'No se encontraron datos...'));
		}
	}

	//////////////////////////////////////////////
	/**************** CATEGORIAS ****************/
	//////////////////////////////////////////////

	function getCategorias_ajax()
	{
		//usleep(500000);
		$this->load->model('AdministracionModel');

		$tipo			= ($this->input->post('tipo') == null ? 0 : $this->input->post('tipo'));
		$idcategoria	= ($this->input->post('idcategoria') == null ? 0 : $this->input->post('idcategoria'));
		$idsubcategoria	= ($this->input->post('idsubcategoria') == null ? 0 : $this->input->post('idsubcategoria'));
		$nombre_es		= ($this->input->post('nombre_es') == null ? '' : $this->input->post('nombre_es'));
		$nombre_en		= ($this->input->post('nombre_en') == null ? '' : $this->input->post('nombre_en'));
		$activa			= ($this->input->post('activa') == null ? '' : $this->input->post('activa'));
		$idusuario		= $this->session->userdata('user_id') ;
		$parametro		= ($this->input->post('parametro') == null ? '' : $this->input->post('parametro'));

		$resultado = $this->AdministracionModel->getCategorias($tipo, $idcategoria, $idsubcategoria, $nombre_es, $nombre_en, $activa, $idusuario, $parametro);

        if ($resultado)
        {
            $resultado_ = array('status'=>'OK', 'datatable' =>  $resultado);
            echo json_encode($resultado_);
        }
        else
        {
            echo json_encode(array('status'=>'SIN_DATOS','mensaje'=>'No se encontraron datos...'));
        }
	}

	function setCategorias_ajax()
    {
    	usleep(500000);
        $this->load->model('AdministracionModel');

        $tipo			= ($this->input->post('tipo') == null ? 0 : $this->input->post('tipo'));
		$idcategoria	= ($this->input->post('idcategoria') == null ? 0 : $this->input->post('idcategoria'));
		$idsubcategoria	= ($this->input->post('idsubcategoria') == null ? 0 : $this->input->post('idsubcategoria'));
		$nombre_es		= ($this->input->post('nombre_es') == null ? '' : $this->input->post('nombre_es'));
		$nombre_en		= ($this->input->post('nombre_en') == null ? '' : $this->input->post('nombre_en'));
		$descripcion_es	= ($this->input->post('descripcion_es') == null ? '' : $this->input->post('descripcion_es'));
		$descripcion_en	= ($this->input->post('descripcion_en') == null ? '' : $this->input->post('descripcion_en'));
		$activa			= ($this->input->post('activa') == null ? '' : $this->input->post('activa'));
		$idusuario		= $this->session->userdata('user_id') ;
		$parametro		= ($this->input->post('parametro') == null ? '' : $this->input->post('parametro'));

        $resultado = $this->AdministracionModel->setCategorias($tipo, $idcategoria, $idsubcategoria, $nombre_es, $nombre_en, $descripcion_es, $descripcion_en, $activa, $idusuario, $parametro);

        if ($resultado)
        {
            echo json_encode($resultado);
        }
        else
        {
            echo json_encode(array('status'=>'ERROR','mensaje'=>'Error en el proceso'));
        }
    }

	//////////////////////////////////////////////
	/**************** PRODUCTOS ****************/
	//////////////////////////////////////////////


	function getTipoProducto_ajax()
	{
		//usleep(500000);
		$this->load->model('AdministracionModel');

		$tipo			= ($this->input->post('tipo') == null ? 0 : $this->input->post('tipo'));
		$idproducto		= ($this->input->post('idproducto') == null ? 0 : $this->input->post('idproducto'));
		$idtipo_producto	= ($this->input->post('idtipo_producto') == null ? 0 : $this->input->post('idtipo_producto'));
		$idcategoria	= ($this->input->post('idcategoria') == null ? 0 : $this->input->post('idcategoria'));
		$idsubcategoria	= ($this->input->post('idsubcategoria') == null ? 0 : $this->input->post('idsubcategoria'));
		$nombre_es		= ($this->input->post('nombre_es') == null ? '' : $this->input->post('nombre_es'));
		$nombre_en		= ($this->input->post('nombre_en') == null ? '' : $this->input->post('nombre_en'));
		$activa			= ($this->input->post('activa') == null ? '' : $this->input->post('activa'));
		$idusuario		= $this->session->userdata('user_id') ;
		$parametro		= ($this->input->post('parametro') == null ? '' : $this->input->post('parametro'));

		$resultado = $this->AdministracionModel->getTipoProducto($tipo, $idproducto, $idtipo_producto, $idcategoria, $idsubcategoria, $nombre_es, $nombre_en,  $activo, $idusuario, $parametro);

        if ($resultado)
        {
            $resultado_ = array('status'=>'OK', 'datatable' =>  $resultado);
            echo json_encode($resultado_);
        }
        else
        {
            echo json_encode(array('status'=>'SIN_DATOS','mensaje'=>'No se encontraron datos...'));
        }
	}


}

/* End of file AjaxAdministracion.php */
/* Location: ./application/controllers/AjaxAdministracion.php */
