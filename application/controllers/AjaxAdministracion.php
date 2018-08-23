<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AjaxAdministracion extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{		
	}

	//////////////////////////////////////////////
	/**************** CATEGORIAS ****************/
	//////////////////////////////////////////////

	function getCategorias_ajax()
	{
		//usleep(500000);
		$this->load->model('AdministracionModel');

		$tipo			= ($this->input->post('tipo') != null ? $this->input->post('tipo') : 0);
		$idcategoria	= ($this->input->post('idcategoria') != null ? $this->input->post('idcategoria') : 0); 
		$idsubcategoria	= ($this->input->post('idsubcategoria') != null ? $this->input->post('idsubcategoria') : 0);
		$nombre_es		= ($this->input->post('nombre_es') != null ? $this->input->post('nombre_es') : ''); 
		$nombre_en		= ($this->input->post('nombre_en') != null ? $this->input->post('nombre_en') : '');
		$activa			= ($this->input->post('activa') != null ? $this->input->post('activa') : ''); 
		$idusuario		= $this->session->userdata('user_id') ;
		$parametro		= ($this->input->post('parametro') != null ? $this->input->post('parametro') : '');

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

        $tipo			= ($this->input->post('tipo') != null ? $this->input->post('tipo') : 0);
		$idcategoria	= ($this->input->post('idcategoria') != null ? $this->input->post('idcategoria') : 0); 
		$idsubcategoria	= ($this->input->post('idsubcategoria') != null ? $this->input->post('idsubcategoria') : 0);
		$nombre_es		= ($this->input->post('nombre_es') != null ? $this->input->post('nombre_es') : '' ); 
		$nombre_en		= ($this->input->post('nombre_en') != null ? $this->input->post('nombre_en'): '');
		$descripcion_es	= ($this->input->post('descripcion_es') != null ? $this->input->post('descripcion_es') : ''); 
		$descripcion_en	= ($this->input->post('descripcion_en')!= null ? $this->input->post('descripcion_en') : '');
		$activa			= ($this->input->post('activa') != null ? $this->input->post('activa') : ''); 
		$idusuario		= $this->session->userdata('user_id') ;
		$parametro		= ($this->input->post('parametro') != null ? $this->input->post('parametro') : '');

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

		$tipo			= ($this->input->post('tipo') != null ? $this->input->post('tipo') : 0);
		$idtipo_producto= ($this->input->post('idtipo_producto') != null ? $this->input->post('idtipo_producto') : 0); 
		$idusuario		= $this->session->userdata('user_id') ;
		$parametro		= ($this->input->post('parametro') != null ? $this->input->post('parametro') : '');

		$resultado = $this->AdministracionModel->getTipoProducto($tipo, $idtipo_producto, $idusuario, $parametro);

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

	function getProductos_ajax()
	{
		//usleep(500000);
		$this->load->model('AdministracionModel');

		$tipo			= ($this->input->post('tipo') != null ? $this->input->post('tipo') : 0);
		$idproducto		= ($this->input->post('idproducto') != null ? $this->input->post('idproducto') : 0); 
		$idtipo_producto= ($this->input->post('idtipo_producto') != null ? $this->input->post('idtipo_producto') : 0); 
		$idcategoria	= ($this->input->post('idcategoria') != null ? $this->input->post('idcategoria') : 0); 
		$idsubcategoria	= ($this->input->post('idsubcategoria') != null ? $this->input->post('idsubcategoria') : 0);
		$codigo_pos		= ($this->input->post('codigo_pos') != null ? $this->input->post('codigo_pos') : ''); 
		$nombre_es		= ($this->input->post('nombre_es') != null ? $this->input->post('nombre_es') : ''); 
		$nombre_en		= ($this->input->post('nombre_en') != null ? $this->input->post('nombre_en') : '');
		$activo			= ($this->input->post('activo') != null ? $this->input->post('activo') : ''); 
		$idusuario		= $this->session->userdata('user_id') ;
		$parametro		= ($this->input->post('parametro') != null ? $this->input->post('parametro') : '');
		$parametro2		= ($this->input->post('parametro2') != null ? $this->input->post('parametro2') : '');

		$resultado = $this->AdministracionModel->getProductos($tipo, $idproducto, $idtipo_producto, $idcategoria, $idsubcategoria, $codigo_pos, $nombre_es, $nombre_en,  $activo, $idusuario, $parametro, $parametro2);

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

	function getProducto_deta_ajax()
	{
		$this->load->model('AdministracionModel');

		$tipo			= ($this->input->post('tipo') != null ? $this->input->post('tipo') : 0);
		$idproducto		= ($this->input->post('idproducto') != null ? $this->input->post('idproducto') : 0); 
		$idtipo_producto= ($this->input->post('idtipo_producto') != null ? $this->input->post('idtipo_producto') : 0); 
		$idcategoria	= ($this->input->post('idcategoria') != null ? $this->input->post('idcategoria') : 0); 
		$idsubcategoria	= ($this->input->post('idsubcategoria') != null ? $this->input->post('idsubcategoria') : 0);
		$codigo_pos		= ($this->input->post('codigo_pos') != null ? $this->input->post('codigo_pos') : ''); 
		$nombre_es		= ($this->input->post('nombre_es') != null ? $this->input->post('nombre_es') : ''); 
		$nombre_en		= ($this->input->post('nombre_en') != null ? $this->input->post('nombre_en') : '');
		$activo			= ($this->input->post('activo') != null ? $this->input->post('activo') : ''); 
		$idusuario		= $this->session->userdata('user_id') ;
		$parametro		= ($this->input->post('parametro') != null ? $this->input->post('parametro') : '');
		$parametro2		= ($this->input->post('parametro2') != null ? $this->input->post('parametro2') : '');

		$resultado = $this->AdministracionModel->getProducto_deta($tipo, $idproducto, $idtipo_producto, $idcategoria, $idsubcategoria, $codigo_pos, $nombre_es, $nombre_en,  $activo, $idusuario, $parametro, $parametro2);

        if ($resultado) 
        {
            $resultado_ = array('status'=>'OK', 'datatable' =>  $resultado);
            echo json_encode($resultado_);
        }
        else
        {
            echo json_encode(array('status'=>'SIN_DATOS','mensaje'=>'No se encontro el producto buscado...'));
        }
	}

	function setProducto_ajax()  
    {    	
        $this->load->model('AdministracionModel');

        $tipo			= ($this->input->post('tipo') != null ? $this->input->post('tipo') : 0);
		$idproducto		= ($this->input->post('idproducto') != null ? $this->input->post('idproducto') : 0); 
		$idtipo_producto= ($this->input->post('idtipo_producto') != null ? $this->input->post('idtipo_producto') : 0); 
		$idcategoria	= ($this->input->post('idcategoria') != null ? $this->input->post('idcategoria') : 0); 
		$idsubcategoria	= ($this->input->post('idsubcategoria') != null ? $this->input->post('idsubcategoria') : 0);
		$codigo_pos		= ($this->input->post('codigo_pos') != null ? $this->input->post('codigo_pos') : ''); 
		$nombre_es		= ($this->input->post('nombre_es') != null ? $this->input->post('nombre_es') : ''); 
		$nombre_en		= ($this->input->post('nombre_en') != null ? $this->input->post('nombre_en') : '');
		$descripcion_es	= ($this->input->post('descripcion_es') != null ? $this->input->post('descripcion_es') : ''); 
		$descripcion_en	= ($this->input->post('descripcion_en') != null ? $this->input->post('descripcion_en') : '');
		$activo			= ($this->input->post('activo') != null ? $this->input->post('activo') : 'N'); 
		$precio_esp		= ($this->input->post('precio_esp') != null ? $this->input->post('precio_esp') : 0); 
		$precio			= ($this->input->post('precio') != null ? $this->input->post('precio') : 0); 
		$idusuario		= $this->session->userdata('user_id') ;
		$parametro		= ($this->input->post('parametro') != null ? $this->input->post('parametro') : '');

		$resultado = $this->AdministracionModel->setProducto($tipo, $idproducto, $idtipo_producto, $idcategoria, $idsubcategoria, $codigo_pos, $nombre_es, $nombre_en, 
															$descripcion_es, $descripcion_en, $precio, $precio_esp, $activo, $idusuario, $parametro);

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
	/**************** PROMOCIONES ****************/
	//////////////////////////////////////////////
	function getPromociones_ajax()
	{
		//usleep(500000);
		$this->load->model('AdministracionModel');

		$tipo			= ($this->input->post('tipo') != null ? $this->input->post('tipo') : 0);
		$idpromocion	= ($this->input->post('idpromocion') != null ? $this->input->post('idpromocion') : 0);
		$idproducto		= ($this->input->post('idproducto') != null ? $this->input->post('idproducto') : 0);
		$nombre_es		= ($this->input->post('nombre_es') != null ? $this->input->post('nombre_es') : ''); 
		$nombre_en		= ($this->input->post('nombre_en') != null ? $this->input->post('nombre_en') : ''); 
		$activa			= ($this->input->post('activa') != null ? $this->input->post('activa') : 'N');  
		$idusuario		= $this->session->userdata('user_id') ;
		$parametro		= ($this->input->post('parametro') != null ? $this->input->post('parametro') : '');

		$resultado = $this->AdministracionModel->getPromociones($tipo, $idpromocion, $idproducto, $nombre_es, $nombre_en, $activa, $idusuario,  $parametro);

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

	function getPromocion_master_ajax()
	{
		//usleep(500000);
		$this->load->model('AdministracionModel');

		$tipo			= ($this->input->post('tipo') != null ? $this->input->post('tipo') : 0);
		$idpromocion	= ($this->input->post('idpromocion') != null ? $this->input->post('idpromocion') : 0);
		$idproducto		= ($this->input->post('idproducto') != null ? $this->input->post('idproducto') : 0);
		$nombre_es		= ($this->input->post('nombre_es') != null ? $this->input->post('nombre_es') : ''); 
		$nombre_en		= ($this->input->post('nombre_en') != null ? $this->input->post('nombre_en') : ''); 
		$activa			= ($this->input->post('activa') != null ? $this->input->post('activa') : 'N');  
		$idusuario		= $this->session->userdata('user_id') ;
		$parametro		= ($this->input->post('parametro') != null ? $this->input->post('parametro') : '');

		$resultado = $this->AdministracionModel->getPromocion_master($tipo, $idpromocion, $idproducto, $nombre_es, $nombre_en, $activa, $idusuario,  $parametro);

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

	function setPromocion_ajax()  
    {    	
        $this->load->model('AdministracionModel');

        $tipo			= ($this->input->post('tipo') != null ? $this->input->post('tipo') : 0);
        $idpromocion	= ($this->input->post('idpromocion') != null ? $this->input->post('idpromocion') : 0); 
		$idproducto		= ($this->input->post('idproducto') != null ? $this->input->post('idproducto') : 0); 
		$nombre_es		= ($this->input->post('nombre_es') != null ? $this->input->post('nombre_es') : ''); 
		$nombre_en		= ($this->input->post('nombre_en') != null ? $this->input->post('nombre_en') : '');
		$descripcion_es	= ($this->input->post('descripcion_es') != null ? $this->input->post('descripcion_es') : ''); 
		$descripcion_en	= ($this->input->post('descripcion_en') != null ? $this->input->post('descripcion_en') : '');
		$porc_descuento	= ($this->input->post('porc_descuento') != null ? $this->input->post('porc_descuento') : 0); 
		$fecha_ini		= ($this->input->post('fecha_ini') != null ? $this->input->post('fecha_ini') : '');
		$fecha_fin		= ($this->input->post('fecha_fin') != null ? $this->input->post('fecha_fin') : ''); 
		$activa			= ($this->input->post('activa') != null ? $this->input->post('activa') : 'N'); 
		$idusuario		= $this->session->userdata('user_id') ;
		$parametro		= ($this->input->post('parametro') != null ? $this->input->post('parametro') : '');

        $resultado = $this->AdministracionModel->setPromocion($tipo, $idpromocion, $idproducto, $nombre_es, $nombre_en, $descripcion_es, $descripcion_en, $porc_descuento, $fecha_ini, $fecha_fin, $activa, $idusuario, $parametro);

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
	/**************** TEMPORADA ****************/
	//////////////////////////////////////////////
	function getTemporadas_ajax()
	{
		$this->load->model('AdministracionModel');

		$tipo			= ($this->input->post('tipo') != null ? $this->input->post('tipo') : 0);
		$idtemporada	= ($this->input->post('idtemporada') != null ? $this->input->post('idtemporada') : 0);
		$nombre_es		= ($this->input->post('nombre_es') != null ? $this->input->post('nombre_es') : ''); 
		$nombre_en		= ($this->input->post('nombre_en') != null ? $this->input->post('nombre_en') : ''); 
		$activa			= ($this->input->post('activa') != null ? $this->input->post('activa') : 'N');  
		$idusuario		= $this->session->userdata('user_id') ;
		$parametro		= ($this->input->post('parametro') != null ? $this->input->post('parametro') : '');

		$resultado = $this->AdministracionModel->getTemporadas($tipo, $idtemporada, $nombre_es, $nombre_en, $activa, $idusuario,  $parametro);

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

	function getTemporada_master_ajax()
	{
		//usleep(500000);
		$this->load->model('AdministracionModel');

		$tipo			= ($this->input->post('tipo') != null ? $this->input->post('tipo') : 0);
		$idtemporada	= ($this->input->post('idtemporada') != null ? $this->input->post('idtemporada') : 0);
		$nombre_es		= ($this->input->post('nombre_es') != null ? $this->input->post('nombre_es') : ''); 
		$nombre_en		= ($this->input->post('nombre_en') != null ? $this->input->post('nombre_en') : ''); 
		$activa			= ($this->input->post('activa') != null ? $this->input->post('activa') : 'N');  
		$idusuario		= $this->session->userdata('user_id') ;
		$parametro		= ($this->input->post('parametro') != null ? $this->input->post('parametro') : '');

		$resultado = $this->AdministracionModel->getTemporada_master($tipo, $idtemporada, $nombre_es, $nombre_en, $activa, $idusuario, $parametro);

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

	function setTemporada_ajax()  
    {    	
        $this->load->model('AdministracionModel');

        $tipo			= ($this->input->post('tipo') != null ? $this->input->post('tipo') : 0);
        $idtemporada	= ($this->input->post('idtemporada') != null ? $this->input->post('idtemporada') : 0); 
		$idpaquete		= ($this->input->post('idpaquete') != null ? $this->input->post('idpaquete') : 0); 
		$nombre_es		= ($this->input->post('nombre_es') != null ? $this->input->post('nombre_es') : ''); 
		$nombre_en		= ($this->input->post('nombre_en') != null ? $this->input->post('nombre_en') : '');
		$descripcion_es	= ($this->input->post('descripcion_es') != null ? $this->input->post('descripcion_es') : ''); 
		$descripcion_en	= ($this->input->post('descripcion_en') != null ? $this->input->post('descripcion_en') : '');
		$fecha_ini		= ($this->input->post('fecha_ini') != null ? $this->input->post('fecha_ini') : '');
		$fecha_fin		= ($this->input->post('fecha_fin') != null ? $this->input->post('fecha_fin') : ''); 
		$activa			= ($this->input->post('activa') != null ? $this->input->post('activa') : 'N'); 
		$idimagen		= ($this->input->post('idimagen') != null ? $this->input->post('idimagen') : 0); 
		$nombre_imagen	= ($this->input->post('nombre_imagen') != null ? $this->input->post('nombre_imagen') : ''); 
		$url_imagen		= ($this->input->post('url_imagen') != null ? $this->input->post('url_imagen') : ''); 
		$idusuario		= $this->session->userdata('user_id') ;
		$parametro		= ($this->input->post('parametro') != null ? $this->input->post('parametro') : '');

        $resultado = $this->AdministracionModel->setTemporada($tipo, $idtemporada, $idpaquete, $nombre_es, $nombre_en, $descripcion_es, $descripcion_en, $fecha_ini, $fecha_fin, $activa, $idimagen, $nombre_imagen, $url_imagen, $idusuario, $parametro);

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
	/***************** PAQUETE *****************/
	//////////////////////////////////////////////
	function getPaquetes_ajax()
	{
		$this->load->model('AdministracionModel');

		$tipo			= ($this->input->post('tipo') != null ? $this->input->post('tipo') : 0);
		$idpaquete		= ($this->input->post('idpaquete') != null ? $this->input->post('idpaquete') : 0);
		$idpaquete_deta	= ($this->input->post('idpaquete_deta') != null ? $this->input->post('idpaquete_deta') : 0);
		$idtemporada	= ($this->input->post('idtemporada') != null ? $this->input->post('idtemporada') : 0);
		$idcategoria	= ($this->input->post('idcategoria') != null ? $this->input->post('idcategoria') : 0);
		$nombre_es		= ($this->input->post('nombre_es') != null ? $this->input->post('nombre_es') : ''); 
		$nombre_en		= ($this->input->post('nombre_en') != null ? $this->input->post('nombre_en') : ''); 
		$activo			= ($this->input->post('activo') != null ? $this->input->post('activo') : 'N');  
		$idusuario		= $this->session->userdata('user_id') ;
		$parametro		= ($this->input->post('parametro') != null ? $this->input->post('parametro') : '');

		$resultado = $this->AdministracionModel->getPaquetes($tipo, $idpaquete, $idpaquete_deta, $idtemporada, $idcategoria, $nombre_es, $nombre_en, $activo, $idusuario, $parametro);

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

	function getPaquete_ajax()
	{
		$this->load->model('AdministracionModel');

		$tipo			= ($this->input->post('tipo') != null ? $this->input->post('tipo') : 0);
		$idpaquete		= ($this->input->post('idpaquete') != null ? $this->input->post('idpaquete') : 0);
		$idpaquete_deta	= ($this->input->post('idpaquete_deta') != null ? $this->input->post('idpaquete_deta') : 0);
		$idtemporada	= ($this->input->post('idtemporada') != null ? $this->input->post('idtemporada') : 0);
		$idcategoria	= ($this->input->post('idcategoria') != null ? $this->input->post('idcategoria') : 0);
		$nombre_es		= ($this->input->post('nombre_es') != null ? $this->input->post('nombre_es') : ''); 
		$nombre_en		= ($this->input->post('nombre_en') != null ? $this->input->post('nombre_en') : ''); 
		$activo			= ($this->input->post('activo') != null ? $this->input->post('activo') : 'N');  
		$idusuario		= $this->session->userdata('user_id') ;
		$parametro		= ($this->input->post('parametro') != null ? $this->input->post('parametro') : '');

		$resultado = $this->AdministracionModel->getPaquete($tipo, $idpaquete, $idpaquete_deta, $idtemporada, $idcategoria, $nombre_es, $nombre_en, $activo, $idusuario, $parametro);

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

	function setPaquete_ajax()  
    {    	
        $this->load->model('AdministracionModel');

		$tipo			= ($this->input->post('tipo') != null ? $this->input->post('tipo') : 0);
		$idpaquete		= ($this->input->post('idpaquete') != null ? $this->input->post('idpaquete') : 0); 
        $idtemporada	= ($this->input->post('idtemporada') != null ? $this->input->post('idtemporada') : 0); 
		$idcategoria	= ($this->input->post('idcategoria') != null ? $this->input->post('idcategoria') : 0); 
		$descripcion_es	= ($this->input->post('descripcion_es') != null ? $this->input->post('descripcion_es') : ''); 
		$descripcion_en	= ($this->input->post('descripcion_en') != null ? $this->input->post('descripcion_en') : '');
		$fecha_ini_vta		= ($this->input->post('fecha_ini_vta') != null ? $this->input->post('fecha_ini_vta') : '');
		$fecha_fin_vta		= ($this->input->post('fecha_fin_vta') != null ? $this->input->post('fecha_fin_vta') : '');
		$dias_vence_canje	= ($this->input->post('dias_vence_canje') != null ? $this->input->post('dias_vence_canje') : 0); 
		$fecha_vence_canje	= ($this->input->post('fecha_vence_canje') != null ? $this->input->post('fecha_vence_canje') : '');
		$activo			= ($this->input->post('activo') != null ? $this->input->post('activo') : 'N'); 
		$cantidad_max   = ($this->input->post('cantidad_max') != null ? $this->input->post('cantidad_max') : 0); 
		$idusuario		= $this->session->userdata('user_id') ;
		$parametro		= ($this->input->post('parametro') != null ? $this->input->post('parametro') : '');

		$resultado = $this->AdministracionModel->setPaquete(	$tipo, $idpaquete, $idtemporada, $idcategoria, $descripcion_es, $descripcion_en, $fecha_ini_vta, 
																$fecha_fin_vta, $dias_vence_canje, $fecha_vence_canje, $activo, $cantidad_max, $idusuario, $parametro);

        if ($resultado) 
        {
            echo json_encode($resultado);
        }
        else
        {
            echo json_encode(array('status'=>'ERROR','mensaje'=>'Error en el proceso'));
        }
    }
}

/* End of file AjaxAdministracion.php */
/* Location: ./application/controllers/AjaxAdministracion.php */