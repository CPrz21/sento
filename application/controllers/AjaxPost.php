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
		$query = $this->db->get('post');
		if ($query->num_rows() > 0) {
        echo json_encode(array('status'=>'OK','data'=>$query->result()));
    }else{
        echo json_encode(array('status'=>'Error','message'=>'Data Error'));
    }
	}

	function getPostC($post_id){
		$this->db->where('id', $post_id);
		$query = $this->db->get('post');
		if ($query->num_rows() > 0) {
        echo json_encode(array('status'=>'OK', 'data' => $query->result()));
    }else{
        echo json_encode(array('status'=>'Error', 'message' =>'Data Error'));
    }
	}

	function insertPostC(){
		$idUser = 1;
		$title = $this->input->post('title');
		$body	= $this->input->post('body');

		$this->db->set('iduser', $idUser);
		$this->db->set('title', $title);
		$this->db->set('body', $body);
		$this->db->insert('post');
		if ($this->db->affected_rows())
		{
			echo json_encode(array('status'=>'OK'));
		}else{
		 echo json_encode(array('status'=>'Error', 'message' =>  'Data Error'));
		}

	}

	function deletePostC(){
		$idPost = $this->input->post('idPost');

		$this->db->where('id', $idPost);
		$this->db->delete('post');
		if ($this->db->affected_rows())
		{
			$this->get_data_C();
		}else{
		 $data = array('status'=>'Error', 'message' =>  'Data Error');
		}
	}

	function editPostC(){
		$title = $this->input->post('title');
		$body	= $this->input->post('body');
		$idPost	= $this->input->post('idPost');

		$this->db->set('title', $title);
		$this->db->set('body', $body);
		$this->db->where('id', $idPost);
		$this->db->update('post');

		if ($this->db->affected_rows())
		{
			echo json_encode(array('status'=>'OK'));
		}else{
		 	echo json_encode(array('status'=>'ERROR','mensaje'=>'Error al editar post...'));
		}
	}



}
