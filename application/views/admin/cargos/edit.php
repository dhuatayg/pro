<!-- Contenido de la Vista -->
<div class="content-wrapper">
    <!-- Cabecera -->
    <section class="content-header">
        <h1>
        Cargo
        <small>Editar cargo</small>
        </h1>
        <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i>Inicio</a></li>
        <li><a href="#"></i>Mantenimientos</a></li>
        <li class="active">Editar Cargo</li>
      </ol>
    </section>
    <!-- Cuerpo de la caja -->
    <section class="content">
        <div class="box box-success">
            <!-- Formulario -->
            <form action="<?php echo base_url();?>mantenimiento/cargos/update" method="POST">  
                <!-- Header -->
                <div class="box-header with-border">
                    <h3 class="box-title">Items del Formulario</h3>
                </div>
                <!-- Body -->
                <div class="box-body">
                    <div class="row">                                            
                        <!-- Codigo de Cargo -->
                        <div class="col-md-12">
                            <input type="hidden" value="<?php echo $cargo->id_cargo;?>" id="id_cargo" name="id_cargo">
                            <div class="form-group"> 
                                <label for="abre_cargo">Código:</label>
                                <input type="text" class="form-control" id="abre_cargo" name="abre_cargo"  value="<?php echo $cargo->abre_cargo;?>" readonly="readonly">
                            </div>
                        </div>
                        <!-- Nombre de Cargo -->
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('nombre_cargo') == true ? 'has-error':''?>">
                                <label for="nombre_cargo">Nombre:</label>
                                <input type="text" class="form-control" id="nombre_cargo" name="nombre_cargo" value="<?php echo $cargo->nombre_cargo;?>">
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