<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias_model extends CI_Model {

	// Generar Código de Categoría
	public function GenerarIDCategoria(){
		$query=$this->db->get("categoria");
		$numero_final=$query->num_rows()+1;
		if ($numero_final <= 9) {  
			$id = "CA00000".$numero_final;
		} else if ($numero_final > 9 && $numero_final <=99){   		
			$id = "CA0000".$numero_final; 
		}else if ($numero_final > 99 && $numero_final <=999){  		
			$id = "CA000".$numero_final; 
		}else if ($numero_final > 999 && $numero_final <=9999){ 		
			$id = "CA00".$numero_final; 
		}else if ($numero_final > 9999 && $numero_final <=99999){ 	
			$id = "CA0".$numero_final; 
		}else{	
			$id = "CA".$numero_final; 
		}	
		return $id;
	}

	// Metodo Guardar Categoría
	public function save($data){
		return $this->db->insert("categoria",$data);
	}

	// Metodo Modificar Categoría
	public function update($id,$data){
		$this->db->where("id_categoria",$id);
		return $this->db->update("categoria",$data);
	}

	// Query para obtener Categorías
	public function getCategorias(){
		$this->db->where("estado_categoria","1");
		$resultados = $this->db->get("categoria");
		return $resultados->result();
	}
	
	// Query para obtener un Categoría
	public function getCategoria($id){
		$this->db->where("id_categoria",$id);
		$resultado = $this->db->get("categoria");
		return $resultado->row();
	}

}
