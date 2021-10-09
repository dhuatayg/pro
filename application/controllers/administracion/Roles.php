<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roles extends CI_Controller {

	// Constructor del controlador Roles
	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {   
            redirect(base_url());   
        }else if ($this->session->userdata("id_rol") != 1){
			redirect(base_url());
		}
		$this->load->model("Roles_model");
		$this->load->library('form_validation');
	}

	// Enrutador Vista List
	public function index(){
		$data  = array(
			'roles' => $this->Roles_model->getRoles(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/roles/list",$data);
		$this->load->view("layouts/footer");

    }
	
	// Enrutador Vista Add
	public function add(){
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/roles/add");
		$this->load->view("layouts/footer");
	}
	
	// Enrutador Vista Edit
	public function edit($id){
		$data  = array(
			'rol' => $this->Roles_model->getRol($id), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/roles/edit",$data);
		$this->load->view("layouts/footer");
	}

	// Metodo Guardar Roles
    public function store(){
        // Campos 
        $abre_rol = $this->input->post("abre_rol");
        $nombre_rol = $this->input->post("nombre_rol");
		$descripcion_rol = $this->input->post("descripcion_rol");
        // Validaciones
        $this->form_validation->set_rules('nombre_rol','nombre','trim|required|min_length[3]|max_length[200]|is_unique[rol.nombre_rol]');
        $this->form_validation->set_rules('descripcion_rol','descripción','trim|required|min_length[3]|max_length[250]');
        // Metodos
		if ($this->form_validation->run()) {
            // Arreglo Roles
            $data  = array(
				'abre_rol' => $abre_rol,
				'nombre_rol' => $nombre_rol,
				'descripcion_rol' => $descripcion_rol,
				'estado_rol' => "1"
            );
			if ($this->Roles_model->save($data)) {
                $this->session->set_flashdata("Guardar","Guardar");
				redirect(base_url()."administracion/roles");
            }else{
				$this->session->set_flashdata("Cancelar","Cancelar");
				redirect(base_url()."administracion/roles/add");
			}
		}
		else{
            $this->add();
		}	
	}

	// Metodo Modificar Rol
	public function update(){
        // Campos 
		$id_rol = $this->input->post("id_rol");
		$abre_rol = $this->input->post("abre_rol");
        $nombre_rol = $this->input->post("nombre_rol");
		$descripcion_rol = $this->input->post("descripcion_rol");
        // Validador
        $data_rol = $this->Roles_model->getRol($id_rol);
		if ($nombre_rol == $data_rol->nombre_rol) {
			$unico = "";
		}else{
            $unico = "|is_unique[rol.nombre_rol]";
        }
        $this->form_validation->set_rules('nombre_rol','nombre','trim|required|min_length[3]|max_length[200]'.$unico);
        $this->form_validation->set_rules('descripcion_rol','descripción','trim|required|min_length[3]|max_length[250]');
        //  Metodos
        if ($this->form_validation->run()) {
			$data  = array(
				'id_rol' => $id_rol, 
				'abre_rol' => $abre_rol,
				'nombre_rol' => $nombre_rol,
				'descripcion_rol' => $descripcion_rol,
				'estado_rol' => "1"
			);
			if ($this->Roles_model->update($id_rol,$data)) {
                $this->session->set_flashdata("Editar","Editar");
				redirect(base_url()."administracion/roles");
			}
			else{
				$this->session->set_flashdata("Cancelar","Cancelar");
				redirect(base_url()."administracion/roles/edit/".$id_rol);
			}
		}else{
            $this->edit($id_rol);
		}
    }

	// Metodo Eliminar Estado
	public function delete($id){
		$data  = array(
			'estado_rol' => "0", 
		);
		$this->Roles_model->update($id,$data);
		echo "administracion/roles";
        $this->session->set_flashdata("Eliminar","Eliminar");
	}

}