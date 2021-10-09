<!-- Contenido de la Vista -->
<div class="content-wrapper">
    <!-- Cabecera -->
    <section class="content-header">
        <h1>
        Producción
        <small>Progreso</small>
        </h1>
        <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i>Inicio</a></li>
        <li><i class="fa fa-calendar-check-o"></i> Producción</li>
        <li><i class="active"></i> Progreso</li>
      </ol>
    </section>
    <!-- Contenido de la caja -->
    <section class="content">
        <div class="box box-success">
            <!-- Header -->
            <div class="box-header with-border">
                <h3 class="box-title">Información del progreso de la orden Nº <?php echo $produccion->id;?></h3>
            </div>
            <div class="box-body">
                <!-- Contenido de la caja -->
                <div class="row">                  
                    <div class="col-md-12">
                        <!-- Tabla -->
                        <table id="tabla-progreso" class="table table-bordered table-striped dataTable" role="grid">
                            <thead>
                                <tr> 
                                    <th class="text-center">Fase</th>
                                    <th class="text-center">Proceso</th>
                                    <th class="text-center">Producido</th>
                                    <th class="text-center">Total</th>
                                    <th class="text-center">% Completado</th>
                                    <th class="text-center">Progreso</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  $valor = 1; ?>
                                <?php if(!empty($proceso_producciones)):?>             
                                    <?php foreach($proceso_producciones as $proceso_produccion):?>
                                        <tr>                                  
                                            <!-- Items de la tabla -->
                                            <td class="text-center"><?php echo $valor;?></td>
                                            <td class="text-center"><?php echo $proceso_produccion->n;?></td>
                                            <td class="text-center"><?php echo $proceso_produccion->r;?></td>
                                            <td class="text-center"><?php echo $proceso_produccion->t;?></td>
                                            
                                            <td class="text-center"><?php echo number_format($proceso_produccion->p, 2, '.', '').' %';?></td>
                                            <td class="text-center">
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="<?php echo $proceso_produccion->p;?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $proceso_produccion->p.'%';?>">
                                                </div>
                                            </td>
                                        </tr>
                                    <?php 
                                        $valor++;
                                        endforeach;
                                    ?>
                                <?php 
                                    endif;
                                ?>
                            </tbody>
                        </table>
                    </div>
   
                </div>
            </div>
            <div class="box-footer">                 
                <!-- Cajón de Opciones -->
                <div class="btn-group"> 
                    <a href="<?php echo base_url();?>movimiento/producciones/" class="btn btn-danger btn-flat">
                    <span class="glyphicon glyphicon-chevron-left"></span> &nbsp Volver</a>
                </div>                       
            </div>
        </div>
    </section>
</div>
