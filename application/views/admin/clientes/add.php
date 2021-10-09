<!-- Contenido de la Vista -->
<div class="content-wrapper">
    <!-- Cabecera -->
    <section class="content-header">
        <h3>
        CLIENTE
        <small>NUEVO CLIENTE</small>
        </h3>
    </section>
    <hr>
    <!-- Cuerpo de la caja -->
    <section class="content">
        <div class="box box-success">
            <!-- Formulario -->
            <form action="<?php echo base_url();?>mantenimiento/clientes/store" method="POST">  
                <!-- Header -->
                <div class="box-header with-border">
                    <h3 class="box-title">Items del Formulario</h3>
                </div>
                <!-- Body -->
                <div class="box-body">
                    <div class="row">                                            
                        <!-- Documento de Cliente -->
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('ndocumento_cliente') == true ? 'has-error':''?>">                            
                                <label for="ndocumento_cliente">Documento de Identidad:</label>
                                <input type="text" class="form-control" id="ndocumento_cliente" name="ndocumento_cliente"> 
                                <?php echo form_error("ndocumento_cliente","<span class='help-block'>","</span>");?>
                            </div>
                        </div>
                        <!-- Nombre de Cliente -->
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('nombre_cliente') == true ? 'has-error':''?>">
                                <label for="nombre_cliente">Nombre:</label>
                                <input type="text" class="form-control" id="nombre_cliente" name="nombre_cliente">
                                <?php echo form_error("nombre_cliente","<span class='help-block'>","</span>");?>
                            </div>
                        </div>
                        <!-- Teléfono de Cliente -->
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('telefono_cliente') == true ? 'has-error':''?>">
                                <label for="telefono_cliente">Teléfono:</label>
                                <input type="text" class="form-control" id="telefono_cliente" name="telefono_cliente">
                                <?php echo form_error("telefono_cliente","<span class='help-block'>","</span>");?>
                            </div>
                        </div>
                        <!-- Correo de Cliente -->
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('correo_cliente') == true ? 'has-error':''?>">
                                <label for="correo_cliente">Correo:</label>
                                <input type="text" class="form-control" id="correo_cliente" name="correo_cliente">
                                <?php echo form_error("correo_cliente","<span class='help-block'>","</span>");?>
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
                        <a href="<?php echo base_url();?>mantenimiento/clientes/" class="btn btn-danger btn-flat">
                        <span class="fa fa-close"></span> &nbsp Cancelar</a>
                    </div>
                </div>
            </form>    
        </div>
    </section>
</div>