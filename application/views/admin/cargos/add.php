<!-- Contenido de la Vista -->
<div class="content-wrapper">
    <!-- Cabecera -->
    <section class="content-header">
        <h1>
        Cargo
        <small>Nuevo cargo</small>
        </h1>
        <ol class="breadcrumb">
        <li><i class="fa fa-home"></i> Inicio</<i></li>
        <li><i class="fa fa-gear"></i> Mantenimientos</a></li>
        <li>Cargo</li>
        <li class="active">Nuevo cargo</li>
      </ol>
    </section>
    <!-- Cuerpo de la caja -->
    <section class="content">
        <div class="box box-success">
            <!-- Formulario -->
            <form action="<?php echo base_url();?>mantenimiento/cargos/store" method="POST">  
                <!-- Header -->
                <div class="box-header with-border">
                    <h3 class="box-title">Items del Formulario</h3>
                </div>
                <!-- Body -->
                <div class="box-body">
                    <div class="row">                                            
                        <!-- Codigo de Estado -->
                        <div class="col-md-12">
                            <div class="form-group"> 
                                <label for="abre_cargo">Código:</label>
                                <input type="text" class="form-control" id="abre_cargo" name="abre_cargo" value="<?php 
                                echo $this->Cargos_model->GenerarIDCargo();?>" readonly="readonly">
                            </div>
                        </div>
                        <!-- Nombre de Estado -->
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('nombre_cargo') == true ? 'has-error':''?>">
                                <label for="nombre_cargo">Nombre:</label>
                                <input type="text" class="form-control" id="nombre_cargo" name="nombre_cargo">
                                <?php echo form_error("nombre_cargo","<span class='help-block'>","</span>");?>
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
                        <a href="<?php echo base_url();?>mantenimiento/cargos/" class="btn btn-danger btn-flat">
                        <span class="fa fa-close"></span> &nbsp Cancelar</a>
                    </div>
                </div>
            </form>    
        </div>
    </section>
</div>