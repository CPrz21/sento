<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SeguridadController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if(!$this->session->userdata('logged_in'))
        {
            // se redirecciona a "Login"
            redirect(base_url() . 'UserController');
            exit;
        }
	}

	public function index() /* retornara a vista master */
	{
		$data = array( 
            'assets_uri' => base_url() . 'assets/', 
            'option' => 'general/sento', 
            'title_page' => 'Sento CMS'
            );

		$this->load->view('general/master', $data);
	}

	public function Usuarios()
    {
        $data = array( 
			            'assets_uri' => base_url() . 'assets/', 
			            'option' => 'seguridad/usuario',  	/* carpera/vista */
			            'title_page' => 'Usuarios'
			            );

        $this->load->view('general/master', $data);
    }

}

/* End of file SeguridadController.php */
/* Location: ./application/controllers/SeguridadController.php */