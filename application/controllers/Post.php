<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

  public function index()
{
  $data = array(
          'assets_uri' => base_url() . 'assets/'
          );
  $this->load->view('index/index', $data);
}




}

/* End of file AjaxAdministracion.php */
/* Location: ./application/controllers/AjaxAdministracion.php */
