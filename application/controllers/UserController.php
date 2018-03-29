<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//Se crea la case Cliente que extiende de CI_CONTROLLER
class UserController extends CI_Controller {

	public function __construct()
	{
		//Codigo obligatorio de php al utilizar MCV
		parent::__construct();
	}

	// se crea la funcion "Index" -> que se carga despues del constructor, es decir es la segunda funcion en cargarse al momento de ver la vista
	public function index()
	{
		//se evalua si el usuario ya ingreso por medio del login, si ya esta se envia al menu principal
		// if($this->session->userdata('logged_in'))
    //     {
            redirect(base_url() . 'AdminController/');
        // }
    //     else
    //     {
		// 	$data = array(
		// 		'assets_uri'   => base_url() . 'assets/',
		// 		'site_title'   => '.:: SENTO ::.',
    //         );
		//
		// 	//Se carga la vista login
		// 	$this->load->view('general/login', $data);
		// }
	}

	// se crea funcion login
	public function sigin()
	{
		// se le estable 30 segundos de espera
		usleep(300000);
		// se carga el mododelo
		$this->load->model('UserModel');

		// se crea la variable que recibe pormedio del metodo post
		$user = $this->input->post('user');
		$pwrd = md5($this->input->post('pwrd'));

		//se evalua si el usuario existe con la contraseña ingresada
		$user_data = $this->UserModel->login($user, $pwrd);
		// se evalua si existe
		if($user_data)
		{
			// Se carga la informacion en un arreglo
			$logindata = array(
				'user_id'  	=> $user_data->idusuario,
            	'user' 		=> $user_data->usuario,
            	'user_name' => $user_data->nombre,
            	'logged_in' => true,
            	'user_type' => $user_data->tipo
            );

			// se llenan las variables de session
			$this->session->set_userdata($logindata);
			// se redirecciona al menu principal
			redirect(base_url().'CMSController');
		}
		// si no existe
		else
		{
			// se vuelve a cargar el login
			//$this->session->userdata('error_login', 'error');
			redirect(base_url() . 'UserController/');
		}
	}

	// Metodo para cerrar session
	public function logout()
	{
		// se destruyen las variables de session
		$this->session->sess_destroy();
		// se redirecciona al login
		redirect(base_url() . 'UserController/');
	}


}

/* End of file sigin.php */
/* Location: app/controllers/sigin.php */
