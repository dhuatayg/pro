<div class="content-wrapper">
    <section class="content-header">
        <h1>
        Reporte
        <small>Reproceso</small>
        </h1>
        <ol class="breadcrumb">
        <li><i class="fa fa-home"></i> Inicio</<i></li>
        <li><i class="fa fa-gear"></i> Reportes</a></li>
        <li class="active">Reproceso</li>
      </ol>
    </section>
    <section class="content">
        <div class="box box-default">
            <div class="box-body">
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-3">
                            <label for="inicio_busqueda">Inicio de busqueda:</label>
                            <input type="date" class="input-sm form-control" id="inicio_busqueda" name="inicio_busqueda" value="<?php echo date("Y-m-d");?>" required>
                            <?php echo form_error("inicio_busqueda","<span class='help-block'>","</span>");?>
                        </div>
                        <div class="col-md-3">
                            <label for="fin_busqueda">Fin de busqueda:</label>
                            <input type="date" class="input-sm form-control" id="fin_busqueda" name="fin_busqueda" value="<?php echo date("Y-m-d");?>" required>
                            <?php echo form_error("fin_busqueda","<span class='help-block'>","</span>");?>
                        </div>
                        <div class="col-md-2">
                            <label for="">Busqueda</label>
                            <button type="button" id="busqueda_pedido" class="btn bg-green input-sm btn-flat form-control">
                            <span class="glyphicon glyphicon-search"></span> &nbsp Buscar</button>
                        </div>
                    </div>
                </div>  
<hr>
                <div class="row">
                    <div class="col-md-12">
                       
                        <div id="dpedido" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

                    </div>
                </div> 

                <div class="row" id="divresultado1">
                    <div align="center" class="col-md-12">
                        <div class="form-group">
                            <h4>En el grafico podemos observar que durante la fecha <strong id="q"></strong> al  <strong id="w"></strong> el reproceso es de <strong id="e"></strong> %</h4>
                        </div>
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
