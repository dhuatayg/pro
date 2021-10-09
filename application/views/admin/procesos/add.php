<!-- Contenido de la Vista -->
<div class="content-wrapper">
    <!-- Cabecera -->
    <section class="content-header">
        <h1>
        Proceso
        <small>Nuevo proceso</small>
        </h1>
        <ol class="breadcrumb">
        <li><i class="fa fa-home"></i> Inicio</<i></li>
        <li><i class="fa fa-gear"></i> Mantenimientos</a></li>
        <li class="active">Nuevo Proceso</li>
      </ol>
    </section>
    <!-- Cuerpo de la caja -->
    <section class="content">
        <div class="box box-success">
            <!-- Formulario -->
            <form action="<?php echo base_url();?>mantenimiento/procesos/store" method="POST">  
                <!-- Header -->
                <div class="box-header with-border">
                    <h3 class="box-title">Items del Formulario</h3>
                </div>
                <!-- Body -->
                <div class="box-body">
                    <div class="row">                                            
                        <!-- Codigo de Proceso -->
                        <div class="col-md-12">
                            <div class="form-group"> 
                                <label for="abre_proceso">Código:</label>
                                <input type="text" class="form-control" id="abre_proceso" name="abre_proceso" value="<?php 
                                echo $this->Procesos_model->GenerarIDProceso();?>" readonly="readonly">
                            </div>
                        </div>
                        <!-- Nombre de Proceso -->
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('nombre_proceso') == true ? 'has-error':''?>">
                                <label for="nombre_proceso">Nombre:</label>
                                <input type="text" class="form-control" id="nombre_proceso" name="nombre_proceso">
                                <?php echo form_error("nombre_proceso","<span class='help-block'>","</span>");?>
                            </div>
                        </div>  
                        <!-- Descripción de Proceso -->
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('descripcion_proceso') == true ? 'has-error':''?>">
                                <label for="descripcion_proceso">Descripción:</label>
                                <input type="text" class="form-control" id="descripcion_proceso" name="descripcion_proceso">
                                <?php echo form_error("descripcion_proceso","<span class='help-block'>","</span>");?>
                            </div>
                        </div>
                        <!-- Datos del Área -->
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('id_area') == true ? 'has-error':''?>">
                                <label for="id_area">Área:</label>
                                <select class="form-control select2" id="buscar_area" name="id_area" style="width: 100%;">
                                    <option value="">Seleccione</option>
                                    <?php foreach($areas as $area):?>
                                        <option value="<?php echo $area->id_area?>"><?php echo $area->nombre_area;?></option>
                                    <?php endforeach;?>
                                </select>
                                <?php echo form_error("id_area","<span class='help-block'>","</span>");?>
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
                        <a href="<?php echo base_url();?>mantenimiento/procesos/" class="btn btn-danger btn-flat">
                        <span class="fa fa-close"></span> &nbsp Cancelar</a>
                    </div>
                </div>
            </form>    
        </div>
    </section>
</div>