<!-- Contenido de la Vista -->
<div class="content-wrapper">
    <!-- Cabecera -->
    <section class="content-header">
        <h3>
        AREA
        <small>Nueva área</small>
        <hr>
        </h3>
    </section>
    <!-- Cuerpo de la caja -->
    <section class="content">
        <div class="box box-success">
            <!-- Formulario -->
            <form action="<?php echo base_url();?>mantenimiento/areas/store" method="POST">  
                <!-- Header -->
                <div class="box-header with-border">
                    <h3 class="box-title">Items del Formulario</h3>
                </div>
                <!-- Body -->
                <div class="box-body">
                    <div class="row">                                            
                        <!-- Codigo de Área -->
                        <div class="col-md-12">
                            <div class="form-group"> 
                                <label for="abre_area">Código:</label>
                                <input type="text" class="form-control" id="abre_area" name="abre_area" value="<?php 
                                echo $this->Areas_model->GenerarIDArea();?>" readonly="readonly">
                            </div>
                        </div>
                        <!-- Nombre de Área -->
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('nombre_area') == true ? 'has-error':''?>">
                                <label for="nombre_area">Nombre:</label>
                                <input type="text" class="form-control" id="nombre_area" name="nombre_area">
                                <?php echo form_error("nombre_area","<span class='help-block'>","</span>");?>
                            </div>
                        </div>  
                    </div>     
                </div>
                <hr>
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