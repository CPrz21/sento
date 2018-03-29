<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AdministracionController extends CI_Controller {

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

	public function Categorias()
    {
        $data = array( 
			            'assets_uri' => base_url() . 'assets/', 
			            'option' => 'administracion/categoria',  	/* carpera/vista */
			            'title_page' => 'Categorías'
			            );

        $this->load->view('general/master', $data);
    }

    public function Productos()
    {
        $data = array( 
			            'assets_uri' => base_url() . 'assets/', 
			            'option' => 'administracion/producto',  		/* carpera/vista */
			            'title_page' => 'Productos'
			            );

        $this->load->view('general/master', $data);
    }

}

/* End of file AdministracionController.php */
/* Location: ./application/controllers/AdministracionController.php */