<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roles_model extends CI_Model {

	// Generar Código de Rol
    public function GenerarIDRol(){
		$query=$this->db->get("rol");
		$numero_final=$query->num_rows()+1;
		if ($numero_final <= 9) {  
            $id = "RO00000".$numero_final;
		} else if ($numero_final > 9 && $numero_final <=99){   		
            $id = "RO0000".$numero_final; 
		}else if ($numero_final > 99 && $numero_final <=999){  		
            $id = "RO000".$numero_final; 
		}else if ($numero_final > 999 && $numero_final <=9999){ 		
            $id = "RO00".$numero_final; 
		}else if ($numero_final > 9999 && $numero_final <=99999){ 	
            $id = "RO0".$numero_final; 
		}else{	
            $id = "RO".$numero_final; 
		}	
		return $id;
    }

	// Metodo Guardar Rol
	public function save($data){
		return $this->db->insert("rol",$data);
	}

	// Metodo Modificar Rol
	public function update($id,$data){
		$this->db->where("id_rol",$id);
		return $this->db->update("rol",$data);
	}

	// Query para obtener Rol
	public function getRoles(){
		$this->db->where("estado_rol","1");
		$resultados = $this->db->get("rol");
		return $resultados->result();
	}

	// Query para obtener un Rol
	public function getRol($id){
		$this->db->where("id_rol",$id);
		$resultado = $this->db->get("rol");
		return $resultado->row();
	}
	
}
