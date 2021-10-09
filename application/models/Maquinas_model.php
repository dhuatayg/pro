<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maquinas_model extends CI_Model {

	// Generar Código de Maquinas
    public function GenerarIDMaquina(){
		$query=$this->db->get("maquina");
		$numero_final=$query->num_rows()+1;
		if ($numero_final <= 9) {  
            $id = "MA00000".$numero_final;
		} else if ($numero_final > 9 && $numero_final <=99){   		
            $id = "MA0000".$numero_final; 
		}else if ($numero_final > 99 && $numero_final <=999){  		
            $id = "MA000".$numero_final; 
		}else if ($numero_final > 999 && $numero_final <=9999){ 		
            $id = "MA00".$numero_final; 
		}else if ($numero_final > 9999 && $numero_final <=99999){ 	
            $id = "MA0".$numero_final; 
		}else{	
            $id = "MA".$numero_final; 
		}	
		return $id;
	}
	
	// Metodo Guardar Máquina
	public function save($data){
		return $this->db->insert("maquina",$data);
	}

	// Metodo Modificar Máquina
	public function update($id,$data){
		$this->db->where("id_maquina",$id);
		return $this->db->update("maquina",$data);
	}

	// Query para obtener Máquinas
	public function getMaquinas(){
		$this->db->select("m.*,a.nombre_area as area");
		$this->db->from("maquina m");
		$this->db->join("area a","m.id_area = a.id_area");
		$this->db->where("m.estado_maquina","1");
		$resultados = $this->db->get();
		return $resultados->result();
	}

	// Query para obtener un Máquina
	public function getMaquina($id){
		$this->db->where("id_maquina",$id);
		$resultado = $this->db->get("maquina");
		return $resultado->row();
	}

	// Query para obtener un Material Select
	public function getMaquina2($id){
		$this->db->select("m.*,a.nombre_area as area");
		$this->db->from("maquina m");
		$this->db->join("area a","m.id_area = a.id_area");
		$this->db->where("m.estado_maquina","1");
		$this->db->where("id_maquina",$id);
		$resultado = $this->db->get();
		return $resultado->result_array();
	}
	
	
}