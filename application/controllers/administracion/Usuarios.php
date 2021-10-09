<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    // Constructor del controlador Usuarios
	public function __construct(){
        parent::__construct();
        if (!$this->session->userdata("login")) {   
            redirect(base_url());   
        }else if ($this->session->userdata("id_rol") != 1){
            redirect(base_url());
        }
        $this->load->model("Usuarios_model");
        $this->load->library('form_validation');
	}

    // Enrutador Vista List
	public function index(){
		$data  = array(
			'usuarios' => $this->Usuarios_model->getUsuarios()
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/usuarios/list",$data);
		$this->load->view("layouts/footer");
    }

    // Enrutador Vista Add
	public function add(){
        $data  = array(
            'empleados' => $this->Usuarios_model->getEmpleados(),
            'roles' => $this->Usuarios_model->getRoles()
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/usuarios/add",$data);
        $this->load->view("layouts/footer");
    }
    
    // Enrutador Vista Edit
    public function edit($id){
		$data =array(
            "usuario" => $this->Usuarios_model->getUsuario($id),
            'empleados' => $this->Usuarios_model->getEmpleados(),
            'roles' => $this->Usuarios_model->getRoles()
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/usuarios/edit",$data);
		$this->load->view("layouts/footer");
    }
    
    // Metodo Guardar Usuario
    public function store(){
        // Campos 
        $abre_usuario= $this->input->post("abre_usuario");
        $id_empleado= $this->input->post("id_empleado");
        $user_usuario= $this->input->post("user_usuario");
        $password_usuario= $this->input->post("password_usuario");
        $id_rol= $this->input->post("id_rol");
        // Validaciones
        $this->form_validation->set_rules('id_empleado','empleado','required');
        $this->form_validation->set_rules('user_usuario','usuario','trim|required|min_length[3]|max_length[200]|is_unique[usuario.user_usuario]');
        $this->form_validation->set_rules('password_usuario','contraseña','trim|required|min_length[3]|max_length[250]');
        $this->form_validation->set_rules('id_rol','rol','required');
        // Metodos
		if ($this->form_validation->run()) {
            // Arreglo Usuarios
            $data  = array(
				'abre_usuario' => $abre_usuario,
				'id_empleado' => $id_empleado,
                'user_usuario' => $user_usuario,
                'password_usuario' => sha1($password_usuario),
				'id_rol' => $id_rol,
				'estado_usuario' => "1"
            );
			if ($this->Usuarios_model->save($data)) {
                $this->session->set_flashdata("Guardar","Guardar");
				redirect(base_url()."administracion/usuarios");
            }else{
				$this->session->set_flashdata("Cancelar","Cancelar");
				redirect(base_url()."administracion/usuarios/add");
			}
		}
		else{
            $this->add();
		}	
	}

    // Metodo Modificar Usuario
    public function update(){
        // Campos 
        $id_usuario = $this->input->post("id_usuario");
        $abre_usuario= $this->input->post("abre_usuario");
        $id_empleado= $this->input->post("id_empleado");
        $user_usuario= $this->input->post("user_usuario");
        $password_usuario= $this->input->post("password_usuario");
        $id_rol= $this->input->post("id_rol");
        // Validador
        $data_usuario = $this->Usuarios_model->getUsuario($id_usuario);
		if ($user_usuario == $data_usuario->user_usuario) {
			$unico = "";
		}else{
            $unico = "|is_unique[usuario.user_usuario]";
        }
        $this->form_validation->set_rules('id_empleado','empleado','required');
        $this->form_validation->set_rules('user_usuario','usuario','trim|required|min_length[3]|max_length[200]'.$unico);
        $this->form_validation->set_rules('password_usuario','contraseña','trim|required|min_length[3]|max_length[250]');
        $this->form_validation->set_rules('id_rol','rol','required');
        //  Metodos
        if ($this->form_validation->run()) {
			$data  = array(
				'id_usuario' => $id_usuario, 
				'abre_usuario' => $abre_usuario,
				'id_empleado' => $id_empleado,
                'user_usuario' => $user_usuario,
                'password_usuario' => sha1($password_usuario),
                'id_rol' => $id_rol,
				'estado_usuario' => "1"
			);
			if ($this->Usuarios_model->update($id_usuario,$data)) {
                $this->session->set_flashdata("Editar","Editar");
				redirect(base_url()."administracion/usuarios");
			}
			else{
				$this->session->set_flashdata("Cancelar","Cancelar");
				redirect(base_url()."administracion/usuarios/edit/".$id_usuario);
			}
		}else{
            $this->edit($id_usuario);
		}
    }

    // Metodo Eliminar Estado
	public function delete($id){
		$data  = array(
			'estado_usuario' => "0", 
		);
		$this->Usuarios_model->update($id,$data);
        echo "administracion/usuarios";
        $this->session->set_flashdata("Eliminar","Eliminar");
	}

}