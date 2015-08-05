@extends('panel')
@section('bodytag', 'ng-controller="departamentosController"')
@section('addscript')
<script src="{{asset('js/departamentosController.js')}}"></script>
@endsection

@section('front-page')

	<h5 class="text-muted">
		<span class="glyphicon glyphicon-cog"></span> Administración > 
		<span class="glyphicon glyphicon-briefcase"></span> Departamentos
	</h5>
	<br>
			
	<a href="/registrarDepartamento"><button class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Nuevo Departamento</button></a>
	
	<br>
	<br>
	<br>

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="input-group">
		  		<span class="input-group-addon btn-success text-white"><span class="glyphicon glyphicon-search"></span></span>
		  		<input type="text" class="form-control" ng-model="busqueda">
			</div>
		</div>
	</div>

	<br>
	<br>

	<table class="table table-bordered table-hover">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Division</th>
				<th>Sello</th>
				<th>Firma</th>
				<th class="table-edit">Editar</th>
			</tr>
		</thead>
		<tbody>
			<tr dir-paginate="departamento in departamentos | filter:busqueda | itemsPerPage:2">
				<td>{#departamento.nombre#}</td>
				<td>{#departamento.division#}</td>
				<td><img src="/files/sellos/{#departamento.sello#}"class="img-thumbnail"  style="width:304px; height:236px"></td>
				<td><img src="/files/firmas/{#departamento.firma#}"class="img-thumbnail"  style="width:304px; height:236px"></td>
				<td class="table-edit"><button class="btn btn-danger" ng-click="eliminarDepartamento(departamento.id)"><span class="glyphicon glyphicon-remove"></span> Eliminar</button></td>
			</tr>
		</tbody>
	</table>

	<div>
      <div class="text-center">
     	 <dir-pagination-controls boundary-links="true" on-page-change="pageChangeHandler(newPageNumber)" template-url="{{asset('/template/dirPagination.tpl.html')}}"></dir-pagination-controls>
      </div>
    </div>



@endsection

