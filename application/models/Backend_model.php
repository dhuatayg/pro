<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend_model extends CI_Model {

    // Número de Producciones
    public function row_count_producciones(){
        $this->db->where("ind_produccion","1");
        $resultados = $this->db->get("produccion");
        return $resultados->num_rows();
    }

    // Número de Pedidos
    public function row_count_pedidos(){
        $this->db->where("ind_pedido","1");
        $resultados = $this->db->get("pedido");
        return $resultados->num_rows();
    }
    
    // Número de Productos
    public function row_count_productos(){
        $this->db->where("estado_producto","1");
        $resultados = $this->db->get("producto");
        return $resultados->num_rows();
    }

    // Número de Materiales
    public function row_count_material(){
         $this->db->where("estado_material","1");
         $resultados = $this->db->get("material");
         return $resultados->num_rows();
    }
	
}

