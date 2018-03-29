<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PostModel extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
	}

	public function get_data()
	{
		// $query = $this->db->query("SELECT idcategoria, nombre_es, descripcion_en FROM sentolux_db.categoria");
		$query = $this->db->query("SELECT id,title, body FROM postapp.post");


		//SELECT detalle_menu.nombre, detalle_menu.url FROM detalle_menu WHERE detalle_menu.idMenu = 1

		if ($query->num_rows() > 0) {

        return $query->result();
        //return $query->row()->id_menu;

     	}
     return false;
	}

  public function getPostM($post_id)
	{
		$query = $this->db->query("SELECT id,title, body FROM postapp.post WHERE id=?", array($post_id));
		// $query = $this->db->query("SELECT title, body FROM postapp.post");

		if ($query->num_rows() > 0) {

        return $query->result();
        //return $query->row()->id_menu;

     	}
     return false;
	}

  public function insertPostM($idUser,$title,$body){


       $query = $this->db->query("INSERT INTO postapp.post (iduser,title,body) VALUES ('".$idUser."', '".$title."', '".$body."')");

        if ($this->db->affected_rows())
        {
          return $this->db->affected_rows();
        }else{
         return false;
        }

  }



  public function deletePostM($idPost){

      $query = $this->db->query("DELETE FROM postapp.post WHERE id=?", array($idPost));

        if ($this->db->affected_rows())
        {
          return $this->db->affected_rows();
        }else{
         return false;
        }

  }

  public function editPostM($title,$body,$idPost){


       // $query = $this->db->query("UPDATE postapp.post
       //                            SET
       //                              title=?,
       //                              body=?
       //                            WHERE
       //                              id=?", array($title,$body,$idPost));
       $this->db->set('title', $title);
       $this->db->set('body', $body);
        $this->db->where('id', $idPost);
        $this->db->update('post');

        if ($this->db->affected_rows())
        {
          return $this->db->affected_rows();
        }else{
         return false;
        }

  }
  // public function buscar_log($id_user)
  // 	{
  // 		$query = $this->db->query("SELECT idlog FROM log WHERE idUsuario=?", array($id_user));
  //
  // 		if($query->num_rows() > 0)
  // 			return $query->row();
  //
  // 		return false;
  // 	}



}
