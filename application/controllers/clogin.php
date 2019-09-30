<?php
/**
* 
*/
class Clogin extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('mlogin');
		//$this->load->library('encrypt');
	}

	public function index(){
		$data['mensaje'] = '';
		$this->load->view('vlogin',$data);
	}

	public function ingresar(){
		$usu = $this->input->post('txtUsuario');
		//$pass = $this->encrypt->sha1($this->input->post('txtClave'));
		$pass = $this->input->post('txtClave');

		$res = $this->mlogin->ingresar($usu,$pass);

		if ($res == 1) {
			$this->load->view('layout/header');
			$this->load->view('layout/menu');
			$this->load->view('producto/vproducto');
			$this->load->view('layout/footer');
            redirect('cproducto');
		}else{
			$data['mensaje'] = "Usuario o contraseña erronea";
			redirect('clogin/index');
			// $this->load->view('vlogin',$data);
		}
	}

	public function logout(){
		redirect(base_url());
	}
}