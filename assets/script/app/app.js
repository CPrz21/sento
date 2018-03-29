<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Sento extends CI_Controller {
  public function __construct()
  	{
  		parent::__construct();
          $this->load->library('Googleplus');
  	}

    public function index()
	{
    $this->load->view('vidals/head');
  }

}
