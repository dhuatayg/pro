<!-- Contenido de la Vista -->
<div class="content-wrapper">
    <!-- Cabecera -->
    <section class="content-header">
        <h1>
        Material
        <small>Nuevo material</small>
        </h1>
        <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i>Inicio</a></li>
        <li><a href="#"></i>Inventario</a></li>
        <li class="active">Nuevo material</li>
      </ol>
    </section>
    <!-- Cuerpo de la caja -->
    <section class="content">
        <div class="box box-success">
            <!-- Formulario -->
            <form action="<?php echo base_url();?>rev/materiales/store" method="POST">  
                <!-- Header -->
                <div class="box-header with-border">
                    <h3 class="box-title">Items del Formulario</h3>
                </div>
                <!-- Body -->
                <div class="box-body">
                    <div class="row">                                            
                        <!-- Codigo de Material -->
                        <div class="col-md-12">
                            <div class="form-group"> 
                                <label for="abre_material">Código:</label>
                                <input type="text" class="form-control" id="abre_material" name="abre_material" value="<?php 
                                echo $this->Materiales_model->GenerarIDMaterial();?>" readonly="readonly">
                            </div>
                        </div>
                        <!-- Nombre de Material -->
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('nombre_material') == true ? 'has-error':''?>">
                                <label for="nombre_material">Nombre:</label>
                                <input type="text" class="form-control" id="nombre_material" name="nombre_material">
                                <?php echo form_error("nombre_material","<span class='help-block'>","</span>");?>
                            </div>
                        </div>
                        <!-- Descripción de Material -->
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('descripcion_material') == true ? 'has-error':''?>">
                                <label for="descripcion_material">Descripción:</label>
                                <input type="text" class="form-control" id="descripcion_material" name="descripcion_material">
                                <?php echo form_error("descripcion_material","<span class='help-block'>","</span>");?>
                            </div>
                        </div>
                        <!-- Datos de la unidad -->
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('unidad_material') == true ? 'has-error':''?>">
                                <label for="unidad_material">Unidad:</label>
                                <select class="form-control select2" id="unidad_material" name="unidad_material" style="width: 100%;">
                                    <option value="">Seleccione</option>
                                    <option value="Kilo">Kilo</option>
                                    <option value="Lito">Lito</option>
                                    <option value="Metro">Metro</option>
                                    <option value="Unidad">Unidad</option>
                                </select>
                                <?php echo form_error("unidad_material","<span class='help-block'>","</span>");?>
                            </div>
                        </div>
                        <!-- Stock de Material -->
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('stock_material') == true ? 'has-error':''?>">
                                <label for="stock_material">Stock:</label>
                                <input type="number" class="form-control" id="stock_material" name="stock_material">
                                <?php echo form_error("stock_material","<span class='help-block'>","</span>");?>
                            </div>
                        </div>
                        <!-- Precio de Material -->
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('precio_material') == true ? 'has-error':''?>">
                                <label for="precio_material">Precio:</label>
                                <input type="number" class="form-control" id="precio_material" name="precio_material">
                                <?php echo form_error("precio_material","<span class='help-block'>","</span>");?>
                            </div>
                        </div>
                    </div>     
                </div>
                <!-- Footer -->
                <div class="box-footer">
                    <!-- Cajón de Opciones -->
                    <div class="btn-group">
                        <button type="submit" class="btn bg-green btn-flat">
                        <span class="fa fa-check"></span> &nbsp Guardar</button>
                        <a href="<?php echo base_url();?>rev/materiales/" class="btn btn-danger btn-flat">
                        <span class="fa fa-close"></span> &nbsp Cancelar</a>
                    </div>
                </div>
            </form>    
        </div>
    </section>
</div>