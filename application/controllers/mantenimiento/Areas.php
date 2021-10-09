<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Areas extends CI_Controller {

	// Constructor del controlador Areas
	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {   
            redirect(base_url());   
		}else if ($this->session->userdata("id_rol") != 1){
			redirect(base_url());
		}
		$this->load->model("Areas_model");
		$this->load->library('form_validation');
	}

	// Enrutador Vista List
	public function index(){	
		$data  = array(	
			'areas' => $this->Areas_model->getAreas()
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/areas/list",$data);
		$this->load->view("layouts/footer");
	}

	// Enrutador Vista Add
	public function add(){
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/areas/add");
		$this->load->view("layouts/footer");
	}

	// Enrutador Vista Edit
	public function edit($id){
		$data  = array(
			'area' => $this->Areas_model->getArea($id)
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/areas/edit",$data);
		$this->load->view("layouts/footer");
	}

	// Metodo Guardar Area
	public function store(){
		// Campos 
		$abre_area = $this->input->post("abre_area");
		$nombre_area = $this->input->post("nombre_area");
		// Validaciones
		$this->form_validation->set_rules('nombre_area','nombre','trim|required|min_length[3]|max_length[200]|is_unique[area.nombre_area]');
		// Metodos
		if ($this->form_validation->run()==TRUE) {
			// Arreglo Estados
			$data  = array(
				'abre_area' => $abre_area,
				'nombre_area' => $nombre_area, 
				'estado_area' => "1"
			);
			if ($this->Areas_model->save($data)) {  
				$this->session->set_flashdata("Guardar","Guardar");
				redirect(base_url()."mantenimiento/areas");	}
			else{
				$this->session->set_flashdata("Cancelar","Cancelar");
				redirect(base_url()."mantenimiento/areas/add");
			}
		}else{	
			$this->add();	
		}
	}

	// Metodo Modificar Area
	public function update(){
		// Campos 
		$id_area = $this->input->post("id_area");
		$abre_area = $this->input->post("abre_area");
		$nombre_area = $this->input->post("nombre_area");
		// Validador
        $data_area = $this->Areas_model->getArea($id_area);
		if ($nombre_area == $data_area->nombre_area) {
			$unico = "";
		}else{
            $unico = "|is_unique[area.nombre_area]";
		}
		// Validaciones
		$this->form_validation->set_rules('nombre_area','nombre','trim|required|min_length[3]|max_length[200]'.$unico);
		//  Metodos
		if ($this->form_validation->run()==TRUE) {
			$data = array(
				'id_area' => $id_area, 
				'abre_area' => $abre_area, 
				'nombre_area' => $nombre_area,
				'estado_area' => "1"
			);
			if ($this->Areas_model->update($id_area,$data)) {
				$this->session->set_flashdata("Editar","Editar");
				redirect(base_url()."mantenimiento/areas");
			}
			else{
				$this->session->set_flashdata("Cancelar","Cancelar");
				redirect(base_url()."mantenimiento/areas/edit/".$id_area);
			}
		}else{
			$this->edit($id_area);
		}
	}

	// Eliminar Area
	public function delete($id){
		$data  = array(
			'estado_area' => "0", 
		);
		$this->Areas_model->update($id,$data);
		echo "mantenimiento/areas";
		$this->session->set_flashdata("Eliminar","Eliminar");
	}
}
