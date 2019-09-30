<?php
/**
* 
*/
class Cproducto extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('mproducto');
		$this->load->model('mupload');
		$this->load->helper('download');
	}

	public function index(){
		$res = $this->mproducto->getProducto();

		$this->load->view('layout/header');
		$this->load->view('layout/menu');
		$this->load->view("producto/vproducto", array('res' => $res));
		$this->load->view('layout/footer');
	}

	public function getProductoId($id){
		$res = $this->mproducto->getProductoId($id);
		$this->load->view('layout/header');
		$this->load->view('layout/menu');
		$this->load->view("producto/vguardar", array('res' => $res));
		$this->load->view('layout/footer');
	}
	public function verProductoId($id){
		$res = $this->mproducto->getProductoId($id);
		$this->load->view('layout/header');
		$this->load->view('layout/menu');
		$this->load->view('producto/vvisualizar', array('res' => $res));
		$this->load->view('layout/footer');
	}

	public function actualizarProducto(){
        $config['upload_path'] = './uploads/imagenes/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2048';
        $config['max_width'] = '2024';
        $config['max_height'] = '2008';

        $this->load->library('upload',$config);
        $file_info = $this->upload->data();

        $this->crearMiniatura($file_info['file_name']);
        
		//$param = array();
		$param ['idProducto']= $this->input->post('txtId');
        $param['nombre'] = $this->input->post('txtNombre');
        $param['desc'] = $this->input->post('txtDesc');
        $param['peso'] = $this->input->post('txtPeso');
        $param['USD'] = $this->input->post('txtUSD');
        $param['catego'] = $this->input->post('txtCatego');
        //$param['foto'] = $file_info['file_name'];
		$res = $this->mproducto->actualizarProducto($param);

		$res = $this->mproducto->getProducto();

		$this->load->view('layout/header');
		$this->load->view('layout/menu');
		$this->load->view("producto/vproducto", array('res' => $res));
		$this->load->view('layout/footer');
	}

	public function eliminarProducto($id){
		$this->mproducto->eliminarProducto($id);
		$res = $this->mproducto->getProducto();

		$this->load->view('layout/header');
		$this->load->view('layout/menu');
		$this->load->view("producto/vproducto", array('res' => $res));
		$this->load->view('layout/footer');
	}

    public function addProducto(){
		$this->load->view('layout/header');
		$this->load->view('layout/menu');
		$this->load->view("producto/vaddproducto");
		$this->load->view('layout/footer');
	}
    
	public function upProducto(){
		$config['upload_path'] = './uploads/imagenes/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2048';
        $config['max_width'] = '2024';
        $config['max_height'] = '2008';

        $this->load->library('upload',$config);

        if (!$this->upload->do_upload("fileImagen")) {
            $data['error'] = $this->upload->display_errors();
			$this->load->view('layout/header');
			$this->load->view('layout/menu');
			$this->load->view('producto/vaddproducto', $data);
			$this->load->view('layout/footer');
        } else {

            $file_info = $this->upload->data();

            $this->crearMiniatura($file_info['file_name']);

            $param['nombre'] = $this->input->post('txtNombre');
            $param['desc'] = $this->input->post('txtDesc');
            $param['peso'] = $this->input->post('txtpeso');
            $param['USD'] = $this->input->post('txtUSD');
            $param['catego'] = $this->input->post('txtCatego');
            $param['foto'] = $file_info['file_name'];
            //$param['foto'] = "prueba";
            
            //$imagen = $file_info['file_name'];
            
            $subir = $this->mproducto->subirProducto($param);      

            $res = $this->mproducto->getProducto();

			$this->load->view('layout/header');
			$this->load->view('layout/menu');
			$this->load->view("producto/vproducto", array('res' => $res));
			$this->load->view('layout/footer');
        }
    }
    function crearMiniatura($filename){
        $config['image_library'] = 'gd2';
        $config['source_image'] = 'uploads/imagenes/'.$filename;
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['new_image']='uploads/imagenes/thumbs/';
        $config['thumb_marker']='';//captura_thumb.png
        $config['width'] = 150;
        $config['height'] = 150;
        $this->load->library('image_lib', $config); 
        $this->image_lib->resize();
    }
}