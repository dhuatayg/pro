<div class="content-wrapper">
    <section class="content-header">
        <h1>
        Producción
        <small>Editar Planificación de Producción</small>
        </h1>
        <ol class="breadcrumb">
        <li><i class="fa fa-home"></i> Inicio</<i></li>
        <li><i class="fa fa-gear"></i> Producción</a></li>
        <li class="active">Editar Planificación de Producción máquinas</li>
      </ol>
    </section>
    <section class="content">
        <div class="box box-default">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <?php if($this->session->flashdata("error")):?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>
                                
                             </div>
                        <?php endif;?>

            <form action="<?php echo base_url();?>movimiento/producciones/new" method="POST" class="form-horizontal">

                <input type="hidden" value="<?php echo $produccion->id_produccion;?>" name="id_produccion">
               
                <div class="form-group">

                    <div class="col-md-3">
                        <label for="abre_produccion">Orden de Producción:</label>
                        <input type="text" class="input-sm form-control" readonly="readonly" id="abre_produccion" name="abre_produccion" value="<?php echo $produccion->abre_produccion?>">
                        <?php echo form_error("abre_produccion","<span class='help-block'>","</span>");?>
                    </div>

                    <div class="col-md-3">
                        <label for="abre_pedido">Orden de Pedido:</label>
                        <input type="text" class="input-sm form-control" readonly="readonly" id="abre_pedido" name="abre_pedido" value="<?php echo $produccion->pedidoss?>">
                        <?php echo form_error("abre_pedido","<span class='help-block'>","</span>");?>
                    </div>

                    <div class="col-md-3">
                        <label for="abre_pedido">Producto:</label>
                        <input type="text" class="input-sm form-control" readonly="readonly" id="abre_pedido" name="abre_pedido" value="<?php echo $produccion->productoss?>">
                        <?php echo form_error("abre_pedido","<span class='help-block'>","</span>");?>
                    </div>

                    <div class="col-md-3">
                        <label for="cantidad_produccion">Cantidad a producir:</label>
                        <input type="text" class="input-sm form-control" readonly="readonly" id="cantidad_produccion" name="cantidad_produccion" value="<?php echo $produccion->cantidad_produccion?>">
                        <?php echo form_error("cantidad_produccion","<span class='help-block'>","</span>");?>
                    </div>

                </div>

                <div class="form-group">

                    <div class="col-md-3">
                        <label for="inicio_produccion">Inicio de producción:</label>
                        <input type="date" class="input-sm form-control" id="inicio_produccion" name="inicio_produccion" value="<?php echo $produccion->inicio_produccion?>" required>
                        <?php echo form_error("inicio_produccion","<span class='help-block'>","</span>");?>
                    </div>
                    <div class="col-md-3">
                        <label for="fin_produccion">Fin de producción:</label>
                        <input type="date" class="input-sm form-control" id="fin_produccion" name="fin_produccion" value="<?php echo $produccion->fin_produccion?>" required>
                        <?php echo form_error("fin_produccion","<span class='help-block'>","</span>");?>
                    </div>
                    <div class="col-md-3">
                        <label for="fin_produccion">Estado producción:</label>
                        <input type="date" class="input-sm form-control" id="fin_produccion" name="fin_produccion" value="<?php echo $produccion->fin_produccion?>" required>
                        <?php echo form_error("fin_produccion","<span class='help-block'>","</span>");?>
                    </div>

                </div>

                <hr>

                <div class="nav-tabs-custom">

            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">
              <span class="fa fa-tags"></span>&nbsp Materiales</a></li>
              <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">
              <span class="fa fa-refresh"></span>&nbsp Procesos</a></li>
              <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">
              <span class="fa fa-fire"></span>&nbsp Maquinas</a></li>
              <li class=""><a href="#tab_4" data-toggle="tab" aria-expanded="false">
              <span class="fa fa-user"></span>&nbsp Trabajo</a></li>
              <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
            </ul>

            <div class="tab-content">

              <div class="tab-pane active" id="tab_1">
              <table id="tab_prmaterial" class="table table-bordered table-striped dataTable" role="grid">
                            <thead>
                                <tr>
                                    <th class="text-center">Código</th>
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Unidad Medida</th>
                                    <th class="text-center">Stock</th>
                                    <th class="text-center">Cantidad Necesaria</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($materiales)):?>
                                    <?php foreach($materiales as $material):?>
                                        <tr>
                                            <td class="text-center"><?php echo $material->cod;?></td>
                                            <td class="text-center"><?php echo $material->nom;?></td>
                                            <td class="text-center"><?php echo $material->uni;?></td>
                                            <td class="text-center"><?php echo $material->sto;?></td>
                                            <td class="text-center"><?php echo $material->nec;?></td>      
                                        </tr>
                                    <?php endforeach;?>
                                <?php endif;?>
                            </tbody>
                        </table>
               
              </div>

              <div class="tab-pane" id="tab_2">
              <table id="tab_prproceso" class="table table-bordered table-striped dataTable" role="grid">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>                            
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Descripcion</th>
                                    <th class="text-center">Area</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($procesos)):?>
                                    <?php foreach($procesos as $proceso):?>
                                        <tr>
                                            <td class="text-center"><?php echo $proceso->id;?></td>           
                                            <td class="text-center"><?php echo $proceso->nom;?></td>
                                            <td class="text-center"><?php echo $proceso->des;?></td>
                                            <td class="text-center"><?php echo $proceso->are;?></td>
                                            <td class="text-center">
                                        </tr>
                                    <?php endforeach;?>
                                <?php endif;?>
                            </tbody>
                        </table>

              </div>

              <div class="tab-pane" id="tab_3">
              <table id="tab_prmaquina" class="table table-bordered table-striped dataTable" role="grid">
                            <thead>
                                <tr>     
                                    <th class="text-center">#</th>  
                                    <th class="text-center">Código</th>   
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Descripción</th>
                                    <th class="text-center">Área</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($maquinas)):?>
                                    <?php foreach($maquinas as $maquina):?>
                                        <tr>
                                            <td class="text-center"><?php echo $maquina->num;?></td>
                                            <td class="text-center"><?php echo $maquina->cod;?></td>      <td class="text-center"><?php echo $maquina->nom;?></td>
                                            <td class="text-center"><?php echo $maquina->des;?></td>
                                            <td class="text-center"><?php echo $maquina->are;?></td>
                                        </tr>
                                    <?php endforeach;?>
                                <?php endif;?>
                            </tbody>
                        </table>

              </div>

              <div class="tab-pane" id="tab_4">

              

              </div>




            </div>
          </div>

                <div class="btn-group">
                    <button type="submit" class="btn btn-sm bg-green btn-flat">
                    <span class="fa fa-check"></span> &nbsp Guardar</button>
                    <a href="<?php echo base_url();?>movimiento/producciones/" class="btn btn-danger btn-sm btn-flat">
                    <span class="fa fa-close"></span> &nbsp Cancelar</a>
                </div>
            </form>

                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
