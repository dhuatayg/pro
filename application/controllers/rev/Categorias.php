<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias extends CI_Controller {

	// Constructor del controlador Categorias
	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {   
            redirect(base_url());   
        }else if ($this->session->userdata("id_rol") == 3){
			redirect(base_url());
		}
		$this->load->model("Categorias_model");
		$this->load->library('form_validation');
	}

	// Enrutador Vista List
	public function index(){
		$data  = array(
			'categorias' => $this->Categorias_model->getCategorias(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/categorias/list",$data);
		$this->load->view("layouts/footer");
	}

	// Enrutador Vista Add
	public function add(){
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/categorias/add");
		$this->load->view("layouts/footer");
	}

	// Enrutador Vista Edit
	public function edit($id){
		$data  = array(
			'categoria' => $this->Categorias_model->getCategoria($id), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/categorias/edit",$data);
		$this->load->view("layouts/footer");
	}

	// Metodo Guardar Area
	public function store(){
		$abre_categoria = $this->input->post("abre_categoria");
		$nombre_categoria = $this->input->post("nombre_categoria");
		$descripcion_categoria = $this->input->post("descripcion_categoria");
		// Validaciones
        $this->form_validation->set_rules('nombre_categoria','nombre','trim|required|min_length[3]|max_length[200]|is_unique[categoria.nombre_categoria]');
        $this->form_validation->set_rules('descripcion_categoria','descripción','trim|required|min_length[3]|max_length[200]');
		// Metodos
		if ($this->form_validation->run()==TRUE) {
			// Arreglo Roles
			$data  = array(
				'abre_categoria' => $abre_categoria,
				'nombre_categoria' => $nombre_categoria, 
				'descripcion_categoria' => $descripcion_categoria,
				'estado_categoria' => "1"
			);
			if ($this->Categorias_model->save($data)) {
				$this->session->set_flashdata("Guardar","Guardar");
				redirect(base_url()."rev/categorias");
			}
			else{
				$this->session->set_flashdata("Cancelar","Cancelar");
				redirect(base_url()."rev/categorias/add");
			}
		}
		else{
			$this->add();
		}
	}

	// Metodo Modificar Categoría
	public function update(){
		// Campos 
		$id_categoria = $this->input->post("id_categoria");
		$abre_categoria = $this->input->post("abre_categoria");
		$nombre_categoria = $this->input->post("nombre_categoria");
		$descripcion_categoria = $this->input->post("descripcion_categoria");
		// Validador
		$data_categoria= $this->Categorias_model->getCategoria($id_categoria);
		if ($nombre_categoria == $data_categoria->nombre_categoria) {
			$unico = "";
		}else{
			$unico = "|is_unique[categoria.nombre_categoria]";
		}
		// Validaciones
		$this->form_validation->set_rules('nombre_categoria','nombre','trim|required|min_length[3]|max_length[200]'.$unico);
		$this->form_validation->set_rules('descripcion_categoria','descripción','trim|required|min_length[3]|max_length[200]');
		if ($this->form_validation->run()==TRUE) {
			// Arreglo
			$data = array(
				'abre_categoria' => $abre_categoria, 
				'nombre_categoria' => $nombre_categoria, 
				'descripcion_categoria' => $descripcion_categoria,
			);
			if ($this->Categorias_model->update($id_categoria,$data)) {
				$this->session->set_flashdata("Editar","Editar");
				redirect(base_url()."rev/categorias");
			}
			else{
				$this->session->set_flashdata("Cancelar","Cancelar");
				redirect(base_url()."rev/categorias/edit/".$id_categoria);
			}
		}else{
			$this->edit($id_categoria);
		}		
	}

	// Metodo Eliminar Categoría
	public function delete($id){
		$data  = array(
			'estado_categoria' => "0", 
		);
		$this->Categorias_model->update($id,$data);
		echo "rev/categorias";
	}
}
