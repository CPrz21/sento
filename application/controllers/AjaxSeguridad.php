<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AjaxSeguridad extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		
	}

	//////////////////////////////////////////////
	/**************** USUARIOS ****************/
	//////////////////////////////////////////////

	function getUsuarios_ajax()
	{
		//usleep(500000);
		$this->load->model('SeguridadModel');

		$tipo			= ($this->input->post('tipo') != null ? $this->input->post('tipo') : 0);
		$idusuario		= ($this->input->post('idusuario') != null ? $this->input->post('idusuario') : 0); 
		$usuario 		= ($this->input->post('usuario') != null ? $this->input->post('usuario') : ''); 
		$nombre			= ($this->input->post('nombre') != null ? $this->input->post('nombre') : ''); 
		$activo			= ($this->input->post('activo') != null ? $this->input->post('activo') : ''); 
		$idusuario_filtra= $this->session->userdata('user_id') ;
		$parametro		= ($this->input->post('parametro') != null ? $this->input->post('parametro') : '');

		$resultado = $this->SeguridadModel->getUsuarios($tipo, $idusuario, $usuario, $nombre, $activo, $idusuario_filtra, $parametro);

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

	function getUsuario_ajax()
	{
		$this->load->model('SeguridadModel');

		$tipo			= ($this->input->post('tipo') != null ? $this->input->post('tipo') : 0);
		$idusuario		= ($this->input->post('idusuario') != null ? $this->input->post('idusuario') : 0); 
		$usuario 		= ($this->input->post('usuario') != null ? $this->input->post('usuario') : ''); 
		$nombre			= ($this->input->post('nombre') != null ? $this->input->post('nombre') : ''); 
		$activo			= ($this->input->post('activo') != null ? $this->input->post('activo') : ''); 
		$idusuario_filtra= $this->session->userdata('user_id') ;
		$parametro		= ($this->input->post('parametro') != null ? $this->input->post('parametro') : '');

		$resultado = $this->SeguridadModel->getUsuario($tipo, $idusuario, $usuario, $nombre, $activo, $idusuario_filtra, $parametro);

        if ($resultado) 
        {
            $resultado_ = array('status'=>'OK', 'datatable' =>  $resultado);
            echo json_encode($resultado_);
        }
        else
        {
            echo json_encode(array('status'=>'SIN_DATOS','mensaje'=>'No se encontro el usuario buscado...'));
        }
	}

	function setUsuario_ajax()  
    {    	
        $this->load->model('SeguridadModel');

        $tipo			= ($this->input->post('tipo') != null ? $this->input->post('tipo') : 0);
		$idusuario		= ($this->input->post('idusuario') != null ? $this->input->post('idusuario') : 0); 
		$usuario 		= ($this->input->post('usuario') != null ? $this->input->post('usuario') : ''); 
		$nombre			= ($this->input->post('nombre') != null ? $this->input->post('nombre') : ''); 
		$email 			= ($this->input->post('email') != null ? $this->input->post('email') : '');
		$password		= ($this->input->post('password') != null ? $this->input->post('password') : ''); 
		$activo			= ($this->input->post('activo') != null ? $this->input->post('activo') : 'N'); 
		$idusuario_tipo	= ($this->input->post('idusuario_tipo') != null ? $this->input->post('idusuario_tipo') : 0); 
		$idusuario_filtra= $this->session->userdata('user_id') ;
		$parametro		= ($this->input->post('parametro') != null ? $this->input->post('parametro') : '');

        $resultado = $this->SeguridadModel->setUsuario($tipo, $idusuario, $usuario, $nombre, $email, $password, $activo, $idusuario_tipo, $idusuario_filtra, $parametro);

        if ($resultado) 
        {
            echo json_encode($resultado);
        }
        else
        {
            echo json_encode(array('status'=>'ERROR','mensaje'=>'Error en el proceso'));
        }
    }


    function getMenuUsuario_ajax()
	{
		//usleep(500000);
		$this->load->model('SeguridadModel');

		$tipo           = ($this->input->post('tipo') != null ? $this->input->post('tipo') : 0);
        $idusuario      = ($this->input->post('idusuario') != null ? $this->input->post('idusuario') : 0); 
        $idmenu         = 2;  
        $idmenu_deta 	= ($this->input->post('idmenu_deta') != null ? $this->input->post('idmenu_deta') : 0);  
        $parametro      = ($this->input->post('parametro') != null ? $this->input->post('parametro') : '');

		$resultado = $this->SeguridadModel->getMenuUsuario($tipo, $idusuario, $idmenu, $idmenu_deta, $parametro);

        if ($resultado) 
        {
            $resultado_ = array('status'=>'OK', 'datatable' =>  $resultado);
            echo json_encode($resultado_);
        }
        else{
            echo json_encode(array('status'=>'ERROR','mensaje'=>'Error en el proceso'));
        }
	}

	function setMenuUsuario_ajax()  
    {    	
        $this->load->model('SeguridadModel');

        $tipo			= ($this->input->post('tipo') != null ? $this->input->post('tipo') : 0);
		$idusuario		= ($this->input->post('idusuario') != null ? $this->input->post('idusuario') : 0); 
		$idmenu 		= 2; 
		$idmenu_deta 	= ($this->input->post('idmenu_deta') != null ? $this->input->post('idmenu_deta') : 0); 
		$idmodulo		= ($this->input->post('idmodulo') != null ? $this->input->post('idmodulo') : '0');
		$idusuario_filtra= $this->session->userdata('user_id') ;
		$parametro		= ($this->input->post('parametro') != null ? $this->input->post('parametro') : '');

        $resultado = $this->SeguridadModel->setMenuUsuario($tipo, $idusuario, $idmenu, $idmenu_deta, $idmodulo, $idusuario_filtra, $parametro);

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
	/************** LOG DE ACCESOS **************/
    //////////////////////////////////////////////
    
    function getUsuarioAccesoLog_ajax()
	{
		//usleep(500000);
		$this->load->model('SeguridadModel');

		$tipo           = ($this->input->post('tipo') != null ? $this->input->post('tipo') : 0);
        $idusuario      = ($this->input->post('idusuario') != null ? $this->input->post('idusuario') : 0); 
        $parametro      = ($this->input->post('parametro') != null ? $this->input->post('parametro') : '');

		$resultado = $this->SeguridadModel->getUsuarioAccesoLog($tipo, $idusuario, $parametro);

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

	function setUsuarioAccesoLog_ajax()  
    {    	
        $this->load->model('SeguridadModel');

        $tipo			= ($this->input->post('tipo') != null ? $this->input->post('tipo') : 0);
		$idusuario		= $this->session->userdata('user_id') ;
		$idmenu_deta	= ($this->input->post('idmenu_deta') != null ? $this->input->post('idmenu_deta') : 0);

        $resultado = $this->SeguridadModel->setUsuarioAccesoLog($tipo, $idusuario, $idmenu_deta);

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

/* End of file AjaxSeguridad.php */
/* Location: ./application/controllers/AjaxSeguridad.php */