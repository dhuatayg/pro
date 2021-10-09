<div class="row">
<div class="col-xs-12">	
<table class="table table-bordered table-striped dataTable" role="grid">
			<tbody>
				<tr>
					<td><b>Nro Documento:</b></td>
					<td><?php echo $pedido->doc;?></td>
					<td><b>Serie:</b></td>
					<td><?php echo $pedido->abre_pedido;?></td>
				</tr>
				<tr>
					<td><b>Nombre:</b></td>
					<td><?php echo $pedido->nom;?></td>
					<td><b>Fecha Emisión:</b></td>
					<td><?php echo $pedido->fecha_pedido;?></td>
				</tr>
				<tr>
					<td><b>Teléfono:</b></td>
					<td><?php echo $pedido->tel;?></td>
					<td><b>Fecha Entrega:</b></td>
					<td><?php echo $pedido->entrega_pedido;?></td>
				</tr>
				<tr>
					<td><b>Correo:</b></td>
					<td><?php echo $pedido->cor;?></td>
					<td><b>Estado:</b></td>
					<td><?php echo $pedido->es;?></td>

				</tr>
			</tbody>
</table>
</div>
</div>
<b>Detalle del Pedido:</b>
<div class="row">
	<div class="col-xs-12">
		<table id="tabla-pedido" class="table table-bordered table-striped dataTable" role="grid">
			<thead>
				<tr>
					<th class="text-center">Codigo</th>
					<th class="text-center">Nombre</th>
					<th class="text-center">Cantidad</th>
					<th class="text-center">Precio</th>
					<th class="text-center">Importe</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($detalles as $detalle):?>
				<tr>
					<td class="text-center"><?php echo $detalle->codigo;?></td>
					<td class="text-center"><?php echo $detalle->producto;?></td>
					<td class="text-center"><?php echo $detalle->cantidad_detallepedido;?></td>
					<td class="text-center"><?php echo $detalle->precio_detallepedido;?></td>
					<td class="text-center"><?php echo $detalle->importe_detallepedido;?></td>
				</tr>
				<?php endforeach;?>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="4" class="text-right"><strong>Total:</strong></td>
					<td class="text-center"><?php echo $pedido->monto_pedido;?></td>
				</tr>
			</tfoot>
		</table>
	</div>
</div>