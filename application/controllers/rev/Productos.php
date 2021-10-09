<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Controller {

	public function __construct(){
        parent::__construct();
		if (!$this->session->userdata("login")) {   
            redirect(base_url());   
		}else if ($this->session->userdata("id_rol") == 3){
			redirect(base_url());
		}
		$this->load->model("Productos_model");
		$this->load->model("Categorias_model");
		$this->load->model("Materiales_model");
		$this->load->model("Maquinas_model");
		$this->load->library('form_validation');
    }
	
	// Enrutador Vista List
    public function index(){
		$data  = array(
			'productos' => $this->Productos_model->getProductos(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/productos/list",$data);
		$this->load->view("layouts/footer");
	}

	// Enrutador Vista Add
    public function add(){
		$data = array(
			"categorias" => $this->Categorias_model->getCategorias(),
			"materiales" => $this->Materiales_model->getMateriales(),
			"maquinas" => $this->Maquinas_model->getMaquinas()
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/productos/add",$data);
		$this->load->view("layouts/footer");
	}

	// Enrutador Vista Edit
	public function edit($id){
		$data  = array(
			'producto' => $this->Productos_model->getProducto($id), 
			'categorias' => $this->Categorias_model->getCategorias(),
			"materiales" => $this->Materiales_model->getMateriales(),
			"maquinas" => $this->Maquinas_model->getMaquinas(),
			'prmateriales' => $this->Productos_model->getProductoMateriales($id), 
			'prmaquinas' => $this->Productos_model->getProductoMaquinas($id) 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/productos/edit",$data);
		$this->load->view("layouts/footer");
	}
	
	// Enrutador Vista View
	public function view(){
		$id_producto= $this->input->post("id");
		$data = array(
			"producto"   => $this->Productos_model->getProducto($id_producto),
			"materiales" => $this->Productos_model->getProductoMateriales($id_producto),
			"maquinas" => $this->Productos_model->getProductoMaquinas($id_producto)
		);
		$this->load->view("admin/productos/view",$data);
	}

	// Metodo Guardar Producto
	public function store(){
		//Campos de Producto
		$id_producto = $this->input->post("id_producto");
		$abre_producto = $this->input->post("abre_producto");
		$nombre_producto = $this->input->post("nombre_producto");
		$id_categoria = $this->input->post("id_categoria");
		$stock_producto = $this->input->post("stock_producto");
        $precio_producto = $this->input->post("precio_producto");
        //Campos de Material
		$id_material = $this->input->post("id_material");
		$cantidad_maproducto = $this->input->post("cantidad_maproducto");
		$precio_maproducto = $this->input->post("precio_maproducto");
		//Campos de Máquina
		$id_maquina = $this->input->post("id_maquina");
		// Validaciones
		$this->form_validation->set_rules('nombre_producto','nombre','trim|required|min_length[3]|max_length[200]|is_unique[producto.nombre_producto]');
		$this->form_validation->set_rules('id_categoria','categoria','required');
		$this->form_validation->set_rules('stock_producto','stock','trim|required|min_length[1]|max_length[20]');
		$this->form_validation->set_rules('precio_producto','precio','trim|required|min_length[1]|max_length[20]');
		// Metodos
		if($id_material == 0 || $id_maquina == 0){
			$this->session->set_flashdata("Llenar","Llenar");
			redirect(base_url()."rev/productos/add");
		}else{
			if ($this->form_validation->run()) {
				// Producto
				$data  = array(
					'abre_producto' => $abre_producto,
					'nombre_producto' => $nombre_producto,
					'id_categoria' => $id_categoria,
					'stock_producto' => $stock_producto,
					'precio_producto' => $precio_producto,
					'estado_producto' => "1",
				);
				if ($this->Productos_model->save($data)) {
					//Guardar Material
					$this->save_material($id_material,$id_producto,$cantidad_maproducto,$precio_maproducto);
					//Guardar Máquina
					$this->save_maquina($id_maquina,$id_producto);
               		$this->session->set_flashdata("Guardar","Guardar");
					redirect(base_url()."rev/productos");
           		}else{
					$this->session->set_flashdata("Cancelar","Cancelar");
					redirect(base_url()."rev/productos/add");
				}
			}else{
				$this->add();
			}
		}	
	}

	// Preparar Guardar Material
    protected function save_material($id_material,$id_producto,$cantidad_maproducto,$precio_maproducto){
		for ($i=0; $i < count($id_material); $i++) { 

			$monto_maproducto[$i] = $cantidad_maproducto[$i]*$precio_maproducto[$i];
			$data  = array(
				'id_material' => $id_material[$i], 
				'id_producto' => $id_producto,
				'cantidad_maproducto' => $cantidad_maproducto[$i],
				'monto_maproducto' => $monto_maproducto[$i],
                'estado_maproducto' => "1",
			);
			$this->Productos_model->save_material($data);
		}
	}
	
	// Preparar Guardar Maquina
    protected function save_maquina($id_maquina,$id_producto){
		for ($i=0; $i < count($id_maquina); $i++) { 
			$data  = array(
				'id_maquina' => $id_maquina[$i], 
				'id_producto' => $id_producto,
                'estado_mqproducto' => "1",
			);
			$this->Productos_model->save_maquina($data);
		}
	}

	// Metodo Editar Producto
	public function update(){
		//Campos de Producto
		$id_producto = $this->input->post("id_producto");
		$abre_producto = $this->input->post("abre_producto");
		$nombre_producto = $this->input->post("nombre_producto");
		$id_categoria = $this->input->post("id_categoria");
		$stock_producto = $this->input->post("stock_producto");
        $precio_producto = $this->input->post("precio_producto");
        //Campos de Material
		$id_material = $this->input->post("id_material");
		$cantidad_maproducto = $this->input->post("cantidad_maproducto");
		$precio_maproducto = $this->input->post("precio_maproducto");
		//Campos de Máquina
		$id_maquina = $this->input->post("id_maquina");
		// Validador
		$data_producto = $this->Productos_model->getProducto($id_producto);
		if ($nombre_producto == $data_producto->nombre_producto) {
			$unico = "";
		}else{
            $unico = "|is_unique[producto.nombre_producto]";
		}
		// Validaciones
		$this->form_validation->set_rules('nombre_producto','nombre','trim|required|min_length[3]|max_length[200]'.$unico);
		$this->form_validation->set_rules('id_categoria','categoria','required');
		$this->form_validation->set_rules('stock_producto','stock','trim|required|min_length[1]|max_length[20]');
		$this->form_validation->set_rules('precio_producto','precio','trim|required|min_length[1]|max_length[20]');
		// Metodos
		if($id_material == 0 || $id_maquina == 0){
			$this->session->set_flashdata("Llenar","Llenar");
			$this->edit($id_producto);
		}else{
			if ($this->form_validation->run()==TRUE) {
				$data = array(
					'id_producto' => 	 $id_producto,
					'abre_producto' => 	 $abre_producto,
					'nombre_producto' => $nombre_producto,
					'id_categoria' => 	 $id_categoria,
					'stock_producto' =>  $stock_producto,
					'precio_producto' => $precio_producto,
					'estado_producto' => "1",
				);
				if ($this->Productos_model->update($id_producto,$data)) {
					//Editar Material
					$this->edit_material($id_material,$id_producto,$cantidad_maproducto,$precio_maproducto);
					//Editar Máquina
					$this->edit_maquina($id_maquina,$id_producto);
					$this->session->set_flashdata("Editar","Editar");
					redirect(base_url()."rev/productos");
				}else{
					$this->session->set_flashdata("Cancelar","Cancelar");
					redirect(base_url()."rev/productos/edit/".$id_producto);
				}
			}else{
				$this->edit($id_producto);
			}
		}	
	}

	// Preparar Editar Material
    protected function edit_material($id_material,$id_producto,$cantidad_maproducto,$precio_maproducto){
		for ($i=0; $i < count($id_material); $i++) { 
			$monto_maproducto[$i] = $cantidad_maproducto[$i]*$precio_maproducto[$i];
			$data  = array(
				'id_material' => $id_material[$i], 
				'id_producto' => $id_producto,
				'cantidad_maproducto' => $cantidad_maproducto[$i],
				'monto_maproducto' => $monto_maproducto[$i],
                'estado_maproducto' => "1",
			);
			$this->Productos_model->desterrar_material($id_producto);
			$this->Productos_model->save_material($data);
		}
	}
	
	// Preparar Editar Maquina
    protected function edit_maquina($id_maquina,$id_producto){
		for ($i=0; $i < count($id_maquina); $i++) { 
			$data  = array(
				'id_maquina' => $id_maquina[$i], 
				'id_producto' => $id_producto,
                'estado_mqproducto' => "1",
			);
			$this->Productos_model->desterrar_maquina($id_producto);
			$this->Productos_model->save_maquina($data);
		}
	}

	// Método Eliminar Productos
	public function delete($id){
		$data  = array(
			'estado_producto' => "0", 
		);
		$this->Productos_model->update($id,$data);
		echo "rev/productos";
	}

	// Busqueda Ajax Producto 
	public function obtenerProducto(){
		$id_producto = $this->input->post("id_producto");
		$productos = $this->Productos_model->getProducto2($id_producto);
		echo json_encode($productos);
	}

	// Busqueda Ajax Producto 
	public function obtenerMateriales(){
		$id = $this->input->post("id");
		$materiales = $this->Productos_model->getMateriales2($id);
		echo json_encode($materiales);
	}

}