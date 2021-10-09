<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maquinas extends CI_Controller {

	// Constructor del controlador Maquinas
	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {   
            redirect(base_url());   
        }else if ($this->session->userdata("id_rol") != 1){
			redirect(base_url());
		}
		$this->load->model("Maquinas_model");
		$this->load->model("Areas_model");
		$this->load->library('form_validation');
	}

	// Enrutador Vista List
	public function index(){
		$data  = array(
			'maquinas' => $this->Maquinas_model->getMaquinas(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/maquinas/list",$data);
		$this->load->view("layouts/footer");
    }
	
	// Enrutador Vista Add
	public function add(){
		$data =array(  
			'areas' => $this->Areas_model->getAreas() 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/maquinas/add",$data);
		$this->load->view("layouts/footer");
	}

	// Enrutador Vista Edit
	public function edit($id){
		$data =array(
			'maquina' => $this->Maquinas_model->getMaquina($id),
			'areas' => $this->Areas_model->getAreas()
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/maquinas/edit",$data);
		$this->load->view("layouts/footer");
	}

	// Busqueda Ajax Maquina
	public function obtenerMaquina(){
		$id_maquina = $this->input->post("id_maquina");
		$id_maquinas = $this->Maquinas_model->getMaquina2($id_maquina);
		echo json_encode($id_maquinas);
	}

	// Metodo Guardar Máquinas
    public function store(){
        // Campos 
		$abre_maquina = $this->input->post("abre_maquina");
        $nombre_maquina = $this->input->post("nombre_maquina");
        $descripcion_maquina = $this->input->post("descripcion_maquina");
        $cantidad_maquina = $this->input->post("cantidad_maquina");
        $id_area = $this->input->post("id_area");
        // Validaciones
        $this->form_validation->set_rules('abre_maquina','código','trim|required|min_length[3]|max_length[10]');
		$this->form_validation->set_rules('nombre_maquina','nombre','trim|required|min_length[3]|max_length[200]|is_unique[maquina.nombre_maquina]');
		$this->form_validation->set_rules('descripcion_maquina','descripción','trim|required|min_length[3]|max_length[200]');
		$this->form_validation->set_rules('cantidad_maquina','cantidad','trim|required|min_length[1]|max_length[10]');
		$this->form_validation->set_rules('id_area','área','required');
        // Metodos
		if ($this->form_validation->run()) {
            // Arreglo Maquinas
            $data  = array(
				'abre_maquina' => $abre_maquina,
				'nombre_maquina' => $nombre_maquina,
				'descripcion_maquina' => $descripcion_maquina,
				'cantidad_maquina' => $cantidad_maquina,
				'id_area' => $id_area,
				'estado_maquina' => "1"
            );
			if ($this->Maquinas_model->save($data)) {
                $this->session->set_flashdata("Guardar","Guardar");
				redirect(base_url()."mantenimiento/maquinas");
            }else{
				$this->session->set_flashdata("Cancelar","Cancelar");
				redirect(base_url()."mantenimiento/maquinas/add");
			}
		}
		else{
            $this->add();
		}	
	}

	// Metodo Modificar Máquina
	public function update(){
		// Campos 
		$id_maquina = $this->input->post("id_maquina");
		$abre_maquina = $this->input->post("abre_maquina");
        $nombre_maquina = $this->input->post("nombre_maquina");
        $descripcion_maquina = $this->input->post("descripcion_maquina");
        $cantidad_maquina = $this->input->post("cantidad_maquina");
        $id_area = $this->input->post("id_area");
		// Validador
        $data_maquina = $this->Maquinas_model->getMaquina($id_maquina);
		if ($nombre_maquina == $data_maquina->nombre_maquina) {
			$unico = "";
		}else{
            $unico = "|is_unique[maquina.nombre_maquina]";
		}
		// Validaciones
		$this->form_validation->set_rules('abre_maquina','código','trim|required|min_length[3]|max_length[10]');
		$this->form_validation->set_rules('nombre_maquina','nombre','trim|required|min_length[3]|max_length[200]'.$unico);
		$this->form_validation->set_rules('descripcion_maquina','descripción','trim|required|min_length[3]|max_length[200]');
		$this->form_validation->set_rules('cantidad_maquina','cantidad','trim|required|min_length[1]|max_length[10]');
		$this->form_validation->set_rules('id_area','área','required');
		//  Metodos
		if ($this->form_validation->run()==TRUE) {
			$data = array(
				'id_maquina' => $id_maquina, 
				'abre_maquina' => $abre_maquina, 
				'nombre_maquina' => $nombre_maquina, 
				'descripcion_maquina' => $descripcion_maquina, 
				'cantidad_maquina' => $cantidad_maquina, 
				'id_area' => $id_area, 
				'estado_maquina' => "1"
			);
			if ($this->Maquinas_model->update($id_maquina,$data)) {
				$this->session->set_flashdata("Editar","Editar");
				redirect(base_url()."mantenimiento/maquinas");
			}
			else{
				$this->session->set_flashdata("Cancelar","Cancelar");
				redirect(base_url()."mantenimiento/maquinas/edit/".$id_maquina);
			}
		}else{
			$this->edit($id_maquina);
		}
	}


	
    
	public function delete($id){
		$data  = array(
			'estado_maquina' => "0", 
		);
		$this->Maquinas_model->update($id,$data);
		echo "mantenimiento/maquinas";
	}

}