<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedidos extends CI_Controller {

	// Constructor del controlador Pedidos
	public function __construct(){
        parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Pedidos_model");
		$this->load->model("Productos_model");
		$this->load->model("Clientes_model");
		$this->load->library('form_validation');
    }
	
	// Enrutador Principal
    public function index(){
		$data  = array(
			'pedidos' => $this->Pedidos_model->getPedidos(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/pedidos/list",$data);
		$this->load->view("layouts/footer");
	}

	// Enrutador Imprimir Vista
	public function view(){
		$valor = $this->input->post("valor");
		$data  = array(
			'pedido' => $this->Pedidos_model->getPedido($valor), 
			'detalles' => $this->Pedidos_model->getDetalle($valor)
		);
		$this->load->view("admin/pedidos/view",$data);
	}

	// Enrutador Guardar Pedido  
    public function add(){
		$data = array(
			"productos" => $this->Productos_model->getProductos(),
			"clientes" => $this->Clientes_model->getClientes(),
			"estados" => $this->Pedidos_model->getEstados(),
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/pedidos/add",$data);
		$this->load->view("layouts/footer");
	}

	// Enrutador Editar Pedido
	public function edit($id){
		$data = array(
			"pedido" => $this->Pedidos_model->getPedido($id),
			"productos" => $this->Productos_model->getProductos(),
			"detalles" => $this->Pedidos_model->getDetalle($id),
			"estados" => $this->Pedidos_model->getEstados()
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/pedidos/edit",$data);
		$this->load->view("layouts/footer");
	}
	
	// Cargar Modulo Reporte Entrega
	public function entrega(){
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/reportes/entrega");
		$this->load->view("layouts/footer");
	}
			
	// Guardar Pedido
	public function store(){
		// Pedido
        $id_pedido = $this->input->post("id_pedido");
		$abre_pedido = $this->input->post("abre_pedido");
		$fecha_pedido = $this->input->post("fecha_pedido");
		$entrega_pedido = $this->input->post("entrega_pedido");
		$id_estado = $this->input->post("id_estado");
		$monto_pedido = $this->input->post("monto_pedido");
		// Cliente
		$id_cliente = $this->input->post("id_cliente");
		$ndocumento_cliente = $this->input->post("ndocumento_cliente");
		$nombre_cliente = $this->input->post("nombre_cliente");
		$telefono_cliente = $this->input->post("telefono_cliente");
		$correo_cliente = $this->input->post("correo_cliente");	
		// Detalle 
		$id_producto = $this->input->post("id_producto");
		$cantidad_detallepedido = $this->input->post("cantidad_detallepedido");
		$restante_detallepedido = $this->input->post("restante_detallepedido");
		$precio_detallepedido = $this->input->post("precio_detallepedido");
		$importe_detallepedido	 = $this->input->post("importe_detallepedido");
		// Validaciones Pedido
		$this->form_validation->set_rules('id_estado','estado','required');
		// Validaciones Cliente
		$this->form_validation->set_rules('nombre_cliente','nombre','trim|required|min_length[2]|max_length[200]');
		$this->form_validation->set_rules('ndocumento_cliente','Ruc/Dni','trim|required|min_length[8]|max_length[11]');
		$this->form_validation->set_rules('telefono_cliente','telefono','trim|required|min_length[7]|max_length[9]');
		$this->form_validation->set_rules('correo_cliente','correo','trim|required|valid_email|min_length[3]|max_length[250]');
		// $data_cliente = $this->Clientes_model->getCliente($id_cliente);
		if($id_producto == 0){
			$this->session->set_flashdata("Llenar","Llenar");
			redirect(base_url()."movimiento/pedidos/add");
		}else{
			if ($this->form_validation->run()) {
				if ($id_cliente == "") {	// Metodo sin Cliente Existente
					// Cliente
					$data_cliente_nuevo  = array(
						'ndocumento_cliente' => $ndocumento_cliente,
						'nombre_cliente' => $nombre_cliente,
						'telefono_cliente' => $telefono_cliente,
						'correo_cliente' => $correo_cliente,
						'estado_cliente' => "1"
					);
					// Pedido
					$data_pedido = array(
						'id_pedido' => $id_pedido,
						'abre_pedido' => $abre_pedido,
						'fecha_pedido' => $fecha_pedido,
						'entrega_pedido' => $entrega_pedido,
						'monto_pedido' => $monto_pedido,
						'id_cliente' => $this->Clientes_model->GenerarID(),
						'id_estado' => $id_estado,
						'ind_pedido' => "1"
					);
					$this->Clientes_model->save($data_cliente_nuevo);
					// Guardado
					if ($this->Pedidos_model->save($data_pedido)) {
						$this->session->set_flashdata("Guardar","Guardar");
						redirect(base_url()."movimiento/pedidos");
					}else {
						$this->session->set_flashdata("Cancelar","Cancelar");
						redirect(base_url()."movimiento/pedidos/add");
					}
				}else {		// Metodo con Cliente Existente
					$data = array(
						'id_pedido' => $id_pedido,
						'abre_pedido' => $abre_pedido,
						'fecha_pedido' => $fecha_pedido,
						'entrega_pedido' => $entrega_pedido,
						'monto_pedido' => $monto_pedido,
						'id_cliente' => $id_cliente,
						'id_estado' => $id_estado,
						'ind_pedido' => "1"
					);
					if ($this->Pedidos_model->save($data)) {
						$this->save_detalle($id_pedido,$id_producto,$cantidad_detallepedido,$restante_detallepedido,$precio_detallepedido,$importe_detallepedido);
						$this->session->set_flashdata("Guardar","Guardar");
						redirect(base_url()."movimiento/pedidos");
					}else {
						$this->session->set_flashdata("Cancelar","Cancelar");
						redirect(base_url()."movimiento/pedidos/add");
					}
				}
			}else{
				$this->add();
			}
		}
	}

	// Guardar Detalle Pedido
	protected function save_detalle($id_pedido,$id_producto,$cantidad_detallepedido,$restante_detallepedido,$precio_detallepedido,$importe_detallepedido){
		$numero_produccion=$this->Pedidos_model->GenerarIDProduccion();
		for ($i=0; $i < count($id_producto); $i++) { 			
			// Arreglo del Detalle 
			$data  = array(
				'id_pedido' => $id_pedido,
				'id_producto' => $id_producto[$i], 				
				'cantidad_detallepedido' => $cantidad_detallepedido[$i],
				'restante_detallepedido' => $restante_detallepedido[$i],
				'precio_detallepedido'   => $precio_detallepedido[$i],
				'importe_detallepedido'  => $importe_detallepedido[$i],
                'estado_detallepedido' => "1",
			);
			if ( $restante_detallepedido[$i] > 0) {
				// Arreglo de la Producción
				$data_produccion = array(
					'id_pedido'         => $id_pedido,
					'id_producto'       => $id_producto[$i], 
					'abre_produccion'   => $numero_produccion,
					'inicio_produccion' => "",
					'fin_produccion'    => "",				
					'cantidad_produccion'  => $restante_detallepedido[$i],
					'producido_produccion' => 0,
					'real_producción' => 0,
					'total_reprocesado_produccion' => 0,
					'id_estado'   		   => "3", //SIN PROGRAMAR
					'ind_produccion' => "1",
				);		
			}
			$this->Pedidos_model->save_detalle($data);
			if (isset($data_produccion)){
				$this->Pedidos_model->save_produccion($data_produccion);
			}			
			$this->update_stock_producto($id_producto[$i],$cantidad_detallepedido[$i]);
			$this->session->set_flashdata("Guardar","Guardado");
		}
	}

	//Modificar el Stock del Producto
	protected function update_stock_producto($id_producto,$cantidad_detallepedido){
		$productoActual = $this->Productos_model->getProducto($id_producto);
		$nuevo_stock = $productoActual->stock_producto - $cantidad_detallepedido;
		// Comparativa
		if($nuevo_stock < 0) {
			$valor = 0;
		}else {
			$valor = $nuevo_stock;
		}
		// Arreglo
		$data = array(
			'stock_producto' => $valor
		);
		$this->Productos_model->update($id_producto,$data);
	}

	// Autocompletar Input Cliente
	public function autocompletarCliente(){
		$valor = $this->input->post("valor");
		$clientes = $this->Pedidos_model->getClienteAutocomplete($valor);
		echo json_encode($clientes);
	}

	// Eliminar Pedido
	public function delete($id){
		$data  = array(
			'ind_pedido' => "0", 
		);
		$this->Pedidos_model->update($id,$data);
		echo "movimiento/pedidos";
	}
	
}