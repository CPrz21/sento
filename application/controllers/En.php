<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class En extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
{

     //redirect('home', 'refresh');
		redirect('En/home');
}
	public function loadHeader(){
		$data = array(
	          'assets_uri' => base_url() . 'assets/',
						'libs_url' => base_url().'App/libs/',
						'_url' => base_url().'App/'
	          );
		$this->load->view('Sento/head_sento',$data);
	}
  public function home(){
		$this->loadHeader();
	  $this->load->view('Sento/Home');
		$this->load->view('Sento/footer_sento');

		$lan= array
		(
			'language'=> 'EN'
		);
		$this->session->set_userdata($lan);
	}

	public function her(){
		$this->getIdioma();
		$this->loadHeader();
		$this->load->view('Sento/Her');
		$this->load->view('Sento/footer_sento');
	}

	public function him(){
		$this->getIdioma();
		$this->loadHeader();
		$this->load->view('Sento/Him');
		$this->load->view('Sento/footer_sento');
	}

	public function spa(){
		$this->getIdioma();
		$this->loadHeader();
		$this->load->view('Sento/Spa');
		$this->load->view('Sento/footer_sento');
	}

	public function specialgifts(){
		$this->getIdioma();
		$this->loadHeader();
		$this->load->view('Sento/SpecialGifts');
		$this->load->view('Sento/footer_sento');
	}

	public function seasonspecial(){
		$this->getIdioma();
		$this->loadHeader();
		$this->load->view('Sento/SeasonSpecial');
		$this->load->view('Sento/footer_sento');

	}

	public function gallery(){
		$this->getIdioma();
		$this->loadHeader();
		$this->load->view('Sento/Gallery');
		$this->load->view('Sento/footer_sento');

	}

	public function contactus(){
		$this->getIdioma();
		$this->loadHeader();
		$this->load->view('Sento/ContactUs');
		$this->load->view('Sento/footer_sento');

	}

	public function getIdioma(){
		if ($this->session->userdata('language') == 'ES') {
			$this->session->set_userdata(array('language'=> 'EN'));
	  }
	}




}
