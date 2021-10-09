<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empleados_model extends CI_Model {

	// Metodo Guardar Empleado
	public function save($data){
		return $this->db->insert("empleado",$data);
	}

	// Metodo Modificar Empleado
	public function update($id,$data){
		$this->db->where("id_empleado",$id);
		return $this->db->update("empleado",$data);
	}

	// Query para obtener Empleados
	public function getEmpleados(){
		$this->db->select("e.*,a.nombre_area as area,c.nombre_cargo as cargo");
		$this->db->from("empleado e");
		$this->db->join("area a","e.id_area = a.id_area");
		$this->db->join("cargo c","e.id_cargo= c.id_cargo");
		$this->db->where("e.estado_empleado","1");
		$resultados = $this->db->get();
		return $resultados->result();
	}

	// Query para obtener un Empleado
	public function getEmpleado($id){
		$this->db->where("id_empleado",$id);
		$resultado = $this->db->get("empleado");
		return $resultado->row();
	}

	// Query para obtener Areas
	public function getAreas(){
		$this->db->where("estado_area","1");
		$resultados = $this->db->get("area");
		return $resultados->result();
	}

	// Query para obtener Cargos
	public function getCargos(){
		$this->db->where("estado_cargo","1");
		$resultados = $this->db->get("cargo");
		return $resultados->result();
	}

}