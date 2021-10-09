<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Areas_model extends CI_Model {

	// Generar Código de Area
	public function GenerarIDArea(){
		$query=$this->db->get("area");
		$numero_final=$query->num_rows()+1;
		if ($numero_final <= 9) {  
			$id = "AR00000".$numero_final;
		} else if ($numero_final > 9 && $numero_final <=99){   		
			$id = "AR0000".$numero_final; 
		}else if ($numero_final > 99 && $numero_final <=999){  		
			$id = "AR000".$numero_final; 
		}else if ($numero_final > 999 && $numero_final <=9999){ 		
			$id = "AR00".$numero_final; 
		}else if ($numero_final > 9999 && $numero_final <=99999){ 	
			$id = "AR0".$numero_final; 
		}else{	
			$id = "AR".$numero_final; 
		}	
		return $id;
	}

	// Metodo Guardar Area
	public function save($data){
		return $this->db->insert("area",$data);
	}

	// Metodo Modificar Area
	public function update($id,$data){
		$this->db->where("id_area",$id);
		return $this->db->update("area",$data);
	}

	// Query para obtener Areas
	public function getAreas(){
		$this->db->where("estado_area","1");
		$resultados = $this->db->get("area");
		return $resultados->result();
	}

	// Query para obtener un Area
	public function getArea($id){
		$this->db->where("id_area",$id);
		$resultado = $this->db->get("area");
		return $resultado->row();
	}
	
}

