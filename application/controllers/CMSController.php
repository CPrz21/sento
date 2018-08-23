<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CMSController extends CI_Controller {

	// Se crea la funcion _construct() que tiene como proposito hacer lo primero al cargar la vista
    public function __construct()
    {
        //Codigo obligatorio de php al utilizar MCV
        parent::__construct();
        
        //se evalua si el usuario ya ingreso por medio del login, si no se redirecciona a que primero valide el acceso
        if(!$this->session->userdata('logged_in')/*esto es una variable de session*/)
        {
            // se redirecciona a "Login"
            redirect(base_url() . 'UserController');
            $this->session->userdata('error_login', '');
            exit;
        }
    }

	// se crea la funcion "Index" -> que se carga despues del constructor, es decir es la segunda funcion en cargarse al momento de ver la vista
	public function index()
	{
        //conjunto de datos permite pasar como parametros en la vista "sento"
		$data = array( 
            'assets_uri' => base_url() . 'assets/', 
            'option' => 'general/sento', 
            'title_page' => 'Sento CMS'
            );

        //Se carga la vista master, con la vista Home y la master es la que hace la combinacion de dos vistas
		$this->load->view('general/master', $data);
	}

}

/* End of file Inicio.php */
/* Location: ./application/controllers/Inicio.php */