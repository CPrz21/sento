<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SeccionesController extends CI_Controller {

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

	public function Secciones()
    {
        $data = array( 
			            'assets_uri' => base_url() . 'assets/', 
			            'option' => 'secciones/secciones',  	/* carpera/vista */
			            'title_page' => 'Secciones'
			            );

        $this->load->view('general/master', $data);
    }

}