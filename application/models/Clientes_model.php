<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes_model extends CI_Model {

	// Metodo Guardar Cliente
	public function save($data){
		return $this->db->insert("cliente",$data);
	}
	
	// Metodo Modificar Cliente
	public function update($id,$data){
		$this->db->where("id_cliente",$id);
		return $this->db->update("cliente",$data);
	}

	// Query para obtener Clientes
	public function getClientes(){
		$this->db->where("estado_cliente","1");
		$this->db->where("ndocumento_cliente!=20600886534");
		$resultados = $this->db->get("cliente");
		return $resultados->result();
	}

	// Query para obtener un Cliente
	public function getCliente($id){
		$this->db->where("id_cliente",$id);
		$this->db->where("ndocumento_cliente!=20600886534");
		$resultado = $this->db->get("cliente");
		return $resultado->row();
	}

	// Obtener ID de Cliente
	public function GenerarID(){
		$query=$this->db->get("cliente");
		$numero_final=$query->num_rows()+1;	
		return $numero_final;
	}

}
