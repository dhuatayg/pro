<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Procesos_model extends CI_Model {

	// Generar Código de Proceso
	public function GenerarIDProceso(){
		$query=$this->db->get("proceso");
		$numero_final=$query->num_rows()+1;
		if ($numero_final <= 9) {  
			$id = "PO00000".$numero_final;
		} else if ($numero_final > 9 && $numero_final <=99){   		
			$id = "PO0000".$numero_final; 
		}else if ($numero_final > 99 && $numero_final <=999){  		
			$id = "PO000".$numero_final; 
		}else if ($numero_final > 999 && $numero_final <=9999){ 		
			$id = "PO00".$numero_final; 
		}else if ($numero_final > 9999 && $numero_final <=99999){ 	
			$id = "PO0".$numero_final; 
		}else{	
			$id = "PO".$numero_final; 
		}	
		return $id;
	}

	// Metodo Guardar Proceso
	public function save($data){
		return $this->db->insert("proceso",$data);
	}

	// Metodo Modificar Proceso
	public function update($id,$data){
		$this->db->where("id_proceso",$id);
		return $this->db->update("proceso",$data);
	}

	// Query para obtener Procesos
	public function getProcesos(){
		$this->db->select("p.*,a.nombre_area as area");
		$this->db->from("proceso p");
		$this->db->join("area a","p.id_area = a.id_area");
		$this->db->where("p.estado_proceso","1");
		$resultados = $this->db->get();
		return $resultados->result();
	}

	// Query para obtener un Proceso
	public function getProceso($id){
		$this->db->where("id_proceso",$id);
		$resultado = $this->db->get("proceso");
		return $resultado->row();
	}

	// Query para obtener un Proceso Select
	public function getProceso2($id){
		$this->db->select("p.*,a.nombre_area as area");
		$this->db->from("proceso p");
		$this->db->join("area a","p.id_area = a.id_area");
		$this->db->where("p.estado_proceso","1");
		$this->db->where("id_proceso",$id);
		$resultado = $this->db->get();
		return $resultado->result_array();
	}
	

}