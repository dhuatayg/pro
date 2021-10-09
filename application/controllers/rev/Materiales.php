<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materiales extends CI_Controller {

	// Constructor del controlador Materiales
	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {   
            redirect(base_url());   
        }else if ($this->session->userdata("id_rol") == 3){
			redirect(base_url());
		}
		$this->load->model("Materiales_model");
		$this->load->library('form_validation');
	}

	// Enrutador Vista List
	public function index(){
		$data  = array(
			'materiales' => $this->Materiales_model->getMateriales(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/materiales/list",$data);
		$this->load->view("layouts/footer");
	}

	// Enrutador Vista Add
	public function add(){
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/materiales/add");
		$this->load->view("layouts/footer");
	}

	// Enrutador Vista Edit
	public function edit($id){
		$data  = array(
			'material' => $this->Materiales_model->getMaterial($id), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/materiales/edit",$data);
		$this->load->view("layouts/footer");
	}

	// Busqueda Ajax Material 
	public function obtenerMaterial(){
		$id_material = $this->input->post("id_material");
		$materiales = $this->Materiales_model->getMaterial2($id_material);
		echo json_encode($materiales);
	}

	// Método Guardar Material
	public function store(){
		// Campos 
        $abre_material = $this->input->post("abre_material");
		$nombre_material = $this->input->post("nombre_material");
		$descripcion_material = $this->input->post("descripcion_material");
		$unidad_material = $this->input->post("unidad_material");
		$stock_material = $this->input->post("stock_material");
		$precio_material = $this->input->post("precio_material");
        // Validaciones
        $this->form_validation->set_rules('nombre_material','nombre','trim|required|min_length[3]|max_length[200]|is_unique[material.nombre_material]');
		$this->form_validation->set_rules('descripcion_material','descripcion','trim|required|min_length[3]|max_length[250]');
		$this->form_validation->set_rules('unidad_material','unidad','required');
		$this->form_validation->set_rules('stock_material','stock','trim|required|min_length[1]|max_length[10]');
		$this->form_validation->set_rules('precio_material','precio','trim|required|min_length[1]|max_length[10]');
		// Metodos
		if ($this->form_validation->run()==TRUE) {
			// Arreglo Material
			$data  = array(
                'abre_material' => $abre_material, 
				'nombre_material' => $nombre_material, 
				'descripcion_material' => $descripcion_material, 
				'unidad_material' => $unidad_material, 
                'stock_material' => $stock_material,
                'precio_material' => $precio_material,
				'estado_material' => "1"
			);
			if ($this->Materiales_model->save($data)) {
				$this->session->set_flashdata("Guardar","Guardar");
				redirect(base_url()."rev/materiales");
			}else{
				$this->session->set_flashdata("Cancelar","Cancelar");
				redirect(base_url()."rev/materiales/add");
			}
		}else{
			$this->add();
		}	
	}

	// Método Modificar Material
	public function update(){
		// Campos 
        $id_material = $this->input->post("id_material");
        $abre_material = $this->input->post("abre_material");
		$nombre_material = $this->input->post("nombre_material");
		$descripcion_material = $this->input->post("descripcion_material");
		$unidad_material = $this->input->post("unidad_material");
		$stock_material = $this->input->post("stock_material");
		$precio_material = $this->input->post("precio_material");
        // Validador
		$data_material = $this->Materiales_model->getMaterial($id_material);
		if ($nombre_material == $data_material->nombre_material) {
			$unico = "";
		}else{
            $unico = "|is_unique[material.nombre_material]";
        }
		// Validaciones
        $this->form_validation->set_rules('nombre_material','nombre','trim|required|min_length[3]|max_length[200]'.$unico);
		$this->form_validation->set_rules('descripcion_material','descripcion','trim|required|min_length[3]|max_length[250]');
		$this->form_validation->set_rules('unidad_material','unidad','required');
		$this->form_validation->set_rules('stock_material','stock','trim|required|min_length[1]|max_length[10]');
		$this->form_validation->set_rules('precio_material','precio','trim|required|min_length[1]|max_length[10]');
		//  Metodos
		if ($this->form_validation->run()==TRUE) {
			$data = array(
                'abre_material' => $abre_material, 
				'nombre_material' => $nombre_material, 
				'descripcion_material' => $descripcion_material, 
				'unidad_material' => $unidad_material, 
                'stock_material' => $stock_material,
                'precio_material' => $precio_material
			);
			if ($this->Materiales_model->update($id_material,$data)) {
				$this->session->set_flashdata("Guardar","Guardar");
				redirect(base_url()."rev/materiales");
			}else{
				$this->session->set_flashdata("Cancelar","Cancelar");
				redirect(base_url()."rev/materiales/edit/".$id_material);
			}
		}else{
			$this->edit($id_material);
		}
	}

	// Método Eliminar Material
	public function delete($id){
		$data  = array(
			'estado_material' => "0", 
		);
		$this->Materiales_model->update($id,$data);
		echo "rev/materiales";
	}

	// Actualizar Stock Material
	public function updatestock(){
		// Campos
        $id_material = $this->input->post("id_material");
		$stock_material = $this->input->post("stock_material");
		$nuevo_stock_material = $this->input->post("nuevo_stock_material");
		// Validaciones
        $this->form_validation->set_rules("nuevo_stock_material","stock","required");
		// Metodos
		if ($this->form_validation->run()==TRUE) {
			$data = array(
                'stock_material' => $stock_material+$nuevo_stock_material,
			);
			if ($this->Materiales_model->update($id_material,$data)) {
				$this->session->set_flashdata("Editar","Editar");
				redirect(base_url()."rev/materiales");
			}
			else{
				$this->session->set_flashdata("Cancelar","Cancelar");
				redirect(base_url()."rev/materiales");
			}
		}else{
			$this->index();
		}		
	}
}
