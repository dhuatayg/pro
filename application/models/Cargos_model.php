<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cargos_model extends CI_Model {

	// Generar Código de Cargo
    public function GenerarIDCargo(){
		$query=$this->db->get("cargo");
		$numero_final=$query->num_rows()+1;
		if ($numero_final <= 9) {  
            $id = "CR00000".$numero_final;
		} else if ($numero_final > 9 && $numero_final <=99){   		
            $id = "CR0000".$numero_final; 
		}else if ($numero_final > 99 && $numero_final <=999){  		
            $id = "CR000".$numero_final; 
		}else if ($numero_final > 999 && $numero_final <=9999){ 		
            $id = "CR00".$numero_final; 
		}else if ($numero_final > 9999 && $numero_final <=99999){ 	
            $id = "CR0".$numero_final; 
		}else{	
            $id = "CR".$numero_final; 
		}	
		return $id;
	}
	
	// Metodo Guardar Cargo
	public function save($data){
		return $this->db->insert("cargo",$data);
	}

	// Metodo Modificar Cargo
	public function update($id,$data){
		$this->db->where("id_cargo",$id);
		return $this->db->update("cargo",$data);
	}

	// Query para obtener Cargos
	public function getCargos(){
		$this->db->where("estado_cargo","1");
		$resultados = $this->db->get("cargo");
		return $resultados->result();
	}

	// Query para obtener un Cargo
	public function getCargo($id){
		$this->db->where("id_cargo",$id);
		$resultado = $this->db->get("cargo");
		return $resultado->row();
	}

	
}
