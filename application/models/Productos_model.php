<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos_model extends CI_Model {
	
	// Generar Código de Producto
    public function GenerarIDProducto(){
		$query=$this->db->get("producto");
		$numero_final=$query->num_rows()+1;
		if ($numero_final <= 9) {  
            $id = "PR00000".$numero_final;
		} else if ($numero_final > 9 && $numero_final <=99){   		
            $id = "PR0000".$numero_final; 
		}else if ($numero_final > 99 && $numero_final <=999){  		
            $id = "PR000".$numero_final; 
		}else if ($numero_final > 999 && $numero_final <=9999){ 		
            $id = "PR00".$numero_final; 
		}else if ($numero_final > 9999 && $numero_final <=99999){ 	
            $id = "PR0".$numero_final; 
		}else{	
            $id = "PR".$numero_final; 
		}	
		return $id;
	}

	// Obtener Id de Producto
	public function GenerarID(){
		$query=$this->db->get("producto");
		$numero_final=$query->num_rows()+1;	
		return $numero_final;
	}

	// Metodo Guardar Producto
	public function save($data){
		return $this->db->insert("producto",$data);
	}

	// Metodo Guardar Producto - Materiales
	public function save_material($data){
		$this->db->insert("maproducto",$data);
	}

	// Metodo Guardar Producto - Máquinas
	public function save_maquina($data){
		$this->db->insert("mqproducto",$data);
	}

	// Metodo Modificar Producto
	public function update($id,$data){
		$this->db->where("id_producto",$id);
		return $this->db->update("producto",$data);
	}

	// Metodo Desterrar Materiales
	public function desterrar_material($id_producto){
		$this->db->where('id_producto', $id_producto);
		$this->db->delete('maproducto');
	}

	// Metodo Desterrar Maquinas
	public function desterrar_maquina($id_producto){
		$this->db->where('id_producto', $id_producto);
		$this->db->delete('mqproducto');
	}

	// Query para obtener Productos
	public function getProductos(){
		$this->db->select("p.*,c.nombre_categoria as categoria");
		$this->db->from("producto p");
		$this->db->join("categoria c","p.id_categoria = c.id_categoria");
		$this->db->where("p.estado_producto","1");
		$resultados = $this->db->get();
		return $resultados->result();
	}
	
	// Query para obtener un Producto
	public function getProducto($id){
		$this->db->select("p.*,c.nombre_categoria as categoria");;
		$this->db->from("producto p");
		$this->db->join("categoria c","p.id_categoria = c.id_categoria");
		$this->db->where("p.id_producto",$id);
		$resultado = $this->db->get();
		return $resultado->row();
	}

	// Query para obtener Materiales de un Producto
	public function getProductoMateriales($id){
		$this->db->select("m.id_material as id, m.abre_material as cod,m.nombre_material as nom,m.descripcion_material as des,m.unidad_material as uni,m.stock_material as sto, ma.cantidad_maproducto as nec, ma.monto_maproducto as mapr");
		$this->db->from("maproducto ma");
		$this->db->join("material m","ma.id_material = m.id_material"); 
		$this->db->where("ma.id_producto",$id);
		$this->db->where("ma.estado_maproducto","1");
		$resultados = $this->db->get();
		return $resultados->result();
	}
	
	// Query para obtener Máquinas de un Producto
	public function getProductoMaquinas($id){
		$this->db->select("q.id_maquina as num,q.abre_maquina as cod,q.nombre_maquina as nom,
		q.descripcion_maquina as des,a.nombre_area as are");
		$this->db->from("mqproducto mq");
		$this->db->join("maquina q","mq.id_maquina= q.id_maquina"); 
		$this->db->join("area a","q.id_area= a.id_area"); 
		$this->db->where("mq.id_producto",$id);
		$this->db->where("mq.estado_mqproducto ","1");
		$resultados = $this->db->get();
		return $resultados->result();
	}

	// Query para obtener un Producto Select
	public function getProducto2($id){
		$this->db->where("id_producto",$id);
		$resultado = $this->db->get("producto");
		return $resultado->result_array();
	}

	// Query para obtener un Producto Select
	public function getMateriales2($id){
		$this->db->select("m.id_material as id, m.abre_material as cod,m.nombre_material as nom,m.descripcion_material as des,m.unidad_material as uni,m.stock_material as sto, ma.cantidad_maproducto as nec, ma.monto_maproducto as mapr");
		$this->db->from("maproducto ma");
		$this->db->join("material m","ma.id_material = m.id_material"); 
		$this->db->where("id_producto",$id);
		$this->db->where("ma.estado_maproducto","1");
		$resultados = $this->db->get();
		return $resultados->result_array();
	}

}