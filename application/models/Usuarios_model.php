<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model {

	// Generar Código de Usuario
    public function GenerarIDUsuario(){
		$query=$this->db->get("usuario");
		$numero_final=$query->num_rows()+1;
		if ($numero_final <= 9) {  
            $id = "US00000".$numero_final;
		} else if ($numero_final > 9 && $numero_final <=99){   		
            $id = "US0000".$numero_final; 
		}else if ($numero_final > 99 && $numero_final <=999){  		
            $id = "US000".$numero_final; 
		}else if ($numero_final > 999 && $numero_final <=9999){ 		
            $id = "US00".$numero_final; 
		}else if ($numero_final > 9999 && $numero_final <=99999){ 	
            $id = "US0".$numero_final; 
		}else{	
            $id = "US".$numero_final; 
		}	
		return $id;
    }
    
    // Metodo Guardar Usuario
    public function save($data){
		return $this->db->insert("usuario",$data);
    }
    
    // Metodo Modificar Usuario
	public function update($id,$data){
		$this->db->where("id_usuario",$id);
		return $this->db->update("usuario",$data);
    }
    
    // Query para obtener Usuarios
    public function getUsuarios(){
		$this->db->select("u.*, e.id_empleado as cempleado,dni_empleado as dni,e.nombre_empleado as nombre, e.paterno_empleado as paterno, e.materno_empleado as materno, r.id_rol as crol,r.nombre_rol as rol");
		$this->db->from("usuario u");
		$this->db->join("empleado e","u.id_empleado = e.id_empleado");
		$this->db->join("rol r","u.id_rol= r.id_rol");
		$this->db->where("u.estado_usuario","1");
		$resultados = $this->db->get();
		return $resultados->result();
	}
    
    // Query para obtener un Usuario
    public function getUsuario($id){
		$this->db->where("id_usuario",$id);
		$resultado = $this->db->get("usuario");
		return $resultado->row();
	}

	// Query para obtener Empleados
	public function getEmpleados(){
		$this->db->select("e.id_empleado as id,e.nombre_empleado as nombre, e.paterno_empleado as paterno, e.materno_empleado as materno");
		$this->db->from("empleado e");
		$this->db->where("e.estado_empleado","1");
		$resultados = $this->db->get();
		return $resultados->result();
	}

	// Query para obtener Rol
	public function getRoles(){
		$this->db->select("r.id_rol as id,r.nombre_rol as nombre");
		$this->db->from("rol r");
		$this->db->where("r.estado_rol","1");
		$resultados = $this->db->get();
		return $resultados->result();
	}

	// Query Login
	public function login($username, $password){
		$this->db->select("u.id_usuario as id, e.id_empleado as cempleado,e.nombre_empleado as nombre, e.paterno_empleado as paterno, e.materno_empleado as materno, u.user_usuario as usuario, u.password_usuario as password, r.id_rol as crol,r.nombre_rol as rol");
		$this->db->from("usuario u");
		$this->db->join("empleado e","e.id_empleado = u.id_empleado");
		$this->db->join("rol r","u.id_rol = r.id_rol");
		$this->db->where("u.user_usuario", $username);
		$this->db->where("u.password_usuario", $password);
		$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {	
			return $resultados->row();	
		}
		else{	
			return false;	
		}
	}

}
