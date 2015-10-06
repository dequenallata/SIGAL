<div class="modal-header">
    <h3 style="color:#54AF54;" class="modal-title">
    	<span class="glyphicon glyphicon-circle-arrow-up"></span> Pro-Forma de Pedido: <strong>{#salida.codigo#}</strong></h3>
</div>
<div class="modal-body">
	
	<table class="table table-bordered custon-table-bottom-off" >
		<thead>
			<tr>
				<th class="col-md-1">Fecha</th>
				<th class="col-md-1">Hora</th>
				<th>Servicio</th>
				<th class="col-md-3">Usuario</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>{#salida.fecha#}</td>
				<td>{#salida.hora#}</td>
				<td>{#salida.departamento#}</td>
				<td>{#salida.usuario#}</td>
			</tr>
		</tbody>	
	</table>

	<table class="table table-striped custon-table-top-off">
		<thead>
			<tr>
				<th class="col-md-2">Codigo</th>
				<th>Descripcion</th>
				<th class="col-md-1">Solicitado</th>
				<th class="col-md-1">Despachado</th>
			</tr>
		</thead>
		<tbody>
			<tr ng-repeat="insumo in insumos">
				<td>{#insumo.codigo#}</td>
				<td>{#insumo.descripcion#}</td>
				<td>{#insumo.solicitado#}</td>
				<td>{#insumo.despachado#}</td>
			</tr>
		</tbody>
	</table>

</div>
<div class="modal-footer">
    <button class="btn btn-warning" ng-click="cancelar()"><span class="glyphicon glyphicon-remove-sign"></span> Cerrar</button>
</div>