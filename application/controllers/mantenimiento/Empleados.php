<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empleados extends CI_Controller {

	// Constructor del controlador Empleados
	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {   
            redirect(base_url());   
        }else if ($this->session->userdata("id_rol") != 1){
			redirect(base_url());
		}
		$this->load->model("Empleados_model");
		$this->load->library('form_validation');
	}

	// Enrutador Vista List
	public function index(){
		$data  = array(
			'empleados' => $this->Empleados_model->getEmpleados(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/empleados/list",$data);
		$this->load->view("layouts/footer");
	}

	// Enrutador Vista Add
	public function add(){
		$data =array( 
			"cargos" => $this->Empleados_model->getCargos(),
			"areas" => $this->Empleados_model->getAreas()
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/empleados/add",$data);
		$this->load->view("layouts/footer");
	}

	// Enrutador Vista Edit
	public function edit($id){
		$data =array(
			"empleado" => $this->Empleados_model->getEmpleado($id),
			"cargos" => $this->Empleados_model->getCargos(),
			"areas" => $this->Empleados_model->getAreas()
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/empleados/edit",$data);
		$this->load->view("layouts/footer");
	}

	// Metodo Guardar Empleados
    public function store(){
        // Campos 
		$dni_empleado = $this->input->post("dni_empleado");
		$nombre_empleado = $this->input->post("nombre_empleado");
		$paterno_empleado = $this->input->post("paterno_empleado");
		$materno_empleado = $this->input->post("materno_empleado");
		$telefono_empleado = $this->input->post("telefono_empleado");
		$id_cargo = $this->input->post("id_cargo");
		$id_area = $this->input->post("id_area");
		// Validaciones
		$this->form_validation->set_rules('dni_empleado','dni','trim|required|min_length[8]|max_length[8]|is_unique[empleado.dni_empleado]');
		$this->form_validation->set_rules('nombre_empleado','nombre','trim|required|min_length[2]|max_length[200]');
		$this->form_validation->set_rules('paterno_empleado','paterno','trim|required|min_length[2]|max_length[200]');
		$this->form_validation->set_rules('materno_empleado','materna','trim|required|min_length[2]|max_length[200]');
		$this->form_validation->set_rules('telefono_empleado','teléfono','trim|required|min_length[7]|max_length[9]');
		$this->form_validation->set_rules('id_cargo','cargo','required');
		$this->form_validation->set_rules('id_area','area','required');
		// Vista Imprimir Cliente
		if ($this->form_validation->run()) {
			// Arreglo Empleados
			$data  = array(
				'dni_empleado' => $dni_empleado,
				'nombre_empleado' => $nombre_empleado,
				'paterno_empleado' => $paterno_empleado,
				'materno_empleado' => $materno_empleado,
                'telefono_empleado' => $telefono_empleado,
                'id_cargo' => $id_cargo,
                'id_area' => $id_area,
				'estado_empleado' => "1"
			);
			if ($this->Empleados_model->save($data)) {
				redirect(base_url()."mantenimiento/empleados");
            }else{
				$this->session->set_flashdata("error","No se pudo guardar la informacion");
				redirect(base_url()."mantenimiento/empleados/add");
			}
		}
		else{
			$this->add();
		}	
	}

	// Metodo Modificar Empleado
	public function update(){
		// Campos 
		$id_empleado = $this->input->post("id_empleado");
		$dni_empleado = $this->input->post("dni_empleado");
		$nombre_empleado = $this->input->post("nombre_empleado");
		$paterno_empleado = $this->input->post("paterno_empleado");
		$materno_empleado = $this->input->post("materno_empleado");
		$telefono_empleado = $this->input->post("telefono_empleado");
		$id_cargo = $this->input->post("id_cargo");
		$id_area = $this->input->post("id_area");
		// Validador
		$data_empleado = $this->Empleados_model->getEmpleado($id_empleado);
		if ($dni_empleado == $data_empleado->dni_empleado) {
			$unico = "";
		}else{
			$unico = "|is_unique[empleado.dni_empleado]";
		}
		var_dump($data_empleado);
		// Validaciones
		$this->form_validation->set_rules('dni_empleado','dni','trim|required|min_length[8]|max_length[8]'.$unico);
		$this->form_validation->set_rules('nombre_empleado','nombre','trim|required|min_length[2]|max_length[200]');
		$this->form_validation->set_rules('paterno_empleado','paterno','trim|required|min_length[2]|max_length[200]');
		$this->form_validation->set_rules('materno_empleado','materna','trim|required|min_length[2]|max_length[200]');
		$this->form_validation->set_rules('telefono_empleado','teléfono','trim|required|min_length[7]|max_length[9]');
		$this->form_validation->set_rules('id_cargo','cargo','required');
		$this->form_validation->set_rules('id_area','area','required');
		//  Metodos
		if ($this->form_validation->run()) {
			//Arreglo
			$data  = array(
				'id_empleado' => $id_empleado, 
				'dni_empleado' => $dni_empleado,
				'nombre_empleado' => $nombre_empleado,
				'paterno_empleado' => $paterno_empleado,
				'materno_empleado' => $materno_empleado, 
				'telefono_empleado' => $telefono_empleado,
				'id_cargo' => $id_cargo,
				'id_area' => $id_area,
				'estado_empleado' => "1"
			);
			if ($this->Empleados_model->update($id_empleado,$data)) {
				$this->session->set_flashdata("Editar","Editar");
				redirect(base_url()."mantenimiento/empleados");
			}
			else{
				$this->session->set_flashdata("Cancelar","Cancelar");
				redirect(base_url()."mantenimiento/empleados/edit/".$id_empleado);
			}
		}else{
			$this->edit($id_empleado);
		}
	}

    // Metodo Eliminar Empleado
	public function delete($id){
		//Arreglo
		$data  = array(
			'estado_empleado' => "0", 
		);
		$this->Empleados_model->update($id,$data);
		echo "mantenimiento/empleados";
	}

}