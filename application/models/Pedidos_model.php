<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedidos_model extends CI_Model {
	
	// Generar Código de Pedido
	public function GenerarIDPedido(){
		$query=$this->db->get("pedido");
		$numero_final=$query->num_rows()+1;
		if ($numero_final <= 9) {  
			$id = "PE00000".$numero_final;
		} else if ($numero_final > 9 && $numero_final <=99){   		
			$id = "PE0000".$numero_final; 
		}else if ($numero_final > 99 && $numero_final <=999){  		
			$id = "PE000".$numero_final; 
		}else if ($numero_final > 999 && $numero_final <=9999){ 		
			$id = "PE00".$numero_final; 
		}else if ($numero_final > 9999 && $numero_final <=99999){ 	
			$id = "PE0".$numero_final; 
		}else{	
			$id = "PE".$numero_final; 
		}	
		return $id;
	}

	// Generar Código de Producción
	public function GenerarIDProduccion(){
		$query=$this->db->get("produccion");
		$numero_final=$query->num_rows()+1;
		if ($numero_final <= 9) {  
			$id = "OP00000".$numero_final;
		} else if ($numero_final > 9 && $numero_final <=99){   		
			$id = "OP0000".$numero_final; 
		}else if ($numero_final > 99 && $numero_final <=999){  		
			$id = "OP000".$numero_final; 
		}else if ($numero_final > 999 && $numero_final <=9999){ 		
			$id = "OP00".$numero_final; 
		}else if ($numero_final > 9999 && $numero_final <=99999){ 	
			$id = "OP0".$numero_final; 
		}else{	
			$id = "OP".$numero_final; 
		}	
		return $id;
	}

	// Obtener ID de Pedido
	public function GenerarID(){
		$query=$this->db->get("pedido");
		$numero_final=$query->num_rows()+1;	
		return $numero_final;
	}

	// Metodo Guardar Producto
	public function save($data){
		return $this->db->insert("pedido",$data);
	}

	// Metodo Editar Pedido
	public function update($id,$data){
		$this->db->where("id_pedido",$id);
		return $this->db->update("pedido",$data);
	}

	// Metodo Guardar Detalle de Pedido
	public function save_detalle($data){
		$this->db->insert("detallepedido",$data);
	}

	// Metodo Guardar Produccion
	public function save_produccion($data){
		$this->db->insert("produccion",$data);
	}

	// Query para obtener Estados
    public function getEstados(){
		$this->db->where("id_estado","1");
		$this->db->or_where("id_estado","2");
		$resultados = $this->db->get("estado");
		return $resultados->result();
	}

	// Query para autocompletar Cliente
	public function getClienteAutocomplete($nombre){
		$this->db->select("id_cliente as id,nombre_cliente as label,ndocumento_cliente as doc,telefono_cliente as tel,correo_cliente as cor");
		$this->db->from("cliente");
		$this->db->like('nombre_cliente', $nombre);
		$this->db->where("estado_cliente","1");
		$resultado = $this->db->get();
		return $resultado->result_array();
	}

	// Query para obtener Pedido
	public function getPedido($id){
		$this->db->select("p.*,c.id_cliente as id,c.ndocumento_cliente as doc,c.nombre_cliente as nom,c.telefono_cliente as tel,c.correo_cliente as cor, e.nombre_estado as es");
		$this->db->from("pedido p");
		$this->db->join("cliente c","p.id_cliente = c.id_cliente");
		$this->db->join("estado e","p.id_estado = e.id_estado");
		$this->db->where("p.id_pedido",$id);
		$resultado = $this->db->get();
		return $resultado->row();
	}

	// Query para obtener Pedidos
	public function getPedidos(){
		$this->db->select("p.*,c.nombre_cliente as nom, e.nombre_estado as es");
		$this->db->from("pedido p");
		$this->db->join("cliente c","p.id_cliente = c.id_cliente");
		$this->db->join("estado e","p.id_estado = e.id_estado");
		$this->db->where("p.ind_pedido","1");
		$this->db->where("p.id_cliente !=","1");
		$resultados = $this->db->get();
		return $resultados->result();
	}

	// Query para obtener Detalle de Pedidos
	public function getDetalle($id){
		$this->db->select("d.*,p.abre_producto as codigo,p.nombre_producto as producto,p.stock_producto as st");
		$this->db->from("detallepedido d");
		$this->db->join("producto p","d.id_producto = p.id_producto");
		$this->db->where("d.id_pedido",$id);
		$resultados = $this->db->get();
		return $resultados->result();
	}

}