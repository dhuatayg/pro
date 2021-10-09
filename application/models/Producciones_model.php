<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Producciones_model extends CI_Model {

	// Generar Código de Producción
	public function GenerarIDProduccion(){
		$query=$this->db->get("produccion");
		$numero_final=$query->num_rows()+1;
		if ($numero_final <= 9) {  
			$id = "OP-000".$numero_final;
		} else if ($numero_final > 9 && $numero_final <=99){   		
			$id = "OP-00".$numero_final; 
		}else if ($numero_final > 99 && $numero_final <=999){  		
			$id = "OP-0".$numero_final; 
		}else{	
			$id = "OP-".$numero_final; 
		}	
		return $id;
	}

	// Guardar Procesos de Producción 
	public function save_proceso($data){
		$this->db->insert("proceso_produccion",$data);
	}

	//Query Guardar Trabajo
	public function save_trabajo($data){
		$this->db->insert("trabajo",$data);
	}

	//Query Guardar Gastos Indirectos
	public function save_indirecto($data){
		$this->db->insert("indirecto_produccion",$data);
	}

	// Guardar Seguimiento de Producción
	public function guardar_seguimiento($data){
		return $this->db->insert("timeline",$data);
	}

	// Editar Producción
	public function update($id,$data){
		$this->db->where("id_produccion",$id);
		return $this->db->update("produccion",$data);
	}

	// Editar Proceso Producción
	public function update_progreso($id,$data){
		$this->db->where("id_proceso_produccion",$id);
		return $this->db->update("proceso_produccion",$data);
	}

	// Query Obtener Numero de Orden de Producción
	public function id($id){
		$this->db->select("id_produccion as id");
		$this->db->from("produccion");
		$this->db->where("id_produccion",$id);
		$resultados = $this->db->get();
		return $resultados->row();
	}

	// Query Obtener Procesos 
	public function getProcesos($id){	
		$this->db->select("pp.id_proceso_produccion as id, p.nombre_proceso as np");
		$this->db->from("proceso_produccion pp");
		$this->db->join("proceso p","pp.id_proceso = p.id_proceso");
		$this->db->where("pp.id_produccion",$id);
		$resultados = $this->db->get();
		return $resultados->result();
	}

	// Query Obtener Progreso
	public function getProgresos($id){
		$this->db->select("pr.abre_produccion as id, p.nombre_proceso as n,total_proceso_produccion as t,realizado_proceso_produccion as r,((realizado_proceso_produccion)/(total_proceso_produccion))*100 as p");
		$this->db->from("proceso_produccion pp");
		$this->db->join("proceso p","pp.id_proceso = p.id_proceso");
		$this->db->join("produccion pr","pp.id_produccion = pr.id_produccion");
		$this->db->where("pp.id_produccion",$id);
		$resultados = $this->db->get();
		return $resultados->result();
	}

	// Query Obtener Proceso_Produccion
	public function getProceso_Produccion($id){
		$this->db->select("*");
		$this->db->from("proceso_produccion");
		$this->db->where("id_proceso_produccion",$id);
		$resultados = $this->db->get();
		return $resultados->row();
	}

	// Query Obtener Produccion
	public function getProduccion_Finalizada($id){
		$this->db->select("*");
		$this->db->from("produccion");
		$this->db->where("id_produccion",$id);
		$resultados = $this->db->get();
		return $resultados->row();
	}
	
	// Query para obtener un Area
	public function getProd($id){
		$this->db->where("id_produccion",$id);
		$resultado = $this->db->get("produccion");
		return $resultado->row();
	}

	

	// Query para obtener un Producto Select
	public function getPP($id){
		$this->db->where("id_proceso_produccion",$id);
		$resultado = $this->db->get("proceso_produccion");
		return $resultado->result_array();
	}

	// Query Mostrar Timeline
	public function getTimeline($id){
		$this->db->select("pc.id_proceso as ip, ti.fecha_timeline as fe, ti.id_timeline as id, ti.cantidad_timeline as ca, ti.reprocesado_timeline as re, ti.incidencia_timeline as in, pc.nombre_proceso as no, ar.nombre_area as ar");
		$this->db->from("proceso_produccion pp");
		$this->db->join("timeline ti","pp.id_proceso_produccion = ti.id_proceso_produccion");  
		$this->db->join("produccion pr","pp.id_produccion = pr.id_produccion");
		$this->db->join("proceso pc","pp.id_proceso = pc.id_proceso");  
		$this->db->join("area ar","pc.id_area = ar.id_area"); 
		$this->db->order_by("ti.fecha_timeline", "desc");   
		$this->db->where("pp.id_produccion",$id);
		$resultados = $this->db->get();
		return $resultados->result();
	}

	// Query Grafico Nivel de Productividad
	public function grafico_productividad($fecha_inicio,$fecha_fin){	
		$this->db->select("abre_produccion as fe, SUM(cantidad_produccion) as pl, SUM(real_producción) as pr");
		$this->db->from("produccion");
		$this->db->where("inicio_produccion >= ",$fecha_inicio);
		$this->db->where("inicio_produccion <= ",$fecha_fin);
		$this->db->where("ind_produccion", 1);
		$this->db->group_by("abre_produccion");
		$resultados = $this->db->get();
		return $resultados->result();
	}

	// Query Gráfico Reproceso
	public function grafico_reproceso($fecha_inicio,$fecha_fin){	
		$this->db->select("abre_produccion as fe, SUM(real_producción) as pr, SUM(total_reprocesado_produccion) as re");
		$this->db->from("produccion");
		$this->db->where("inicio_produccion >= ",$fecha_inicio);
		$this->db->where("inicio_produccion <= ",$fecha_fin);
		$this->db->where("ind_produccion", 1);
		$this->db->group_by("abre_produccion");
		$resultados = $this->db->get();
		return $resultados->result();
	}

	//Query Obtener Fecha de Entrega Pedido -----
	public function getFechasPedido($id,$id1){
		$this->db->select("ped.fecha_pedido as inicio, ped.entrega_pedido as fin");
		$this->db->from("pedido ped");
		$this->db->join("produccion pro","ped.id_pedido = pro.id_pedido");
		$this->db->where("pro.id_produccion",$id);
		$this->db->where("ped.id_pedido",$id1);
		$this->db->where("pro.ind_produccion","1");
		$resultado = $this->db->get();
		return $resultado->row();
	}

	// Query para obtener estados
	public function getProducciones(){
		$this->db->select("p.*,pr.nombre_producto as np,pe.abre_pedido as ap,e.nombre_estado as ne, (p.producido_produccion/p.cantidad_produccion)*100 as progreso");
		$this->db->from("produccion p");
        $this->db->join("producto pr","p.id_producto = pr.id_producto");     
		$this->db->join("pedido pe","p.id_pedido = pe.id_pedido");
		$this->db->join("estado e","p.id_estado = e.id_estado");
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function getProducciones_Progreso(){
		$this->db->select("p.*, pr.nombre_producto as np, pe.abre_pedido as ap, e.nombre_estado as ne, (SUM(realizado_proceso_produccion)/SUM(total_proceso_produccion))*100 as progreso");
		$this->db->from("produccion p");
		$this->db->join("proceso_produccion pp","p.id_produccion = pp.id_produccion"); 
		$this->db->join("producto pr","p.id_producto = pr.id_producto");     
		$this->db->join("pedido pe","p.id_pedido = pe.id_pedido");
		$this->db->join("estado e","p.id_estado = e.id_estado");
		$this->db->group_by("p.id_produccion");
		$resultados = $this->db->get();
		return $resultados->result();
	}

	//Query Obtener Materiales -----
	public function getMateriales($id){
		$this->db->select("m.id_material as id,m.abre_material as am,m.nombre_material as nm,m.unidad_material as um,m.stock_material as sm, (ma.cantidad_maproducto*p.cantidad_produccion) as cm, ma.monto_maproducto as prma");
		$this->db->from("produccion p");
        $this->db->join("producto b","p.id_producto = b.id_producto");     
		$this->db->join("maproducto ma","b.id_producto = ma.id_producto");
		$this->db->join("material m","ma.id_material = m.id_material");
		$this->db->where("p.id_produccion",$id);
		$this->db->where("p.ind_produccion","1");
		$resultados = $this->db->get();
		return $resultados->result();
	}

	//Query Obtener Maquinas -----
	public function getMaquinas($id){
		$this->db->select("q.id_maquina as num,q.abre_maquina as cod,q.nombre_maquina as nom,
		q.descripcion_maquina as des,a.nombre_area as are");
		$this->db->from("produccion p");
        $this->db->join("producto b","p.id_producto = b.id_producto");     
		$this->db->join("mqproducto mq","b.id_producto = mq.id_producto");
		$this->db->join("maquina q","mq.id_maquina = q.id_maquina");
		$this->db->join("area a","q.id_area = a.id_area");
		$this->db->where("p.id_produccion",$id);
		$this->db->where("p.ind_produccion","1");
		$resultados = $this->db->get();
		return $resultados->result();	
	}

	//Query Obtener Produccion -----
	public function getProduccion($id){
		$this->db->select("p.*,e.nombre_estado as es,b.nombre_producto as np,c.abre_pedido as ap");
		$this->db->from("produccion p");
        $this->db->join("estado e","p.id_estado = e.id_estado");
        $this->db->join("producto b","p.id_producto = b.id_producto");     
        $this->db->join("pedido c","p.id_pedido = c.id_pedido");
		$this->db->where("p.id_produccion",$id);
		$resultado = $this->db->get();
		return $resultado->row();
	}

	//Query Obtener Trabajos
	public function getTrabajo($id){
		$this->db->select("*");
		$this->db->from("trabajo t");
		$this->db->where("t.id_produccion",$id);
		$this->db->where("t.estado_trabajo","1");
		$resultados = $this->db->get();
		return $resultados->result();	
	}

	//Query Obtener Gastos Indirectos
	public function getIndirecto($id){
		$this->db->select("*");
		$this->db->from("indirecto_produccion i");
		$this->db->where("i.id_produccion",$id);
		$this->db->where("i.estado_gasto","1");
		$resultados = $this->db->get();
		return $resultados->result();	
	}




















	public function nolepuedesganaraunuchiha($id,$data){
		$this->db->where("id_produccion",$id);
		return $this->db->update("produccion",$data);
	}


	

	//Query Obtener Trabajos -----
	public function getTrabajos($id){
		$this->db->select("t.id_trabajo as num, t.fecha_trabajo as fec, t.nempleados_trabajo as emp");
		$this->db->from("trabajo t");
		$this->db->where("t.id_produccion",$id);
		$this->db->where("t.estado_trabajo","1");
		$resultados = $this->db->get();
		return $resultados->result();	
	}




}