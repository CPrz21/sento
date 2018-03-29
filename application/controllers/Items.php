<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AjaxPost extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{

	}
	function get_data_C(){
		// $this->load->model('PostModel');
		// $resultado = $this->PostModel->get_data();
		// if ($resultado)
		// {
		// 		$resultado_ = array('status'=>'OK', 'data' =>  $resultado);
		// 		echo json_encode($resultado_);
		// }
		// else
		// {
		// 		echo json_encode(array('status'=>'SIN_DATOS','mensaje'=>'No se encontraron datos...'));
		// }
		$query = $this->db->query("SELECT id,title, body FROM postapp.post");
		if ($query->num_rows() > 0) {
        $data = array('status'=>'OK', 'data' => $query->result());
    }else{
        $data = array('status'=>'Error', 'message' =>  'Data Error');
    }
    echo json_encode($data);
	}
	function getPostC($post_id){

		$this->load->model('PostModel');
		$resultado = $this->PostModel->getPostM($post_id);
		if ($resultado)
		{
				$resultado_ = array('status'=>'OK', 'data' =>  (object)$resultado);
				$obj = (object)$resultado_; //change array to stdClass object
				echo json_encode($obj);
		}
		else
		{
				echo json_encode(array('status'=>'SIN_DATOS','mensaje'=>'No se encontraron datos...'));
		}
	}

	function insertPostC(){
	$idUser = 1;
	$title = $this->input->post('title');
	$body	= $this->input->post('body');

	$this->load->model('PostModel');
	$insert_post = $this->PostModel->insertPostM($idUser,$title,$body);
		if ($insert_post)
		{
				$resultado_ = array('status'=>'OK');
				echo json_encode($resultado_);
		}
		else
		{
				echo json_encode(array('status'=>'ERROR','mensaje'=>'Error al insertar post...'));
		}
	}

	function deletePostC(){
	$idPost = $this->input->post('idPost');;

	$this->load->model('PostModel');
	$deletePost = $this->PostModel->deletePostM($idPost);
		if ($deletePost)
		{
				// $resultado_ = array('status'=>'OK');
				// // $obj = (object)$resultado_; //change array to stdClass object
				// echo json_encode($resultado_);
				$this->get_data_C();
		}
		else
		{
				echo json_encode(array('status'=>'ERROR','mensaje'=>'Error al insertar post...'));
		}
	}

	function editPostC(){
	$title = $this->input->post('title');
	$body	= $this->input->post('body');
	$idPost	= $this->input->post('idPost');

	$this->load->model('PostModel');
	$editPost = $this->PostModel->editPostM($title,$body,$idPost);
		if ($editPost)
		{
			echo json_encode(array('status'=>'OK'));
				// $resultado_ = array('status'=>'OK', 'data' =>  (object)$resultado);
				// $obj = (object)$resultado_; //change array to stdClass object
				// echo json_encode($obj);
		}
		else
		{
				echo json_encode(array('status'=>'ERROR','mensaje'=>'Error al editar post...'));
		}
	}



}
