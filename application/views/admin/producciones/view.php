<div class="row">
	<div class="col-xs-12">	

	<p><b>	Datos de la Orden de Produccion : </b></p>

	<table class="table table-striped">
		<tbody>
			<tr>
				<td><b>Codigo:</b></td>
				<td><?php echo $produccion->abre_produccion;?></td>
				<td><b>Producto:</b></td>
				<td><?php echo $produccion->np;?></td>
			</tr>
			<tr>
				<td><b>Pedido:</b></td>
				<td><?php echo $produccion->ap;?></td>
				<td><b>Cantidad:</b></td>
				<td><?php echo $produccion->cantidad_produccion;?></td>
			</tr>
			<tr>
				<td><b>Fecha Inicio:</b></td>
				<td><?php echo $produccion->inicio_produccion;?></td>
				<td><b>Fecha Fin:</b></td>
				<td><?php echo $produccion->fin_produccion;?></td>
			</tr>
			<tr>
				<td><b>Estado:</b></td>
				<td>                                            
						<?php   if($produccion->id_estado == "3"){ ?>
							<small class="label label-default">SIN PROGRAMAR</small>
							</td>
						<?php   }elseif($produccion->id_estado == "4"){ ?>
							<small class="label label-success">TERMINADO</small>
							</td>
						<?php }elseif($produccion->id_estado == "5"){ ?>
							<small class="label label-danger">CANCELADO</small>
							</td>
						<?php }else{ ?>
							<small class="label label-warning">EN PRODUCCIÓN</small>
							</td>
						<?php } ?>
                <td class="text-center">
			</tr>			
		</tbody>
	</table>

	<p><b>	Materiales: </b></p>

	<table class="table table-bordered table-striped dataTable" role="grid">
			<thead>
				<tr>
					<th class="text-center">Código</th>
					<th class="text-center">Nombre</th>
					<th class="text-center">Unidad</th>
					<th class="text-center">Stock</th>
				</tr>
			</thead>
			<tbody>
				<?php if(!empty($materiales)):?>
					<?php foreach($materiales as $material):?>
						<tr>
							<td class="text-center"><?php echo $material->am;?></td>
							<td class="text-center"><?php echo $material->nm;?></td>  
							<td class="text-center"><?php echo $material->um;?></td>
							<td class="text-center"><?php echo $material->sm;?></td>     
						</tr>
					<?php endforeach;?>
				<?php endif;?>
			</tbody>
	</table>
	
	<p><b>	Trabajo: </b></p>

	<table class="table table-bordered table-striped dataTable" role="grid">
			<thead>
				<tr>
					<th class="text-center">Fecha</th>
					<th class="text-center">Empleados</th>
					<th class="text-center">Horas trabajas</th>
					<th class="text-center">Tasa por hora</th>
					<th class="text-center">Monto</th>
				</tr>
			</thead>
			<tbody>
				<?php if(!empty($trabajos)):?>
					<?php foreach($trabajos as $trabajo):?>
						<tr>
							<td class="text-center"><?php echo $trabajo->fecha_trabajo;?></td>  
							<td class="text-center"><?php echo $trabajo->nempleados_trabajo;?></td>
							<td class="text-center"><?php echo $trabajo->horas_trabajo;?></td>  
							<td class="text-center"><?php echo $trabajo->tasa_trabajo;?></td> 
							<td class="text-center"><?php echo $trabajo->monto_trabajo;?></td>
						</tr>
					<?php endforeach;?>
				<?php endif;?>
			</tbody>
    </table>

	<p><b>	Gastos Indirectos: </b></p>

	<table class="table table-bordered table-striped dataTable" role="grid">
			<thead>
				<tr>
					<th class="text-center">Motivo</th>
					<th class="text-center">Valor</th>
				</tr>
			</thead>
			<tbody>
				<?php if(!empty($indirectos)):?>
					<?php foreach($indirectos as $indirecto):?>
						<tr>
							<td class="text-center"><?php echo $indirecto->descripcion_gasto;?></td>
							<td class="text-center"><?php echo $indirecto->valor_gasto;?></td>      
						</tr>
					<?php endforeach;?>
				<?php endif;?>
			</tbody>
    </table>

	<hr>

	<table class="table table-bordered table-striped dataTable" role="grid">
		<tbody>
			<tr>
				<td><b>Materiales:</b></td>
				<td><?php echo $produccion->monto_material_produccion;?></td>
				<td><b>Trabajo:</b></td>
				<td><?php echo $produccion->monto_trabajo_produccion;?></td>
				<td><b>G. Indirectos:</b></td>
				<td><?php echo $produccion->monto_indirecto_produccion;?></td>
				<td><b>Total:</b></td>
				<td><?php echo $produccion->total_produccion;?></td>
			</tr>			
		</tbody>
	</table>

	</div>
</div>
