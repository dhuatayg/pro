<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estados extends CI_Controller {

    // Constructor del controlador Estados
	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {   
            redirect(base_url());   
        }else if ($this->session->userdata("id_rol") != 1){
			redirect(base_url());
		}
        $this->load->model("Estados_model");
        $this->load->library('form_validation');
	}

    // Enrutador Vista List
	public function index(){
		$data  = array(
			'estados' => $this->Estados_model->getEstados()
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/estados/list",$data);
		$this->load->view("layouts/footer");
    }

    // Enrutador Vista Add
	public function add(){
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/estados/add");
		$this->load->view("layouts/footer");
    }
    
    // Enrutador Vista Edit
    public function edit($id){
		$data =array(
			"estado" => $this->Estados_model->getEstado($id),
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/estados/edit",$data);
		$this->load->view("layouts/footer");
    }
    
    // Metodo Guardar Estado
    public function store(){
        // Campos 
        $abre_estado = $this->input->post("abre_estado");
        $nombre_estado = $this->input->post("nombre_estado");
        $descripcion_estado = $this->input->post("descripcion_estado");
        // Validaciones
        $this->form_validation->set_rules('nombre_estado','nombre','trim|required|min_length[3]|max_length[200]|is_unique[estado.nombre_estado]');
        $this->form_validation->set_rules('descripcion_estado','descripción','trim|required|min_length[3]|max_length[250]');
        // Metodos
		if ($this->form_validation->run()) {
            // Arreglo Estados
            $data  = array(
				'abre_estado' => $abre_estado,
				'nombre_estado' => $nombre_estado,
				'descripcion_estado' => $descripcion_estado,
				'estado_estado' => "1"
            );
			if ($this->Estados_model->save($data)) {
                $this->session->set_flashdata("Guardar","Guardar");
				redirect(base_url()."mantenimiento/estados");
            }else{
				$this->session->set_flashdata("Cancelar","Cancelar");
				redirect(base_url()."mantenimiento/estados/add");
			}
		}
		else{
            $this->add();
		}	
	}

    // Metodo Modificar Estado
    public function update(){
        // Campos 
        $id_estado = $this->input->post("id_estado");
        $abre_estado = $this->input->post("abre_estado");
        $nombre_estado = $this->input->post("nombre_estado");
        $descripcion_estado = $this->input->post("descripcion_estado");
        // Validador
        $data_estado = $this->Estados_model->getEstado($id_estado);
		if ($nombre_estado == $data_estado->nombre_estado) {
			$unico = "";
		}else{
            $unico = "|is_unique[estado.nombre_estado]";
		}
		// Validaciones
        $this->form_validation->set_rules('nombre_estado','nombre','trim|required|min_length[3]|max_length[200]'.$unico);
        $this->form_validation->set_rules('descripcion_estado','descripción','trim|required|min_length[3]|max_length[250]');
        //  Metodos
        if ($this->form_validation->run()) {
			//Arreglo
			$data  = array(
				'id_estado' => $id_estado, 
				'abre_estado' => $abre_estado,
				'nombre_estado' => $nombre_estado,
				'descripcion_estado' => $descripcion_estado,
				'estado_estado' => "1"
			);
			if ($this->Estados_model->update($id_estado,$data)) {
                $this->session->set_flashdata("Editar","Editar");
				redirect(base_url()."mantenimiento/estados");
			}
			else{
				$this->session->set_flashdata("Cancelar","Cancelar");
				redirect(base_url()."mantenimiento/estados/edit/".$id_estado);
			}
		}else{
            $this->edit($id_estado);
		}
    }

    // Metodo Eliminar Estado
	public function delete($id){
		//Arreglo
		$data  = array(
			'estado_estado' => "0", 
		);
		$this->Estados_model->update($id,$data);
        echo "mantenimiento/estados";
        $this->session->set_flashdata("Eliminar","Eliminar");
	}

}