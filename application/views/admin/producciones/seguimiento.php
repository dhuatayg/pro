<!-- Contenido de la Vista -->
<div class="content-wrapper">
    <!-- Cabecera -->
    <section class="content-header">
        <h1>
        Producción
        <small>Control de Producción</small>
        </h1>
        <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i>Inicio</a></li>
        <li><i class="fa fa-calendar-check-o"></i> Producción</li>
        <li class="active">Control de Producción</li>
      </ol>
    </section>
    <!-- Cuerpo de la caja -->
    <section class="content">
        <div class="box box-success">
            <!-- Formulario -->
            <form action="<?php echo base_url();?>movimiento/producciones/storeseguimiento" method="POST">
                <!-- Header -->
                <div class="box-header with-border">
                    <h3 class="box-title">Items del Formulario</h3>
                </div>
                <!-- Body -->
                <div class="box-body">
                    <div class="row">                                            
                        <!-- Codigo de Producción -->
                        <input type="hidden" class="form-control" id="id_produccion" name="id_produccion" value="<?php echo $produccion->id_produccion?>">
                        <!-- Codigo de Proceso -->
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('id_proceso_produccion') == true ? 'has-error':''?>">
                                <label for="id_proceso_produccion">Proceso:</label>
                                <select class="form-control select2" id="buscar_proceso_2" name="id_proceso_produccion" style="width: 100%;">
                                    <option value="">Seleccione</option>
                                    <?php foreach($procesos as $proceso):?>
                                        <option value="<?php echo $proceso->id?>"><?php echo $proceso->np;?></option>
                                    <?php endforeach;?>
                                </select>
                                <?php echo form_error("id_proceso_produccion","<span class='help-block'>","</span>");?>
                            </div>
                        </div>  
                        <input type="hidden" name="id_proceso" id="id_proceso">
                        <!-- Fecha de Trabajo -->
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('fecha_timeline') == true ? 'has-error':''?>">
                                <label for="fecha_timeline">Fecha:</label>
                                <input type="date" class="form-control" id="fecha_timeline" name="fecha_timeline" value="<?php echo date("Y-m-d");?>">
                                <?php echo form_error("fecha_timeline","<span class='help-block'>","</span>");?>
                            </div>
                        </div>
                        <!-- Unidades Trabajadas -->
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('cantidad_timeline') == true ? 'has-error':''?>">
                                <label for="cantidad_timeline">Unidades Trabajadas:</label>
                                <input type="text" class="form-control" id="cantidad_timeline" name="cantidad_timeline" onKeyPress="return soloNumeros(event)">
                                <?php echo form_error("cantidad_timeline","<span class='help-block'>","</span>");?>
                            </div>
                        </div>
                        <!-- Unidades Reprocesadas -->
                        <div class="col-md-12" id='ur'>
                            <div class="form-group <?php echo form_error('reprocesado_timeline') == true ? 'has-error':''?>">
                                <label for="reprocesado_timeline">Unidades Reprocesadas:</label>
                                <input type="text" class="form-control" id="reprocesado_timeline" name="reprocesado_timeline" value="0" onKeyPress="return soloNumeros(event)">
                                <?php echo form_error("reprocesado_timeline","<span class='help-block'>","</span>");?>
                            </div>
                        </div>
                        <!-- Comentario -->
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('incidencia_timeline') == true ? 'has-error':''?>">
                                <label for="incidencia_timeline">Incidencia:</label>
                                <input type="textarea" class="form-control" id="incidencia_timeline" name="incidencia_timeline">
                                <?php echo form_error("incidencia_timeline","<span class='help-block'>","</span>");?>
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
                        <a href="<?php echo base_url();?>movimiento/producciones/" class="btn btn-danger btn-flat">
                        <span class="fa fa-close"></span> &nbsp Cancelar</a>
                    </div>
                </div>
            </form>    
        </div>
    </section>
</div>