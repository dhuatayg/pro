<!-- Contenido de la Vista -->
<div class="content-wrapper">
    <!-- Cabecera -->
    <section class="content-header">
        <h1>
        Producción
        <small>Timeline</small>
        </h1>
        <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i>Inicio</a></li>
        <li><i class="fa fa-calendar-check-o"></i> Producción</li>
        <li class="active">Timeline</li>
      </ol>
    </section>
    <!-- Cuerpo de la caja -->
    <section class="content">
        <div class="box box-success">
            <!-- Header -->
            <div class="box-header with-border">
                <h3 class="box-title">Linea de Tiempo de la Orden de Producción Nº <?php echo $produccion->id;?></h3>
            </div>
            <!-- Body -->
            <div class="box-body">
                <div class="row">                                            
                    <!-- Incio del Timeline -->
                    <div class="col-md-12">
                      <!-- The time line -->
                      <ul class="timeline">
                        <!-- timeline time label -->
                        <?php if(!empty($timelines)):?>
                            <?php foreach($timelines as $timeline):?>
                                <!-- Fecha -->
                                <?php 
                                    $fecha_validador = $timeline;
                                ?>
                                <li class="time-label">
                                      <span class="bg-red">
                                          <?php echo $timeline->fe;?>
                                      </span>
                                </li>
                                <!-- Contenido -->
                                <li>
                                    <i class="glyphicon glyphicon-wrench bg-default"></i>
                                    <div class="timeline-item">
                                        <span class="time"><i class="glyphicon glyphicon-home"></i>&nbsp<?php echo $timeline->ar;?></span>
                                        <h3 class="timeline-header"><b><?php echo $timeline->no;?></b> se realizo lo siguiente:</h3>
                                        <div class="timeline-body">
                                            <b>Unidades Trabajadas :</b> <?php echo $timeline->ca.'.';?> <br>
                                            <?php   if($timeline->ip == 19){    ?>
                                                <b>Unidades Reprocesadas :</b> <?php echo $timeline->re.'.';?> <br>
                                            <?php   }else{  }   ?>                                          
                                            <b>Incidencias :</b> <?php echo $timeline->in.'.';?>
                                        </div>
                                        <!-- <div class="timeline-footer">
                                        <td class="text-center">
                                                <div class="btn-group">
                                                    <a href="<?php echo base_url();?>movimiento/producciones/seguimiento/<?php echo $timeline->id;?>" class="btn btn-xs btn-warning">
                                                    <span class="glyphicon glyphicon-edit"></span></a>
                                                    <a href="<?php echo base_url();?>movimiento/producciones/seguimiento/<?php echo $timeline->id;?>" class="btn  btn-xs btn-danger btn-remove">
                                                    <span class="glyphicon glyphicon-trash"></span></a>
                                                </div>
                                            </td> 
                                        </div> -->
                                    </div>
                                </li>
                            <?php endforeach;?>
                        <?php endif;?>
                        <!-- Inicio -->
                        <li>
                            <i class="fa fa-clock-o bg-gray"></i>                     
                        </li>                         
                      </ul>
                    </div>
                    <!-- END del Timeline -->
                </div>     
            </div>
            <!-- Footer -->
            <div class="box-footer">
                <div class="btn-group"> 
                    <a href="<?php echo base_url();?>movimiento/producciones/" class="btn btn-success btn-flat">
                    <span class="glyphicon glyphicon-chevron-left"></span> &nbsp Volver</a>
                </div> 
            </div>   
        </div>
    </section>
</div>