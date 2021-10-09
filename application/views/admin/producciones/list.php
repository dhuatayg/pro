<!-- Contenido de la Vista -->
<div class="content-wrapper">
    <!-- Cabecera -->
    <section class="content-header">
        <h1>
        Producción
        <small>Listado de Ordenes de Producción</small>
        </h1>
        <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i>Inicio</a></li>
        <li><i class="fa fa-calendar-check-o active"></i> Producción</li>
      </ol>
    </section>
    <!-- Contenido de la caja -->
    <section class="content">
        <div class="box box-success">
            <!-- Header -->
            <div class="box-header with-border">
                <div class="btn-group"> 
                    <button id="btn_pdf" class="btn bg-red btn-flat">             
                    <span class="fa fa-file-pdf-o"></span> &nbsp Exportar en PDF</button>                     
                    <button id="btn_excel" class="btn bg-green btn-flat">      
                    <span class="fa fa-file-excel-o"></span> &nbsp Exportar en Excel</button>
                </div>
            </div>
            <div class="box-body">
                <!-- Contenido de la caja -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- <div style="overflow-x:auto;"> -->
                            <!-- Tabla -->
                            <table id="tabla-produccion" class="table table-bordered" >
                                <thead>
                                    <tr>
                                        <th class="text-center">Serie</th>
                                        <!-- <th class="text-center">Pedido</th> -->
                                        <th class="text-center">Producto</th>
                                        <th class="text-center">Fecha de Inicio</th>
                                        <th class="text-center">Fecha de Fin</th>
                                        <th class="text-center">Cantidad</th>
                                        <th class="text-center">Realizado</th>
                                        <th class="text-center">Estado</th>
                                        <!-- <th class="text-center">Progreso</th> -->
                                        <th class="text-center">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if (!empty($producciones)): ?>
                                        <?php foreach($producciones as $produccion):?>
                                            <tr>
                                                <td class="text-center"><?php echo $produccion->abre_produccion;?></td>
                                                <!-- <td class="text-center">ap</td> -->
                                                <td class="text-center"><?php echo $produccion->np;?></td>                                            
                                                <td class="text-center"><?php echo $produccion->inicio_produccion;?></td>
                                                <td class="text-center"><?php echo $produccion->fin_produccion;?></td>
                                                <td class="text-center"><?php echo $produccion->cantidad_produccion;?></td>
                                                <td class="text-center"><?php echo $produccion->producido_produccion;?></td>
                                                <td class="text-center">                                            
                                                <?php   if($produccion->id_estado == "3"){ ?>
                                                    <small class="label label-default"><?php echo $produccion->ne;?></small>
                                                    </td>
                                                <?php   }elseif($produccion->id_estado == "4"){ ?>
                                                    <small class="label label-success"><?php echo $produccion->ne;?></small>
                                                    </td>
                                                <?php }elseif($produccion->id_estado == "5"){ ?>
                                                    <small class="label label-danger"><?php echo $produccion->ne;?></small>
                                                    </td>
                                                <?php }else{ ?>
                                                    <small class="label label-warning"><?php echo $produccion->ne;?></small>
                                                    </td>
                                                <?php } ?>
                                                <td class="text-center">
                                                    <?php if($produccion->id_estado == "3"){    ?>
                                                        <a href="<?php echo base_url()?>movimiento/producciones/programar/<?php echo $produccion->id_produccion."/".$produccion->id_pedido;?>" class="btn btn-default btn-xs">
                                                        <span class="glyphicon glyphicon-calendar"></span></a>
                                                    <?php }else{    ?>
                                                        <!-- Seguimiento y Control -->
                                                        <div class="btn-group"> 
                                                            <button type="button" class="btn btn-xs btn-default btn-view-produccion" data-toggle="modal" data-target="#modal-produccion" value="<?php echo $produccion->id_produccion;?>">
                                                            <span class="glyphicon glyphicon-list-alt"></span>
                                                            </button>
                                                            <a href="<?php echo base_url()?>movimiento/producciones/progreso/<?php echo $produccion->id_produccion;?>" class="btn btn-xs btn-flat btn-default"> <span class="glyphicon glyphicon-align-left"></span></a>
                                                            <a href="<?php echo base_url();?>movimiento/producciones/seguimiento/<?php echo $produccion->id_produccion;?>" class="btn btn-xs btn-flat btn-default"> <span class="glyphicon glyphicon-copy"></span></a>
                                                            <a href="<?php echo base_url();?>movimiento/producciones/timeline/<?php echo $produccion->id_produccion;?>" class="btn btn-xs btn-flat btn-default"> <span class="glyphicon glyphicon-hourglass"></span></a>
                                                        </div>
                                                    <?php }  ?>
                                                </td>
                                            </tr>
                                        <?php endforeach;?>
                                    <?php endif ?>
                                </tbody>
                            </table>
                        <!-- </div>                                  -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Modal Produccion -->
<div class="modal fade" id="modal-produccion">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Información de la Orden de Producción</h4>
            </div>
            <div class="modal-body">
                
            </div>
            <div class="modal-footer">
                <div class="btn-group">
                    <button type="button" class="btn btn-print-produccion bg-navy pull-left"><span class="glyphicon glyphicon glyphicon-print"></span>&nbsp&nbspImprimir</button>
                    <button type="button" class="btn btn-danger pull-right" data-dismiss="modal"><span class="glyphicon glyphicon glyphicon-chevron-left"></span>Volver</button>
                </div>
            </div>
        </div>
    </div>
</div>
