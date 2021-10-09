<!-- Contenido de la Vista -->
<div class="content-wrapper">
    <!-- Cabecera -->
    <section class="content-header">
        <h3>
        MATERIAL
        <small>EDITAR MATERIAL</small>
        </h3>
    </section>
    <hr>
    <!-- Cuerpo de la caja -->
    <section class="content">
        <div class="box box-success">
            <!-- Formulario -->
            <form action="<?php echo base_url();?>rev/materiales/update" method="POST">  
                <!-- Header -->
                <div class="box-header with-border">
                    <h3 class="box-title">Items del Formulario</h3>
                </div>
                <!-- Body -->
                <div class="box-body">
                    <div class="row">                                            
                        <!-- Codigo de Usuario -->
                        <div class="col-md-12">
                            <input type="hidden" value="<?php echo $material->id_material;?>" id="id_material" name="id_material">
                            <div class="form-group"> 
                                <label for="abre_material">Código:</label>
                                <input type="text" class="form-control" id="abre_material" name="abre_material" value="<?php echo $material->abre_material;?>" readonly="readonly">
                            </div>
                        </div>
                            <!-- Nombre de Material -->
                            <div class="col-md-12">
                            <div class="form-group <?php echo form_error('nombre_material') == true ? 'has-error':''?>">
                                <label for="nombre_material">Nombre:</label>
                                <input type="text" class="form-control" id="nombre_material" name="nombre_material" value="<?php echo $material->nombre_material;?>">
                                <?php echo form_error("nombre_material","<span class='help-block'>","</span>");?>
                            </div>
                        </div>
                        <!-- Descripción de Material -->
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('descripcion_material') == true ? 'has-error':''?>">
                                <label for="descripcion_material">Descripción:</label>
                                <input type="text" class="form-control" id="descripcion_material" name="descripcion_material" value="<?php echo $material->descripcion_material;?>">
                                <?php echo form_error("descripcion_material","<span class='help-block'>","</span>");?>
                            </div>
                        </div>
                        <!-- Datos de la unidad -->
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('unidad_material') == true ? 'has-error':''?>">
                                <label for="unidad_material">Unidad:</label>
                                <select class="form-control select2" id="unidad_material" name="unidad_material" style="width: 100%;">
                                <?php if ($material->unidad_material == "Kilo") : ?>
                                    <option value="Kilo" selected>Kilo</option>
                                <?php else: ?>
                                    <option value="Kilo">Kilo</option>
                                <?php endif;?>
                                <?php if ($material->unidad_material == "Litro") : ?>
                                    <option value="Litro" selected>Litro</option>
                                <?php else: ?>
                                    <option value="Litro">Litro</option>
                                <?php endif;?>
                                <?php if ($material->unidad_material == "Metro") : ?>
                                    <option value="Metro" selected>Metro</option>
                                <?php else: ?>
                                    <option value="Metro">Metro</option>
                                <?php endif;?>   
                                <?php if ($material->unidad_material == "Unidad") : ?>
                                    <option value="Unidad" selected>Unidad</option>
                                <?php else: ?>
                                    <option value="Unidad">Unidad</option>
                                <?php endif;?>
                                </select>
                                <?php echo form_error("unidad_material","<span class='help-block'>","</span>");?>
                            </div>
                        </div>
                        <!-- Stock de Material -->
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('stock_material') == true ? 'has-error':''?>">
                                <label for="stock_material">Stock:</label>
                                <input type="number" class="form-control" id="stock_material" name="stock_material" value="<?php echo $material->stock_material;?>">
                                <?php echo form_error("stock_material","<span class='help-block'>","</span>");?>
                            </div>
                        </div>
                        <!-- Precio de Material -->
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('precio_material') == true ? 'has-error':''?>">
                                <label for="precio_material">Precio:</label>
                                <input type="number" class="form-control" id="precio_material" name="precio_material" value="<?php echo $material->precio_material;?>">
                                <?php echo form_error("precio_material","<span class='help-block'>","</span>");?>
                            </div>
                        </div>
                    </div>     
                </div>
                <br>
                <hr>
                <br>
                <!-- Footer -->
                <div class="box-footer">
                    <!-- Cajón de Opciones -->
                    <div class="btn-group">
                        <button type="submit" class="btn bg-green btn-primary">
                        <span class="fa fa-check"></span> &nbsp Guardar</button>
                        <a href="<?php echo base_url();?>rev/materiales/" class="btn btn-danger btn-flat">
                        <span class="fa fa-close"></span> &nbsp Cancelar</a>
                    </div>
                </div>
            </form>    
        </div>
    </section>
</div>