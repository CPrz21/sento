<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AjaxSecciones extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{		
	}

	//////////////////////////////////////////////
	/**************** PRODUCTOS ****************/
	//////////////////////////////////////////////
	function getSecciones_ajax()
	{
		$this->load->model('SeccionesModel');

		$tipo			= ($this->input->post('tipo') != null ? $this->input->post('tipo') : 0);
		$idseccion		= ($this->input->post('idseccion') != null ? $this->input->post('idseccion') : 0); 
		$idusuario		= $this->session->userdata('user_id') ;
		$parametro		= ($this->input->post('parametro') != null ? $this->input->post('parametro') : '');

		$resultado = $this->SeccionesModel->getSecciones($tipo, $idseccion, $idusuario, $parametro);

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

	function getSeccion_ajax()
	{
		$this->load->model('SeccionesModel');

		$tipo			= ($this->input->post('tipo') != null ? $this->input->post('tipo') : 0);
		$idseccion		= ($this->input->post('idseccion') != null ? $this->input->post('idseccion') : 0); 
		$idusuario		= $this->session->userdata('user_id') ;
		$parametro		= ($this->input->post('parametro') != null ? $this->input->post('parametro') : '');

		$resultado = $this->SeccionesModel->getSeccion($tipo, $idseccion, $idusuario, $parametro);

        if ($resultado) 
        {
            $resultado_ = array('status'=>'OK', 'datatable' =>  $resultado);
            echo json_encode($resultado_);
        }
        else
        {
            echo json_encode(array('status'=>'SIN_DATOS','mensaje'=>'No se encontro la sección buscada...'));
        }
	}

	function setSeccion_ajax()
	{
		$this->load->model('SeccionesModel');

		$tipo			= ($this->input->post('tipo') != null ? $this->input->post('tipo') : 0);
		$idseccion		= ($this->input->post('idseccion') != null ? $this->input->post('idseccion') : 0); 
		$nombre_es		= ($this->input->post('nombre_es') != null ? $this->input->post('nombre_es') : '');
		$nombre_en		= ($this->input->post('nombre_en') != null ? $this->input->post('nombre_en') : '');
		$idusuario		= $this->session->userdata('user_id') ;
		$parametro		= ($this->input->post('parametro') != null ? $this->input->post('parametro') : '');

		$resultado = $this->SeccionesModel->setSeccion($tipo, $idseccion, $nombre_es, $nombre_en, $idusuario, $parametro);

        if ($resultado) 
        {
            $resultado_ = array('status'=>'OK', 'datatable' =>  $resultado);
            echo json_encode($resultado_);
        }
        else
        {
            echo json_encode(array('status'=>'ERROR','mensaje'=>'Error en el proceso...'));
        }
	}

	//////////////////////////////////////////////
	/**************** TEXTOS ****************/
	//////////////////////////////////////////////

	function getSeccionTextos_ajax()
	{
		$this->load->model('SeccionesModel');

		$tipo			= ($this->input->post('tipo') != null ? $this->input->post('tipo') : 0);
		$idseccion		= ($this->input->post('idseccion') != null ? $this->input->post('idseccion') : 0); 
		$idtexto		= ($this->input->post('idtexto') != null ? $this->input->post('idtexto') : 0); 
		$idusuario		= $this->session->userdata('user_id') ;
		$parametro		= ($this->input->post('parametro') != null ? $this->input->post('parametro') : '');

		$resultado_text = $this->SeccionesModel->getSeccionTextos($tipo, $idseccion, $idtexto, $idusuario, $parametro);

        if ($resultado_text) 
        {
            $resultado_ = array('status'=>'OK', 'datatable_text' =>  $resultado_text) ;
            echo json_encode($resultado_);
        }
        else
        {
            echo json_encode(array('status'=>'SIN_DATOS','mensaje'=>'No se encontraron textos...'));
        }
	}

	function getSeccionTextos_Imagen_ajax()
	{
		$this->load->model('SeccionesModel');

		$tipo			= ($this->input->post('tipo') != null ? $this->input->post('tipo') : 0);
		$idseccion		= ($this->input->post('idseccion') != null ? $this->input->post('idseccion') : 0); 
		$idtexto		= ($this->input->post('idtexto') != null ? $this->input->post('idtexto') : 0); 
		$idimagen		= ($this->input->post('idimagen') != null ? $this->input->post('idimagen') : 0); 
		$idusuario		= $this->session->userdata('user_id') ;
		$parametro		= ($this->input->post('parametro') != null ? $this->input->post('parametro') : '');

		$resultado_text = $this->SeccionesModel->getSeccionTextos($tipo, $idseccion, $idtexto, $idusuario, $parametro);
		$resultado_img 	= $this->SeccionesModel->getSeccionImagen($tipo, $idseccion, $idimagen, $idusuario, $parametro);

        if ($resultado_text && $resultado_img) 
        {
            $resultado_ = array('status'=>'OK', 'datatable_text' =>  $resultado_text, 'datatable_img' =>  $resultado_img) ;
            echo json_encode($resultado_);
        }
        else
        {
            echo json_encode(array('status'=>'SIN_DATOS','mensaje'=>'No se encontraron datos...'));
        }
	}
	
	function setSeccionTexto_ajax()
	{
		$this->load->model('SeccionesModel');

		$tipo			= ($this->input->post('tipo') != null ? $this->input->post('tipo') : 0);
		$idseccion		= ($this->input->post('idseccion') != null ? $this->input->post('idseccion') : 0); 
		$idtexto		= ($this->input->post('idtexto') != null ? $this->input->post('idtexto') : 0); 
		$orden			= ($this->input->post('orden') != null ? $this->input->post('orden') : 0); 
		$texto_es		= ($this->input->post('texto_es') != null ? $this->input->post('texto_es') : '');
		$texto_en		= ($this->input->post('texto_en') != null ? $this->input->post('texto_en') : '');
		$idusuario		= $this->session->userdata('user_id') ;
		$parametro		= ($this->input->post('parametro') != null ? $this->input->post('parametro') : '');

		$resultado = $this->SeccionesModel->setSeccionTexto($tipo, $idseccion, $idtexto, $orden, $texto_es, $texto_en, $idusuario, $parametro);

        if ($resultado) 
        {
            $resultado_ = array('status'=>'OK', 'datatable' =>  $resultado);
            echo json_encode($resultado_);
        }
        else
        {
            echo json_encode(array('status'=>'ERROR','mensaje'=>'Error en el proceso...'));
        }
	}


	//////////////////////////////////////////////
	/**************** IMAGEN ****************/
	//////////////////////////////////////////////

	function getSeccionImagen_ajax()
	{
		$this->load->model('SeccionesModel');

		$tipo			= ($this->input->post('tipo') != null ? $this->input->post('tipo') : 0);
		$idseccion		= ($this->input->post('idseccion') != null ? $this->input->post('idseccion') : 0); 
		$idimagen		= ($this->input->post('idimagen') != null ? $this->input->post('idimagen') : 0); 
		$idusuario		= $this->session->userdata('user_id') ;
		$parametro		= ($this->input->post('parametro') != null ? $this->input->post('parametro') : '');

		$resultado = $this->SeccionesModel->getSeccionImagen($tipo, $idseccion, $idimagen, $idusuario, $parametro);

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

	function setSeccionImagen_ajax()
	{
		$this->load->model('SeccionesModel');

		$tipo			= ($this->input->post('tipo') != null ? $this->input->post('tipo') : 0);
		$idseccion		= ($this->input->post('idseccion') != null ? $this->input->post('idseccion') : 0); 
		$idimagen		= ($this->input->post('idimagen') != null ? $this->input->post('idimagen') : 0); 
		$nombre			= ($this->input->post('nombre') != null ? $this->input->post('nombre') : ''); 
		$url			= ($this->input->post('url') != null ? $this->input->post('url') : '');
		$orden			= ($this->input->post('orden') != null ? $this->input->post('orden') : 0);
		$idusuario		= $this->session->userdata('user_id') ;
		$parametro		= ($this->input->post('parametro') != null ? $this->input->post('parametro') : '');

		$resultado = $this->SeccionesModel->setSeccionImagen($tipo, $idseccion, $idimagen, $nombre, $url, $orden, $idusuario, $parametro);

        if ($resultado) 
        {
            $resultado_ = array('status'=>'OK', 'datatable' =>  $resultado);
            echo json_encode($resultado_);
        }
        else
        {
            echo json_encode(array('status'=>'ERROR','mensaje'=>'Error en el proceso...'));
        }
	}

	function setSeccionImagenTexto_ajax()
	{
		$this->load->model('SeccionesModel');

		$tipo			= ($this->input->post('tipo') != null ? $this->input->post('tipo') : 0);
		$idimagen_texto = ($this->input->post('idimagen_texto') != null ? $this->input->post('idimagen_texto') : 0); 
		$idimagen		= ($this->input->post('idimagen') != null ? $this->input->post('idimagen') : 0); 
		$texto_es		= ($this->input->post('texto_es') != null ? $this->input->post('texto_es') : ''); 
		$texto_en		= ($this->input->post('texto_en') != null ? $this->input->post('texto_en') : '');
		$orden			= ($this->input->post('orden') != null ? $this->input->post('orden') : 0);
		$nota			= ($this->input->post('nota') != null ? $this->input->post('nota') : '');
		$idusuario		= $this->session->userdata('user_id') ;
		$parametro		= ($this->input->post('parametro') != null ? $this->input->post('parametro') : '');

		$resultado = $this->SeccionesModel->setSeccionImagenTexto($tipo, $idimagen_texto, $idimagen, $texto_es, $texto_en, $orden, $nota, $idusuario, $parametro);

        if ($resultado) 
        {
            $resultado_ = array('status'=>'OK', 'datatable' =>  $resultado);
            echo json_encode($resultado_);
        }
        else
        {
            echo json_encode(array('status'=>'ERROR','mensaje'=>'Error en el proceso...'));
        }
	}

	function getSeccionImagenTexto_ajax()
	{
		$this->load->model('SeccionesModel');

		$tipo			= ($this->input->post('tipo') != null ? $this->input->post('tipo') : 0);
		$idseccion		= ($this->input->post('idseccion') != null ? $this->input->post('idseccion') : 0); 
		$idimagen_texto	= ($this->input->post('idimagen_texto') != null ? $this->input->post('idimagen_texto') : 0); 
		$idimagen		= ($this->input->post('idimagen') != null ? $this->input->post('idimagen') : 0); 
		$orden			= ($this->input->post('orden') != null ? $this->input->post('orden') : 0); 
		$idusuario		= $this->session->userdata('user_id') ;
		$parametro		= ($this->input->post('parametro') != null ? $this->input->post('parametro') : '');

		$resultado_text = $this->SeccionesModel->getSeccionImagenTexto($tipo, $idseccion, $idimagen_texto, $idimagen, $orden, $idusuario, $parametro);

        if ($resultado) 
        {
            $resultado_ = array('status'=>'OK', 'datatable' =>  $resultado) ;
            echo json_encode($resultado_);
        }
        else
        {
            echo json_encode(array('status'=>'SIN_DATOS','mensaje'=>'No se encontraron datos...'));
        }
	}
}

/* End of file AjaxSecciones.php */
/* Location: ./application/controllers/AjaxSecciones.php */