<!-- Contenido de la Vista -->
<div class="content-wrapper">
    <!-- Cabecera -->
    <section class="content-header">
        <h1>
        Pedido
        <small>Nuevo pedido</small>
        </h1>
        <ol class="breadcrumb">
        <li><i class="fa fa-home"></i> Inicio</<i></li>
        <li><i class="fa fa-barcode"></i> Pedido</a></li>
        <li class="active">Nuevo Pedido</li>
      </ol>
    </section>
    <!-- Cuerpo de la caja -->
    <section class="content">
        <div class="box box-success">
            <!-- Formulario -->
            <form action="<?php echo base_url();?>movimiento/pedidos/store" method="POST">  
                <!-- Header -->
                <div class="box-header with-border">
                    <h3 class="box-title">Items del Formulario</h3>
                </div>
                <!-- Body -->
                <div class="box-body">
                    <div class="row">  
                        <!-- Codigo de Pedido -->
                        <div class="col-md-3">
                            <div class="form-group"> 
                                <label for="abre_pedido">Número de Serie:</label>
                                <input type="hidden" name="id_pedido" value="<?php echo $this->Pedidos_model->GenerarID();?>">
                                <input type="text" class="form-control" id="abre_pedido" name="abre_pedido" value="<?php 
                                echo $this->Pedidos_model->GenerarIDPedido();?>" readonly="readonly">
                            </div>
                        </div>
                        <!-- Fecha de Emisión de Pedido -->
                        <div class="col-md-3">
                            <div class="form-group"> 
                                <label for="fecha_pedido">Fecha de Emisión:</label>
                                <input type="date" class="form-control" name="fecha_pedido"  value="<?php echo date("Y-m-d");?>">
                            </div>
                        </div>
                        <!-- Fecha de Entrega de Pedido -->
                        <div class="col-md-3">
                            <div class="form-group"> 
                                <label for="entrega_pedido">Fecha de Entrega:</label>
                                <input type="date" class="form-control" name="entrega_pedido"  value="<?php echo date("Y-m-d");?>">
                            </div>
                        </div>
                        <!-- Datos del estado -->
                        <div class="col-md-3">
                            <div class="form-group <?php echo form_error('id_estado') == true ? 'has-error':''?>">
                                <label for="id_estado">Estado:</label>
                                <select class="form-control select2" id="buscar_estado" name="id_estado" style="width: 100%;">
                                    <option value="">Seleccione</option>
                                    <?php foreach($estados as $estado):?>
                                        <option value="<?php echo $estado->id_estado?>"><?php echo $estado->nombre_estado;?></option>
                                    <?php endforeach;?>
                                </select>
                                <?php echo form_error("id_estado","<span class='help-block'>","</span>");?>
                            </div>
                        </div> 
                    </div>
                    <div class="row"> 
                        <!-- Nombre de Cliente -->
                        <div class="col-md-4">
                            <div class="form-group <?php echo form_error('nombre_cliente') == true ? 'has-error':''?>">
                                <label for="nombre_cliente">Nombre del Cliente:</label>
                                <input type="hidden" class="form-control" id="id_cliente" name="id_cliente">
                                <input type="text" class="form-control autocomplete" id="buscar_cliente" name="nombre_cliente" style="text-transform:uppercase;">
                                <?php echo form_error("nombre_cliente","<span class='help-block'>","</span>");?>
                            </div>
                        </div> 
                        <!-- Documento de Cliente -->
                        <div class="col-md-2">
                            <div class="form-group <?php echo form_error('ndocumento_cliente') == true ? 'has-error':''?>">
                                <label for="ndocumento_cliente">Ruc/Dni:</label>
                                <input type="text" class="form-control" id="ndocumento_cliente" name="ndocumento_cliente" onkeypress="return soloNumeros(event);">
                                <?php echo form_error("ndocumento_cliente","<span class='help-block'>","</span>");?>
                            </div>
                        </div>
                        <!-- Teléfono de Cliente -->
                        <div class="col-md-2">
                            <div class="form-group <?php echo form_error('telefono_cliente') == true ? 'has-error':''?>">
                                <label for="telefono_cliente">Teléfono:</label>
                                <input type="text" class="form-control" id="telefono_cliente" name="telefono_cliente" onkeypress="return soloNumeros(event);">
                                <?php echo form_error("telefono_cliente","<span class='help-block'>","</span>");?>
                            </div>
                        </div>
                        <!-- Correo de Cliente -->
                        <div class="col-md-4">
                            <div class="form-group <?php echo form_error('correo_cliente') == true ? 'has-error':''?>">
                                <label for="correo_cliente">Correo:</label>
                                <input type="text" class="form-control" id="correo_cliente" name="correo_cliente">
                                <?php echo form_error("correo_cliente","<span class='help-block'>","</span>");?>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <b>Detalle del Pedido:</b>
                            </div>              
                        </div> 

                        <!-- Datos del Producto -->
                        <div class="col-md-5">
                            <div class="form-group">
                                <div class="input-group <?php echo form_error('id_producto') == true ? 'has-error':''?>">
                                <!-- <label for="id_estado">Producto:</label> -->
                                    <select class="form-control select2" id="buscar_producto" name="id_producto" style="width: 100%;">
                                        <option value="0">Buscar Producto</option>
                                        <?php foreach($productos as $producto):?>
                                            <option value="<?php echo $producto->id_producto?>"><?php echo $producto->nombre_producto;?></option>
                                        <?php endforeach;?>
                                    </select>
                                    <span class="input-group-btn">
                                    <button type="button" id="btn-añadir-producto" class="btn btn-success btn-flat">Agregar</button>
                                    </span>
                                    <?php echo form_error("id_producto","<span class='help-block'>","</span>");?>
                                </div>
                            </div>
                        </div>  
                        <div class="col-md-7">
                            <!-- Inputs -->
                            <input type="hidden" id="a_producto" >
                            <input type="hidden" id="b_producto" >    
                            <input type="hidden" id="c_producto" >
                            <input type="hidden" id="d_producto" >  
                            <input type="hidden" id="e_producto" >   
                        </div> 
                        <div class="col-md-12">
                            <table id="tb_producto" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">Serie</th>
                                        <th class="text-center">Nombre</th>
                                        <th class="text-center">Stock</th>
                                        <th class="text-center">Cantidad</th>
                                        <th class="text-center">Precio</th>
                                        <th class="text-center">Pendiente</th>
                                        <th class="text-center">Importe</th>
                                        <th class="text-center">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                </tbody>
                            </table>                    
                        </div> 
                        
                        <div class="form-group">
                                <div class="col-md-9">                                   
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">Total:</span>
                                        <input type="text" class="form-control" placeholder="0.00" name="monto_pedido" readonly="readonly">
                                    </div>
                                </div>
                        </div>
                    </div>    
                </div>
                <div class="box-footer">                 
                    <!-- Cajón de Opciones -->
                    <div class="btn-group"> 
                        <button type="submit" class="btn bg-green btn-flat">
                        <span class="fa fa-check"></span> &nbsp Guardar</button>
                        <a href="<?php echo base_url();?>movimiento/pedidos/" class="btn btn-danger btn-flat">
                        <span class="fa fa-close"></span> &nbsp Cancelar</a>
                    </div>                       
                </div>
            </form>    
        </div>
    </section>
</div>