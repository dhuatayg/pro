<!-- Contenido de la Vista -->
<div class="content-wrapper">
    <!-- Cabecera -->
    <section class="content-header">
        <h1>
        Producto
        <small>Crear producto</small>
        </h1>
        <ol class="breadcrumb">
        <li><i class="fa fa-home"></i> Inicio</<i></li>
        <li><i class="fa fa-barcode"></i> Inventario</a></li>
        <li>Producto</li>
        <li class="active">Crear Producto</li>
      </ol>
    </section>
    <!-- Cuerpo de la caja -->
    <section class="content">
        <div class="box box-success">
            <!-- Formulario -->
            <form action="<?php echo base_url();?>rev/productos/store" method="POST">  
                <!-- Header -->
                <div class="box-header with-border">
                    <h3 class="box-title">Items del Formulario</h3>
                </div>
                <!-- Body -->
                <div class="box-body">
                    <div class="row">                                            
                        <!-- Codigo de Producto -->
                        <div class="col-md-2">
                            <div class="form-group"> 
                                <label for="abre_producto">Código:</label>
                                <input type="hidden" name="id_producto" value="<?php echo $this->Productos_model->GenerarID();?>">
                                <input type="text" class="form-control" id="abre_producto" name="abre_producto" value="<?php 
                                echo $this->Productos_model->GenerarIDProducto();?>" readonly="readonly">
                            </div>
                        </div>
                        <!-- Nombre de Producto -->
                        <div class="col-md-3">
                            <div class="form-group <?php echo form_error('nombre_producto') == true ? 'has-error':''?>">
                                <label for="nombre_producto">Nombre:</label>
                                <input type="text" class="form-control" id="nombre_producto" name="nombre_producto">
                                <?php echo form_error("nombre_producto","<span class='help-block'>","</span>");?>
                            </div>
                        </div> 
                        <!-- Datos de la categoria -->
                        <div class="col-md-3">
                            <div class="form-group <?php echo form_error('id_categoria') == true ? 'has-error':''?>">
                                <label for="id_categoria">Categoría:</label>
                                <select class="form-control select2" id="buscar_categoria" name="id_categoria" style="width: 100%;">
                                    <option value="">Seleccione</option>
                                    <?php foreach($categorias as $categoria):?>
                                        <option value="<?php echo $categoria->id_categoria?>"><?php echo $categoria->nombre_categoria;?></option>
                                    <?php endforeach;?>
                                </select>
                                <?php echo form_error("id_categoria","<span class='help-block'>","</span>");?>
                            </div>
                        </div>  
                        <!-- Stock de Producto -->
                        <div class="col-md-2">
                            <div class="form-group <?php echo form_error('stock_producto') == true ? 'has-error':''?>">
                                <label for="stock_producto">Stock:</label>
                                <input type="text" class="form-control" id="stock_producto" name="stock_producto">
                                <?php echo form_error("stock_producto","<span class='help-block'>","</span>");?>
                            </div>
                        </div> 
                        <!-- Precio de Producto -->
                        <div class="col-md-2">
                            <div class="form-group <?php echo form_error('precio_producto') == true ? 'has-error':''?>">
                                <label for="precio_producto">Precio:</label>
                                <input type="text" class="form-control" id="precio_producto" name="precio_producto">
                                <?php echo form_error("precio_producto","<span class='help-block'>","</span>");?>
                            </div>
                        </div>
                        
                        <!-- Pestañas -->
                        <div class="col-md-12">
                            <!-- Pestañas de Navegación -->
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <!-- Pestaña Materiales -->
                                    <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">
                                    <span class="glyphicon glyphicon-tag"></span>&nbsp Materiales</a></li>
                                    <!-- Pestaña Procesos -->
                                    <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">
                                    <span class="glyphicon glyphicon-repeat"></span>&nbsp Maquinas</a></li>                                
                                </ul>
                                <!-- Contenido de las pestañas -->
                                <div class="tab-content">
                                    <!-- Materiales -->
                                    <div class="tab-pane active" id="tab_1">
                                        <!-- Datos del Material -->
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="input-group <?php echo form_error('id_material') == true ? 'has-error':''?>">
                                                        <select class="form-control select2" id="buscar_material" name="id_material" style="width: 100%;">
                                                            <option value="0">Elegir Material</option>
                                                            <?php foreach($materiales as $material):?>
                                                                <option value="<?php echo $material->id_material?>"><?php echo $material->nombre_material;?></option>
                                                            <?php endforeach;?>
                                                        </select>
                                                        <span class="input-group-btn">
                                                        <button type="button" id="btn-añadir-material" class="btn btn-success btn-flat">Añadir</button>
                                                        </span>
                                                        <?php echo form_error("id_material","<span class='help-block'>","</span>");?>
                                                    </div>
                                                </div>  
                                            </div>                       
                                            <!-- Inputs -->
                                            <input type="hidden" id="a_material" >
                                            <input type="hidden" id="b_material" >    
                                            <input type="hidden" id="c_material" >
                                            <input type="hidden" id="d_material" >  
                                            <input type="hidden" id="e_material" > 
                                            <input type="hidden" id="f_material" >           
                                        </div>
                                        <!-- Tabla de Materiales -->                              
                                        <table id="tb_material" class="table table-bordered table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Código</th>
                                                    <th class="text-center">Nombre</th>
                                                    <th class="text-center">Descripción</th>
                                                    <th class="text-center">U. Medida</th>
                                                    <th class="text-center">Cantidad Necesaria</th>
                                                    <th class="text-center">Eliminar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- Máquina -->
                                    <div class="tab-pane" id="tab_2">
                                        <!-- Datos de la Máquina -->
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="input-group <?php echo form_error('id_maquina') == true ? 'has-error':''?>">
                                                        <select class="form-control select2" id="buscar_maquina" name="id_maquina" style="width: 100%;">
                                                            <option value="0">Elegir Máquina</option>
                                                            <?php foreach($maquinas as $maquina):?>
                                                                <option value="<?php echo $maquina->id_maquina?>"><?php echo $maquina->nombre_maquina;?></option>
                                                            <?php endforeach;?>
                                                        </select>
                                                        <span class="input-group-btn">
                                                        <button type="button" id="btn-añadir-maquina" class="btn btn-success btn-flat">Agregar</button>
                                                        </span>
                                                        <?php echo form_error("id_maquina","<span class='help-block'>","</span>");?>
                                                    </div>
                                                </div>  
                                            </div>                       
                                            <!-- Inputs -->
                                            <input type="hidden" id="a_maquina" >
                                            <input type="hidden" id="b_maquina" >    
                                            <input type="hidden" id="c_maquina" >
                                            <input type="hidden" id="d_maquina" >  
                                            <input type="hidden" id="e_maquina" >           
                                        </div>
                                        <!-- Tabla de Máquinas -->                              
                                        <table id="tb_maquina" class="table table-bordered table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Codigo</th>
                                                    <th class="text-center">Nombre</th>
                                                    <th class="text-center">Descripcion</th>
                                                    <th class="text-center">Área</th>
                                                    <th class="text-center">Eliminar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>                                                          
                                </div>
                            </div>                
                        </div>
                        <div class="col-md-12"> 
                            <!-- Cajón de Opciones -->
                            <div class="btn-group">
                                <button type="submit" class="btn bg-green btn-flat">
                                <span class="fa fa-check"></span> &nbsp Guardar</button>
                                <a href="<?php echo base_url();?>rev/productos/" class="btn btn-danger btn-flat">
                                <span class="fa fa-close"></span> &nbsp Cancelar</a>
                            </div>                      
                        </div>
                    </div>  
                </div>
                <!-- <div class="box-footer"> -->
                    <!-- <div class="col-md-12"> -->
                        <!-- Cajón de Opciones -->
                        <!-- <div class="btn-group">
                            <button type="submit" class="btn bg-green btn-flat">
                            <span class="fa fa-check"></span> &nbsp Guardar</button>
                            <a href="<?php echo base_url();?>rev/productos/" class="btn btn-danger btn-flat">
                            <span class="fa fa-close"></span> &nbsp Cancelar</a>
                        </div>                       -->
                    <!-- </div> -->
                <!-- </div> -->
            </form>    
        </div>
    </section>
</div>