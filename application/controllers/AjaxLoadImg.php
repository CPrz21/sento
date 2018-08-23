<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AjaxLoadImg extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        
    }

    function uploadBackGroud_temporada()
    {
        if(isset($_FILES["myfile"]["type"]))
        {
            $validextensions = array("jpg","jpeg");
            $temporary = explode(".", $_FILES["myfile"]["name"]);
            $file_extension = strtolower(end($temporary));

            if (in_array($file_extension, $validextensions))
            {
                if ($_FILES["myfile"]["error"] > 0)
                {
                    echo json_encode(array('status' => 'ERROR', 'msg' => "Error al cargar imagen, vuelva a intentarlo")); //$_FILES["myfile1"]["error"]
                }
                else
                {                            
                    $sourcePath = $_FILES['myfile']['tmp_name']; // url temporal
                    $targetPath = ASSETS_PATH . "/Images/sections/seasons/" . $_FILES['myfile']['name']; //url destino       

                    move_uploaded_file($sourcePath, $targetPath);
                    echo json_encode(array('status' => 'OK', 'filename' => $_FILES['myfile']['name'], 'msg' => "Imagen cargada."));                   
                }
            }
            else
            {
                echo json_encode(array('status' => 'ERROR', 'msg' => 'Tipo de archivo no valido, verifique el archivo!'));
            }
        }
    }



    function uploadBackGroud_sections($img_name)
    {
        if(isset($_FILES["myfile1"]["type"]))
        {
            $validextensions = array("jpg","jpeg");
            $temporary = explode(".", $_FILES["myfile1"]["name"]);
            $file_extension = strtolower(end($temporary));

            if ( in_array($file_extension, $validextensions))
            {
                if ($_FILES["myfile1"]["error"] > 0)
                {
                    echo json_encode(array('status' => 'ERROR', 'msg' => "Error al cargar imagen, vuelva a intentarlo")); //$_FILES["myfile1"]["error"]
                }
                else
                {                            
                    $sourcePath = $_FILES['myfile1']['tmp_name']; // url temporal
                    $targetPath = ASSETS_PATH . "/Images/sections/" .  $img_name; // url destino     

                    move_uploaded_file($sourcePath, $targetPath);
                    echo json_encode(array('status' => 'OK', 'filename' => $_FILES['myfile1']['name'], 'msg' => "Imagen cargada." ));                   
                }
            }
            else
            {
                echo json_encode(array('status' => 'ERROR', 'msg' => 'Tipo de archivo no valido, verifique el archivo!'));
            }
        }
    }

    function uploadBackGroud_Gift_sections($img_name)
    {
        if(isset($_FILES["myfile1"]["type"]))
        {
            $validextensions = array("png");
            $temporary = explode(".", $_FILES["myfile1"]["name"]);
            $file_extension = strtolower(end($temporary));

            if ( in_array($file_extension, $validextensions))
            {
                if ($_FILES["myfile1"]["error"] > 0)
                {
                    echo json_encode(array('status' => 'ERROR', 'msg' => "Error al cargar imagen, vuelva a intentarlo")); //$_FILES["myfile1"]["error"]
                }
                else
                {                            
                    $sourcePath = $_FILES['myfile1']['tmp_name']; // url temporal
                    $targetPath = ASSETS_PATH . "/Images/sections/" .  $img_name; // url destino     

                    move_uploaded_file($sourcePath, $targetPath);
                    echo json_encode(array('status' => 'OK', 'filename' => $_FILES['myfile1']['name'], 'msg' => "Imagen cargada." ));                   
                }
            }
            else
            {
                echo json_encode(array('status' => 'ERROR', 'msg' => 'Tipo de archivo no valido, verifique el archivo!'));
            }
        }
    }

    
    function uploadBackGroud_gallery($img_name)
    {
        if(isset($_FILES["myfile1"]["type"]))
        {
            $validextensions = array("jpg","jpeg");
            $temporary = explode(".", $_FILES["myfile1"]["name"]);
            $file_extension = strtolower(end($temporary));

            if ( in_array($file_extension, $validextensions))
            {
                if ($_FILES["myfile1"]["error"] > 0)
                {
                    echo json_encode(array('status' => 'ERROR', 'msg' => "Error al cargar imagen, vuelva a intentarlo")); //$_FILES["myfile1"]["error"]
                }
                else
                {                            
                    $sourcePath = $_FILES['myfile1']['tmp_name']; // url temporal
                    $targetPath = ASSETS_PATH . "/Images/sections/gallery/" .  $img_name; // url destino   

                    move_uploaded_file($sourcePath, $targetPath);
                    echo json_encode(array('status' => 'OK', 'filename' => $_FILES['myfile1']['name'], 'msg' => "Imagen cargada." ));                   
                }
            }
            else
            {
                echo json_encode(array('status' => 'ERROR', 'msg' => 'Tipo de archivo no valido, verifique el archivo!'));
            }
        }
    }

    function deleteBackGroud_gallery()
    {
        try 
        {
            $nombre	= ($this->input->post('nombre') != null ? $this->input->post('nombre') : '');
            $filePath = ASSETS_PATH . "/Images/sections/gallery/" . $nombre;  
            unlink($filePath);
            echo json_encode(array('status' => 'OK', 'msg' => "Imagen eliminada." ));    
        } 
        catch (Exception $e) {
            echo json_encode(array('status' => 'ERROR', 'msg' => "Error al eliminar imagen de carpeta."));
        }
    }

    /* --UTILIZANDO CodeIgniter 
    function do_upload()
    {
        $config['upload_path'] = ASSETS_PATH . "/Images/sections/";
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '20000000';
        $config['max_width']  = '2500';
        $config['max_height']  = '2500';

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('myfile'))
        {
            $error = array('error' => $this->upload->display_errors());

            //$this->load->view('upload_form', $error);
            echo json_encode(array('status' => 'ERROR', 'filename' => $error ));    
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());

             echo json_encode(array('status' => 'OK', 'filename' => "" ));    
        }
    }
    */
}

/* End of file AjaxLoading.php */
/* Location: ./application/controllers/AjaxLoading.php */