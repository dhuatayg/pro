<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estados_model extends CI_Model {

    // Generar Código de Estado
    public function GenerarIDEstados(){
		$query=$this->db->get("estado");
		$numero_final=$query->num_rows()+1;
		if ($numero_final <= 9) {  
            $id = "ES00000".$numero_final;
		} else if ($numero_final > 9 && $numero_final <=99){   		
            $id = "ES0000".$numero_final; 
		}else if ($numero_final > 99 && $numero_final <=999){  		
            $id = "ES000".$numero_final; 
		}else if ($numero_final > 999 && $numero_final <=9999){ 		
            $id = "ES00".$numero_final; 
		}else if ($numero_final > 9999 && $numero_final <=99999){ 	
            $id = "ES0".$numero_final; 
		}else{	
            $id = "ES".$numero_final; 
		}	
		return $id;
    }
    
    // Metodo Guardar Estado
    public function save($data){
		return $this->db->insert("estado",$data);
    }
    
    // Metodo Modificar Estado
	public function update($id,$data){
		$this->db->where("id_estado",$id);
		return $this->db->update("estado",$data);
    }
    
    // Query para obtener Estados
    public function getEstados(){
		$this->db->where("estado_estado","1");
		$resultados = $this->db->get("estado");
		return $resultados->result();
	}
    
    // Query para obtener un Estado
    public function getEstado($id){
		$this->db->where("id_estado",$id);
		$resultado = $this->db->get("estado");
		return $resultado->row();
	}

}