<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Producciones extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if (!$this->session->userdata("login")) {   
            redirect(base_url());   
        }else if ($this->session->userdata("id_rol") == 3){
			redirect(base_url());
		}
        $this->load->model("Producciones_model");
        $this->load->model("Pedidos_model");
        $this->load->model("Materiales_model");
        $this->load->model("Procesos_model");
        $this->load->model("Productos_model");
    }

    // Mostrar Vista Producción
    public function index(){ 
        $data  = array(
            'producciones' => $this->Producciones_model->getProducciones(), 
        );     
        $this->load->view("layouts/header");
        $this->load->view("layouts/aside");
        $this->load->view("admin/producciones/list",$data);
        $this->load->view("layouts/footer");
    }

    // Mostrar Vista Programación
    public function programar(){
        $id_produccion =  $this->uri->segment(4);
        $id_pedido =  $this->uri->segment(5);
        $data =array(
                "produccion" => $this->Producciones_model->getProduccion($id_produccion),
                "pedido" => $this->Producciones_model->getFechasPedido($id_produccion,$id_pedido),
                "materiales" => $this->Producciones_model->getMateriales($id_produccion),
                "procesos" => $this->Procesos_model->getProcesos(),
                "maquinas" => $this->Producciones_model->getMaquinas($id_produccion)
        );
        $this->load->view("layouts/header");
        $this->load->view("layouts/aside");
        $this->load->view("admin/producciones/programar",$data);
        $this->load->view("layouts/footer");
    }

    // Enrutador Vista View
	public function view(){
		$id_produccion= $this->input->post("id");
		$data = array(
            "produccion" => $this->Producciones_model->getProduccion($id_produccion),
            "materiales" => $this->Producciones_model->getMateriales($id_produccion),
            "trabajos" => $this->Producciones_model->getTrabajo($id_produccion),
            "indirectos" => $this->Producciones_model->getIndirecto($id_produccion),
		);
		$this->load->view("admin/producciones/view",$data);
	}

    // Mostrar Vista Progreso
    public function progreso($id_produccion){ 
        $data  = array(
            'proceso_producciones' => $this->Producciones_model->getProgresos($id_produccion), 
            'produccion' => $this->Producciones_model->id($id_produccion)
        );     
        $this->load->view("layouts/header");
        $this->load->view("layouts/aside");
        $this->load->view("admin/producciones/progreso",$data);
        $this->load->view("layouts/footer");
    }

    // Mostrar Vista Seguimiento
    public function seguimiento($id){
      $data =array(
        "produccion" => $this->Producciones_model->getProduccion($id),
        "procesos"   => $this->Producciones_model->getProcesos($id)
      );
      $this->load->view("layouts/header");
      $this->load->view("layouts/aside");
      $this->load->view("admin/producciones/seguimiento",$data);
      $this->load->view("layouts/footer");
    }

    // Mostrar Vista Timeline
    public function timeline($id){
        $data =array(
            "timelines" => $this->Producciones_model->getTimeline($id),
            'produccion' => $this->Producciones_model->id($id)
        );
        $this->load->view("layouts/header");
        $this->load->view("layouts/aside");
        $this->load->view("admin/producciones/timeline",$data);
        $this->load->view("layouts/footer");
    }

    // Mostrar Vista Timeline
    public function edit_timeline($id){
        $data =array(
            "timelines" => $this->Producciones_model->getTimeline($id),
            'produccion' => $this->Producciones_model->id($id)
        );
        $this->load->view("layouts/header");
        $this->load->view("layouts/aside");
        $this->load->view("admin/producciones/timeline",$data);
        $this->load->view("layouts/footer");
    }

    // Mostrar Reporte Productividad
    public function productividad(){
        $this->load->view("layouts/header");
        $this->load->view("layouts/aside");
        $this->load->view("admin/reportes/productividad");
        $this->load->view("layouts/footer");
    }
    
    // Mostrar Reporte Reproceso
    public function reproceso(){
      $this->load->view("layouts/header");
      $this->load->view("layouts/aside");
      $this->load->view("admin/reportes/reproceso");
      $this->load->view("layouts/footer");
    } 

    //Preparar Guardado Producción 
    public function store(){
        // Campos Producción 
        $id_produccion = $this->input->post("id_produccion");
        $inicio_produccion = $this->input->post("inicio_produccion");
        $fin_produccion = $this->input->post("fin_produccion");
        $cantidad_produccion = $this->input->post("cantidad_produccion");
        // Campos Materiales 
        $id_material = $this->input->post("id_material");
        $stock_material = $this->input->post("stock_material");
        $cantidad_necesaria = $this->input->post("cantidad_necesaria");
        // Campos de Proceso
        $id_proceso = $this->input->post("id_proceso");
        // Campos Trabajo 
        $fecha_trabajo = $this->input->post("fecha_trabajo");
        $nempleados_trabajo = $this->input->post("nempleados_trabajo");
        $horas_trabajo = $this->input->post("nhoras_trabajo");
        $tasa_trabajo = $this->input->post("vtasa_trabajo");
        $monto_trabajo = $this->input->post("monto_trabajo");
        // Campos Gastos Indirectos
        $descripcion_gasto = $this->input->post("descripcion_gasto");
        $valor_gasto = $this->input->post("valor_gasto");
        // Montos 
        $total_material_m = $this->input->post("total_material_m");
        $total_labor_m = $this->input->post("total_labor_m");
        $total_indirecto_m = $this->input->post("total_indirecto_m");
        $total_produccion_m = $this->input->post("total_produccion_m");
        // Validaciones
        if($total_material_m == "" || $total_labor_m == "" || $total_indirecto_m == "" || $total_produccion_m == ""){
            $this->session->set_flashdata("Llenar","Llenar");
            redirect(base_url()."movimiento/producciones");  
        }else{     
            for ($i=0; $i < count($id_material); $i++) {
                if($stock_material[$i] < $cantidad_necesaria[$i]){
                    var_dump("No hay stock suficiente");
                    $this->session->set_flashdata("Stock","Stock");
                    redirect(base_url()."movimiento/producciones");
                }
            }
            if($id_proceso == 0 || $fecha_trabajo == null || $descripcion_gasto == null ){
                $this->session->set_flashdata("Llenar","Llenar");
                redirect(base_url()."movimiento/producciones");
            }else{
                // Producción
                $data = array(
                    'id_produccion' =>      $id_produccion,
                    'inicio_produccion' =>  $inicio_produccion,
                    'fin_produccion' =>     $fin_produccion,
                    'monto_material_produccion' =>   $total_material_m,
                    'monto_trabajo_produccion' =>      $total_labor_m,
                    'monto_indirecto_produccion' =>  $total_indirecto_m,
                    'total_produccion' => $total_produccion_m,
                    'id_estado' =>  "2"  //EN PRODUCCION
                );
                // Metodo del Detalle de la Producción
                if ($this->Producciones_model->update($id_produccion,$data)) {
                    // Guardar Proceso
                    $this->save_proceso($id_proceso,$id_produccion,$cantidad_produccion);
                    // Guardar Trabajo
                    $this->save_trabajo($id_produccion,$fecha_trabajo,$nempleados_trabajo,$horas_trabajo,$tasa_trabajo,$monto_trabajo);
                    // Actualizar Stock Materiales 
                    $this->update_materiales($id_material,$cantidad_necesaria);
                    // Guardar Gastos Indirectos
                    $this->save_indirecto($id_produccion,$descripcion_gasto,$valor_gasto);
                    // Mostrar Página Producción 
                    $this->session->set_flashdata("Guardar","Guardar");
                    redirect(base_url()."movimiento/producciones");
                }else{
                    // Mostrar Página Programar 
                    $this->session->set_flashdata("Cancelar","Cancelar");
                    redirect(base_url()."movimiento/producciones/programar/".$id_produccion);
                }
            } 
        }
    }
   
    // Preparar Guardar Proceso
    protected function save_proceso($id_proceso,$id_produccion,$cantidad_produccion){
        for ($i=0; $i < count($id_proceso); $i++) { 
          $data  = array(
            'id_proceso' => $id_proceso[$i], 
            'id_produccion' => $id_produccion,
            'total_proceso_produccion' => $cantidad_produccion,
            'realizado_proceso_produccion' => 0,
            'ind_proceso_produccion' => "1"
          );
          $this->Producciones_model->save_proceso($data);
        }
    }

    // Guardar Trabajo de la Producción
    protected function save_trabajo($id_produccion,$fecha_trabajo,$nempleados_trabajo,$horas_trabajo,$tasa_trabajo,$monto_trabajo){
        for ($i=0; $i < count($fecha_trabajo); $i++) { 
            $data  = array(
              'id_produccion' => $id_produccion, 
              'fecha_trabajo' => $fecha_trabajo[$i],
              'nempleados_trabajo' => $nempleados_trabajo[$i],
              'horas_trabajo' => $horas_trabajo[$i],
              'tasa_trabajo' => $tasa_trabajo[$i],
              'monto_trabajo' => $monto_trabajo[$i],
              'estado_trabajo' => "1",
            );
            $this->Producciones_model->save_trabajo($data);
        }
    }

    // Actualizar Stock Materiales
    public function update_materiales($id_material,$cantidad_necesaria){
        for ($i=0; $i < count($id_material); $i++) { 
        $busquedamaterial = $this->Materiales_model->getMaterial($id_material[$i]);
        $data = array(
          'stock_material' => $busquedamaterial->stock_material - $cantidad_necesaria[$i], 
        );
        $this->Materiales_model->update($id_material[$i],$data);
        }
    }

    // Guardar Trabajo de la Producción
    protected function save_indirecto($id_produccion,$descripcion_gasto,$valor_gasto){
        for ($i=0; $i < count($descripcion_gasto); $i++) { 
            $data  = array(
              'id_produccion' => $id_produccion, 
              'descripcion_gasto' => $descripcion_gasto[$i],
              'valor_gasto' => $valor_gasto[$i],
              'estado_gasto' => "1",
            );
            $this->Producciones_model->save_indirecto($data);
        }
    }

    // Preparar Guardado Seguimiento
    public function storeseguimiento(){
        // Campos Seguimiento
        $id_produccion = $this->input->post("id_produccion");
        $id_proceso = $this->input->post("id_proceso");
        $id_proceso_produccion = $this->input->post("id_proceso_produccion");
        $fecha_timeline = $this->input->post("fecha_timeline");
        $cantidad_timeline = $this->input->post("cantidad_timeline");
        $reprocesado_timeline = $this->input->post("reprocesado_timeline");
        $incidencia_timeline = $this->input->post("incidencia_timeline");
        // Validaciones
        $this->form_validation->set_rules('id_proceso_produccion','proceso','required');
        $this->form_validation->set_rules('cantidad_timeline','unidades trabajadas','trim|required|min_length[1]|max_length[10]');
        $this->form_validation->set_rules('reprocesado_timeline','unidades reprocesadas','trim|min_length[1]|max_length[10]');
        $this->form_validation->set_rules('incidencia_timeline','comentario','trim|min_length[1]|max_length[250]');
        if ($this->form_validation->run()) {
            // Arreglo Seguimiento de Producción
            $data = array(
              'id_proceso_produccion'   =>     $id_proceso_produccion,
              'fecha_timeline'          =>     $fecha_timeline,
              'cantidad_timeline'       =>     $cantidad_timeline,
              'incidencia_timeline'     =>     $incidencia_timeline,
              'reprocesado_timeline'    =>     $reprocesado_timeline,
              'ind_timeline'            =>     "1"
            );  
        
            // Identificar el proceso
            if($id_proceso == 1){
                $produccion_actual = $this->Producciones_model->getProduccion($id_produccion);
                $cantidad_elaborada = $produccion_actual->producido_produccion + $cantidad_timeline;
                $total_produccion =(int)$produccion_actual->cantidad_produccion;
                if ($cantidad_elaborada > $total_produccion){
                    $this->session->set_flashdata("Excedido","Excedido"); 
                    redirect(base_url()."movimiento/producciones/seguimiento/".$id_produccion); 
                  
                }else if($cantidad_elaborada == $total_produccion){
                    $this->update_finalizados($id_produccion,$fecha_timeline,$cantidad_timeline); // Actualiza los terminados
                    $this->terminado($id_produccion); // Cambia el Estado a terminado
                    $this->update_progreso($id_proceso_produccion,$cantidad_timeline); // Actualiza el progreso
                    $this->session->set_flashdata("Guardar","Guardar");
                    redirect(base_url()."movimiento/producciones");
                }
                else{ 
                    if($this->Producciones_model->guardar_seguimiento($data)) {
                        $this->update_finalizados($id_produccion,$fecha_timeline,$cantidad_timeline);
                        $this->update_progreso($id_proceso_produccion,$cantidad_timeline);
                        $this->update_reprocesados($id_produccion,$reprocesado_timeline);
                        $this->session->set_flashdata("Guardar","Guardar");
                        redirect(base_url()."movimiento/producciones");
                    }else {
                      $this->session->set_flashdata("Cancelar","Cancelar");
                      redirect(base_url()."movimiento/producciones/seguimiento/".$id_produccion);    
                    }  
                }    
            }else{ 
                $proceso_actual = $this->Producciones_model->getProceso_Produccion($id_proceso_produccion);
                $cantidad_producida = $proceso_actual->realizado_proceso_produccion + $cantidad_timeline;
                $total =(int)$proceso_actual->total_proceso_produccion;
                if ($cantidad_producida > $total){
                  $this->session->set_flashdata("Excedido","Excedido"); 
                  redirect(base_url()."movimiento/producciones/seguimiento/".$id_produccion); 
                }else{ 
                    if($this->Producciones_model->guardar_seguimiento($data)) {
                        $this->update_progreso($id_proceso_produccion,$cantidad_timeline);
                        $this->update_reprocesados($id_produccion,$reprocesado_timeline);
                        $this->session->set_flashdata("Guardar","Guardar");
                        redirect(base_url()."movimiento/producciones");
                    }else {
                      $this->session->set_flashdata("Cancelar","Cancelar");
                      redirect(base_url()."movimiento/producciones/seguimiento/".$id_produccion);    
                    }  
                }
            }
        }
        else{
            $this->seguimiento($id_produccion);
        }      
    }

    // Actualizar Produccion
    protected function update_finalizados($id_produccion, $fecha_timeline, $producido_produccion){
        $produccion_actual = $this->Producciones_model->getProduccion_Finalizada($id_produccion);
        $cantidad_producida = $produccion_actual->producido_produccion + $producido_produccion;
        $cantidad_real = $produccion_actual->real_producción + $producido_produccion;
        if($fecha_timeline > $produccion_actual->fin_produccion){
            $data = array(
                'producido_produccion' => $cantidad_producida,
            );
            $this->Producciones_model->update($id_produccion,$data);
        }else{
            $data = array(
                'producido_produccion' => $cantidad_producida,
                'real_producción' => $cantidad_real,
            );
            $this->Producciones_model->update($id_produccion,$data);
        }
    }

    protected function update_reprocesados($id_produccion,$reprocesado_timeline){
        $produccion_actual = $this->Producciones_model->getProduccion_Finalizada($id_produccion);
        $cantidad_reprocesada = $produccion_actual->total_reprocesado_produccion + $reprocesado_timeline;
        $data = array(
            'total_reprocesado_produccion' => $cantidad_reprocesada,
        );
        $this->Producciones_model->update($id_produccion,$data);
    }

    // Actualizar Estado de Producción
    protected function terminado($id){
        $data = array(
            'id_estado' => "4"
        );
        $this->Producciones_model->update($id,$data);
    }

    // Actualizar Proceso
    protected function update_progreso($id_proceso_produccion,$realizado_proceso_produccion){
        $proceso_actual = $this->Producciones_model->getProceso_Produccion($id_proceso_produccion);
        $cantidad_producida = $proceso_actual->realizado_proceso_produccion + $realizado_proceso_produccion;
        $data = array(
          'realizado_proceso_produccion' => $cantidad_producida
        );
        $this->Producciones_model->update_progreso($id_proceso_produccion,$data);
    }

    // Busqueda Ajax ProcesoProduccion 
    public function obtenerProcesoProduccion(){
      $id_proceso_produccion = $this->input->post("id_proceso_produccion");
      $proceso = $this->Producciones_model->getPP($id_proceso_produccion);
      echo json_encode($proceso);
    } 

    // Gráfico Productividad
    public function get_data_productividad(){
        $fecha_inicio = $this->input->post("fecha_inicio");
        $fecha_fin = $this->input->post("fecha_fin");
        $resultados = $this->Producciones_model->grafico_productividad($fecha_inicio,$fecha_fin);
        echo json_encode($resultados);
    }

    // Gráfico Reproceso
    public function get_data_reproceso(){
        $fecha_inicio = $this->input->post("fecha_inicio");
        $fecha_fin = $this->input->post("fecha_fin");
        $resultados = $this->Producciones_model->grafico_reproceso($fecha_inicio,$fecha_fin);
        echo json_encode($resultados);
    }










    
   
    

    //Mostrar Vista Editar Producción
    public function editar($id){
      $data =array(
              "produccion" => $this->Producciones_model->getProduccion($id),
              "materiales" => $this->Producciones_model->getMateriales($id),
              "procesos"   => $this->Producciones_model->getProcesos($id),
              "maquinas"   => $this->Producciones_model->getMaquinas($id),
              "trabajos"   => $this->Producciones_model->getTrabajos($id),

      );
      $this->load->view("layouts/header");
      $this->load->view("layouts/aside");
      $this->load->view("admin/producciones/editar",$data);
      $this->load->view("layouts/footer");
    }
    
    

    
    
    

   

    

    

    
   
  

  
}