<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Procesos extends CI_Controller {

	// Constructor del controlador Procesos
	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {   
            redirect(base_url());   
        }else if ($this->session->userdata("id_rol") != 1){
			redirect(base_url());
		}
		$this->load->model("Procesos_model");
		$this->load->model("Areas_model");   
		$this->load->library('form_validation'); 
	}

	// Enrutador Vista List
	public function index(){
		$data  = array(
			'procesos' => $this->Procesos_model->getProcesos(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/procesos/list",$data);
		$this->load->view("layouts/footer");
    }
	
	// Enrutador Vista Add
	public function add(){
		$data =array( 
			"areas" => $this->Areas_model->getAreas()
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/procesos/add",$data);
		$this->load->view("layouts/footer");
	}

	// Enrutador Vista Edit
	public function edit($id){
		$data =array(
			"proceso" => $this->Procesos_model->getProceso($id),
			"areas" => $this->Areas_model->getAreas()
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/procesos/edit",$data);
		$this->load->view("layouts/footer");
	}

	// Busqueda Ajax Proceso 
	public function obtenerProceso(){
		$id_proceso = $this->input->post("id_proceso");
		$procesos = $this->Procesos_model->getProceso2($id_proceso);
		echo json_encode($procesos);
	}

	public function store(){
		// Campos 
		$abre_proceso = $this->input->post("abre_proceso");
		$id_area = $this->input->post("id_area");
		$nombre_proceso = $this->input->post("nombre_proceso");
		$descripcion_proceso = $this->input->post("descripcion_proceso");
		// Validaciones
		$this->form_validation->set_rules('abre_proceso','código','trim|required|min_length[3]|max_length[10]');
		$this->form_validation->set_rules('id_area','área','required');
		$this->form_validation->set_rules('nombre_proceso','nombre','trim|required|min_length[3]|max_length[200]|is_unique[proceso.nombre_proceso]');
		$this->form_validation->set_rules('descripcion_proceso','descripción','trim|required|min_length[3]|max_length[200]');
		// Metodos
		if ($this->form_validation->run()) {
			// Arreglo Proceso
			$data  = array(
				'abre_proceso' => $abre_proceso,
				'id_area' => $id_area,
				'nombre_proceso' => $nombre_proceso,
				'descripcion_proceso' => $descripcion_proceso,
				'estado_proceso' => "1"
			);
			if ($this->Procesos_model->save($data)) {
				$this->session->set_flashdata("Guardar","Guardar");
				redirect(base_url()."mantenimiento/procesos");
            }
            
			else{
				$this->session->set_flashdata("Cancelar","Cancelar");
				redirect(base_url()."mantenimiento/procesos/add");
			}
		}
		else{
			$this->add();
		}	
	}

	// Metodo Modificar Area
	public function update(){
		// Campos 
		$id_proceso = $this->input->post("id_proceso");
		$abre_proceso = $this->input->post("abre_proceso");
		$id_area = $this->input->post("id_area");
		$nombre_proceso = $this->input->post("nombre_proceso");
		$descripcion_proceso = $this->input->post("descripcion_proceso");
		// Validador
		$data_proceso = $this->Procesos_model->getProceso($id_proceso);
		if ($nombre_proceso == $data_proceso->nombre_proceso) {
			$unico = "";
		}else{
            $unico = "|is_unique[proceso.nombre_proceso]";
		}
		// Validaciones
		$this->form_validation->set_rules('abre_proceso','código','trim|required|min_length[3]|max_length[10]');
		$this->form_validation->set_rules('id_area','área','required');
		$this->form_validation->set_rules('nombre_proceso','nombre','trim|required|min_length[3]|max_length[200]'.$unico);
		$this->form_validation->set_rules('descripcion_proceso','descripción','trim|required|min_length[3]|max_length[200]');
		//  Metodos
		if ($this->form_validation->run()) {
			$data  = array(
				'id_proceso' => $id_proceso, 
				'abre_proceso' => $abre_proceso,
				'id_area' => $id_area,
				'nombre_proceso' => $nombre_proceso,
				'descripcion_proceso' => $descripcion_proceso,
				'estado_proceso' => "1"
			);
			if ($this->Procesos_model->update($id_proceso,$data)) {
				$this->session->set_flashdata("Editar","Editar");
				redirect(base_url()."mantenimiento/procesos");
			}
			else{
				$this->session->set_flashdata("Cancelar","Cancelar");
				redirect(base_url()."mantenimiento/procesos/edit/".$id_proceso);
			}
		}else{
			$this->edit($id_proceso);
		}	
	}
	
    // Eliminar Proceso
	public function delete($id){
		$data  = array(
			'estado_proceso' => "0", 
		);
		$this->Procesos_model->update($id,$data);
		echo "mantenimiento/procesos";
	}

}