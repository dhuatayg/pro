<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	// Constructor Auth
	public function __construct(){
		parent::__construct();
		$this->load->model("Usuarios_model");
	}

	// Enrutador Vista Index
	public function index(){
		if ($this->session->userdata("login")) {
			redirect(base_url()."dashboard");
		}
		else{
			$this->load->view("admin/login");
		}
	}

	// Metodo de Iniciar Sesión
	public function login(){
		$username = $this->input->post("username");
		$password = $this->input->post("password");
		$res = $this->Usuarios_model->login($username, sha1($password));
		if (!$res) {
			$this->session->set_flashdata("error","El usuario y/o contraseña son incorrectos");
			redirect(base_url());
		}else{
			$data  = array(
				'id_usuario' => $res->id, 
				'nombre' => $res->nombre,
				'paterno' => $res->paterno,
				'materno' => $res->materno,
				'id_empleado' => $res->cempleado,
				'id_rol' => $res->crol,
				'login' => TRUE
			);
			$this->session->set_userdata($data);
			$this->session->set_flashdata("Bienvenido","Bienvenido");
			redirect(base_url()."dashboard");
		}
	}

	// Metodo de Cerrar Sesión
	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}
}



