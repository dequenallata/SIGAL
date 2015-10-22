@extends('base')
@section('conten')
	
	<nav id="side-menu" class="col-md-2 navbar navbar-inverse custon-bar">
		<accordion class="accordion-body">
		    <accordion-group is-disabled="true">
		    	<accordion-heading>
            		<a href="/inicio" id="onlyLink"><span class="glyphicon glyphicon-home"></span> Inicio</a>
        		</accordion-heading>
		    </accordion-group>
		    <accordion-group>
		    	<accordion-heading>
            		<span class="glyphicon glyphicon-cog"></span> Administración
        		</accordion-heading>
		       <div class="enlace"><a href="/usuarios"><span class="glyphicon glyphicon-user"></span> Usuario</a></div>
		       <div class="enlace"><a href="/departamentos"><span class="glyphicon glyphicon-briefcase"></span> Departamentos</a></div>
		       <div class="enlace"><a href="/provedores"><span class="glyphicon glyphicon-folder-open"></span> Provedores</a></div>
		       <div class="enlace"><a href="/insumos"><span class="glyphicon glyphicon-th"></span> Insumos</a></div>
		       <div class="enlace"><a href="/inventario"><span class="glyphicon glyphicon-th-list"></span> Inventario</a></div>
		       <div class="enlace"><a href="/entradas"><span class="glyphicon glyphicon-circle-arrow-down"></span> Entradas</a></div>
		       <div class="enlace"><a href="/salidas"><span class="glyphicon glyphicon-circle-arrow-up"></span> Salidas</a></div>
		       {{--
		       	<div class="enlace"><a href="/presentaciones"><span class="glyphicon glyphicon-bookmark"></span> Presentaciones</a></div>
		       <div class="enlace"><a href="/secciones"><span class="glyphicon glyphicon-tags"></span> Secciones</a></div>
		       <div class="enlace"><a href="/medidas"><span class="glyphicon glyphicon-tasks"></span> Medidas</a></div>
		    	--}}
		    </accordion-group>
			
			<accordion-group>
		    	<accordion-heading>
            		<span class="glyphicon glyphicon-transfer"></span> Tranferencias
        		</accordion-heading>
		       <div class="enlace"><a href="/registrarEntrada"><span class="glyphicon glyphicon-circle-arrow-down"></span> Registro de Entrada</a></div>
		       <div class="enlace"><a href="/registrarSalida"><span class="glyphicon glyphicon-circle-arrow-up"></span> Registro de Salida</a></div>
		    </accordion-group>
		</accordion>
	</nav>

	<div id="front-page" class="col-md-10 col-md-offset-2">
		@yield('front-page')
	</div>

@endsection