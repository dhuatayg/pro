<!-- Contenido de la Vista -->
<div class="content-wrapper">
    <!-- Cabecera -->
    <section class="content-header">
        <h3>
        AREA
        <small>EDITAR AREA</small>
        </h3>
    </section>
    <hr>
    <!-- Cuerpo de la caja -->
    <section class="content">
        <div class="box box-success">
            <!-- Formulario -->
            <form action="<?php echo base_url();?>mantenimiento/areas/update" method="POST">  
                <!-- Header -->
                <div class="box-header with-border">
                    <h3 class="box-title">Items del Formulario</h3>
                </div>
                <!-- Body -->
                <div class="box-body">
                    <div class="row">                                            
                        <!-- Codigo de Área -->
                        <div class="col-md-12">
                            <input type="hidden" value="<?php echo $area->id_area;?>" id="id_area" name="id_area">
                            <div class="form-group"> 
                                <label for="abre_area">Código:</label>
                                <input type="text" class="form-control" id="abre_area" name="abre_area"  value="<?php echo $area->abre_area;?>" readonly="readonly">
                            </div>
                        </div>
                        <!-- Nombre de Área -->
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('nombre_area') == true ? 'has-error':''?>">
                                <label for="nombre_area">Nombre:</label>
                                <input type="text" class="form-control" id="nombre_area" name="nombre_area" value="<?php echo $area->nombre_area;?>">
                                <?php echo form_error("nombre_area","<span class='help-block'>","</span>");?>
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
                        <a href="<?php echo base_url();?>mantenimiento/areas/" class="btn btn-danger btn-flat">
                        <span class="fa fa-close"></span> &nbsp Cancelar</a>
                    </div>
                </div>
            </form>    
        </div>
    </section>
</div>