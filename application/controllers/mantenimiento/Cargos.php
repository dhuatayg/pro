<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cargos extends CI_Controller {

	// Constructor del controlador Cargos
	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {   
            redirect(base_url());   
        }else if ($this->session->userdata("id_rol") != 1){
			redirect(base_url());
		}
		$this->load->model("Cargos_model");
		$this->load->library('form_validation');
	}

	// Enrutador Vista List
	public function index(){
		$data  = array(
			'cargos' => $this->Cargos_model->getCargos(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/cargos/list",$data);
		$this->load->view("layouts/footer");

	}

	// Enrutador Vista Add
	public function add(){
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/cargos/add");
		$this->load->view("layouts/footer");
	}

	// Enrutador Vista Edit
	public function edit($id){
		$data  = array(
			'cargo' => $this->Cargos_model->getCargo($id), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/cargos/edit",$data);
		$this->load->view("layouts/footer");
	}

	// Metodo Guardar Cargo
	public function store(){
		// Campos 
        $abre_cargo = $this->input->post("abre_cargo");
		$nombre_cargo = $this->input->post("nombre_cargo");
		// Validaciones
        $this->form_validation->set_rules('nombre_cargo','nombre','trim|required|min_length[3]|max_length[200]|is_unique[cargo.nombre_cargo]');
		// Metodos
		if ($this->form_validation->run()==TRUE) {
			// Arreglo Estados
			$data  = array(
				'abre_cargo' => $abre_cargo, 
				'nombre_cargo' => $nombre_cargo, 
				'estado_cargo' => "1"
			);
			if ($this->Cargos_model->save($data)) {
				$this->session->set_flashdata("Guardar","Guardar");
				redirect(base_url()."mantenimiento/cargos");
			}else{
				$this->session->set_flashdata("Cancelar","Cancelar");
				redirect(base_url()."mantenimiento/cargos/add");
			}
		}else{
			$this->add();
		}
	}

	// Metodo Modificar Estado
	public function update(){
		// Campos 
		$id_cargo = $this->input->post("id_cargo");
		$abre_cargo = $this->input->post("abre_cargo");
		$nombre_cargo = $this->input->post("nombre_cargo");
		// Validador
		$data_cargo = $this->Cargos_model->getCargo($id_cargo);
		if ($nombre_cargo == $data_cargo->nombre_cargo) {
			$unico = "";
		}else{
            $unico = "|is_unique[cargo.nombre_cargo]";
		}
		// Validaciones
		$this->form_validation->set_rules('nombre_cargo','nombre','trim|required|min_length[3]|max_length[200]'.$unico);
		//  Metodos
		if ($this->form_validation->run()==TRUE) {
			$data = array(
				'id_cargo' => $id_cargo,
				'abre_cargo' => $abre_cargo,
				'nombre_cargo' => $nombre_cargo,
				'estado_cargo' => "1"
			);
			if ($this->Cargos_model->update($id_cargo,$data)) {
				$this->session->set_flashdata("Editar","Editar");
				redirect(base_url()."mantenimiento/cargos");
			}
			else{
				$this->session->set_flashdata("Cancelar","Cancelar");
				redirect(base_url()."mantenimiento/cargos/edit/".$id_cargo);
			}
		}else{
			$this->edit($id_cargo);
		}
	}

	// Metodo Eliminar Estado
	public function delete($id){
		//Arreglo
		$data  = array(
			'estado_cargo' => "0", 
		);
		$this->Cargos_model->update($id,$data);
		echo "mantenimiento/cargos";
	}
}
