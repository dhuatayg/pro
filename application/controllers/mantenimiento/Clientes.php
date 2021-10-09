<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {

	// Constructor del controlador Clientes
	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {   
            redirect(base_url());   
		}else if ($this->session->userdata("id_rol") == 2){
			redirect(base_url());
		}
		$this->load->model("Clientes_model");
		$this->load->library('form_validation');
	}

	// Enrutador Vista List
	public function index(){
		$data  = array(
			'clientes' => $this->Clientes_model->getClientes(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/clientes/list",$data);
		$this->load->view("layouts/footer");

	}

	// Enrutador Vista Add
	public function add(){
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/clientes/add");
		$this->load->view("layouts/footer");
	}

	// Enrutador Vista Edit
	public function edit($id){
		$data  = array(
			'cliente' => $this->Clientes_model->getCliente($id), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/clientes/edit",$data);
		$this->load->view("layouts/footer");
	}

	// Metodo Guardar Cliente
    public function store(){
        // Campos 
        $ndocumento_cliente = $this->input->post("ndocumento_cliente");
        $nombre_cliente = $this->input->post("nombre_cliente");
        $telefono_cliente = $this->input->post("telefono_cliente");
        $correo_cliente = $this->input->post("correo_cliente");
		// Validaciones
		$this->form_validation->set_rules('ndocumento_cliente','documento de identidad','trim|required|min_length[8]|max_length[15]|is_unique[cliente.ndocumento_cliente]');
        $this->form_validation->set_rules('nombre_cliente','nombre','trim|required|min_length[3]|max_length[200]');
		$this->form_validation->set_rules('telefono_cliente','teléfono','trim|required|min_length[7]|max_length[9]');
		$this->form_validation->set_rules('correo_cliente','correo','trim|required|valid_email|min_length[3]|max_length[250]');
        // Metodos
		if ($this->form_validation->run()) {
            // Arreglo Clientes
            $data  = array(
				'ndocumento_cliente' => $ndocumento_cliente,
				'nombre_cliente' => $nombre_cliente,
				'telefono_cliente' => $telefono_cliente,
				'correo_cliente' => $correo_cliente,
				'estado_cliente' => "1"
            );
			if ($this->Clientes_model->save($data)) {
                $this->session->set_flashdata("Guardar","Guardar");
				redirect(base_url()."mantenimiento/clientes");
            }else{
				$this->session->set_flashdata("Cancelar","Cancelar");
				redirect(base_url()."mantenimiento/clientes/add");
			}
		}
		else{
            $this->add();
		}	
	}

	// Metodo Modificar Cliente
	public function update(){
        // Campos 
        $id_cliente = $this->input->post("id_cliente");
        $ndocumento_cliente = $this->input->post("ndocumento_cliente");
        $nombre_cliente = $this->input->post("nombre_cliente");
        $telefono_cliente = $this->input->post("telefono_cliente");
		$correo_cliente = $this->input->post("correo_cliente");
        // Validador
		$data_cliente = $this->Clientes_model->getCliente($id_cliente);
		if ($ndocumento_cliente == $data_cliente->ndocumento_cliente) {
			$unico = "";
		}else{
            $unico = "|is_unique[cliente.ndocumento_cliente]";
		}
		// Validaciones
        $this->form_validation->set_rules('ndocumento_cliente','documento de identidad','trim|required|min_length[8]|max_length[15]'.$unico);
        $this->form_validation->set_rules('nombre_cliente','nombre','trim|required|min_length[3]|max_length[200]');
		$this->form_validation->set_rules('telefono_cliente','teléfono','trim|required|min_length[7]|max_length[9]');
		$this->form_validation->set_rules('correo_cliente','correo','trim|required|valid_email|min_length[3]|max_length[250]');
        //  Metodos
        if ($this->form_validation->run()) {
			//Arreglo
			$data  = array(
				'id_cliente' => $id_cliente, 
				'ndocumento_cliente' => $ndocumento_cliente,
				'nombre_cliente' => $nombre_cliente,
				'telefono_cliente' => $telefono_cliente,
				'correo_cliente' => $correo_cliente,
				'estado_cliente' => "1"
			);
			if ($this->Clientes_model->update($id_cliente,$data)) {
                $this->session->set_flashdata("Editar","Editar");
				redirect(base_url()."mantenimiento/clientes");
			}
			else{
				$this->session->set_flashdata("Cancelar","Cancelar");
				redirect(base_url()."mantenimiento/clientes/edit/".$id_cliente);
			}
		}else{
            $this->edit($id_cliente);
		}
    }

	// Metodo Eliminar Cliente
	public function delete($id){
		$data  = array(
			'estado_cliente' => "0", 
		);
		$this->Clientes_model->update($id,$data);
		echo "mantenimiento/clientes";
	}
}
