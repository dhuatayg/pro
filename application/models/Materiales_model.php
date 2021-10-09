<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materiales_model extends CI_Model {

	// Generar Código de Material
    public function GenerarIDMaterial(){
		$query=$this->db->get("material");
		$numero_final=$query->num_rows()+1;
		if ($numero_final <= 9) {  
            $id = "MT00000".$numero_final;
		} else if ($numero_final > 9 && $numero_final <=99){   		
            $id = "MT0000".$numero_final; 
		}else if ($numero_final > 99 && $numero_final <=999){  		
            $id = "MT000".$numero_final; 
		}else if ($numero_final > 999 && $numero_final <=9999){ 		
            $id = "MT00".$numero_final; 
		}else if ($numero_final > 9999 && $numero_final <=99999){ 	
            $id = "MT0".$numero_final; 
		}else{	
            $id = "MT".$numero_final; 
		}	
		return $id;
	}

	// Metodo Guardar Material
	public function save($data){
		return $this->db->insert("material",$data);
	}

	// Metodo Editar Material
	public function update($id,$data){
		$this->db->where("id_material",$id);
		return $this->db->update("material",$data);
	}

	// Query para obtener Materiales
	public function getMateriales(){
		$this->db->where("estado_material","1");
		$resultados = $this->db->get("material");
		return $resultados->result();
	}

	// Query para obtener un Material
	public function getMaterial($id){
		$this->db->where("id_material",$id);
		$resultado = $this->db->get("material");
		return $resultado->row();
	}

	// Query para obtener un Material Select
	public function getMaterial2($id){
		$this->db->where("id_material",$id);
		$resultado = $this->db->get("material");
		return $resultado->result_array();
	}
	
}
