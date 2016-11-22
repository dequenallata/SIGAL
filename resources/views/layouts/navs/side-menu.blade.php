<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">Manú de navegacion</li>

      <li><a href="documentation/index.html"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li> 

      {{-- Menu de administracion --}}
      @if( Auth::user()->hasPermissions(['users_consult', 'stores_consult', 'documents_consult', 'roles_consult', 'departs_consult', 'providers_consult', 'items_consult']) )
        <li class="treeview @if(Request()->is('administracion/*')) active @endif">
          <a href="#">
            <i class="glyphicon glyphicon-cog"></i> <span>Administración</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @if( Auth::user()->hasPermissions(['users_consult']))
              <li class="@if(Request()->is('administracion/usuarios')) active @endif"><a href="{{route('admin::user::index')}}"><i class="glyphicon glyphicon-user"></i> Usuario</a></li>
            @endif

            @if( Auth::user()->hasPermissions(['stores_consult']) )
              <li class="@if(Request()->is('administracion/almacenes')) active @endif"><a href="{{route('admin::almac::index')}}"><i class="glyphicon glyphicon-inbox"></i> Almacenes</a></li></li>
            @endif

            @if(Auth::user()->hasPermissions(['documents_consult']))
              <li class="@if(Request()->is('administracion/documentos')) active @endif"><a href="{{route('admin::docum::index')}}"><i class="glyphicon glyphicon-folder-close"></i> Documentos</a></li></li>
            @endif

            @if(Auth::user()->hasPermissions(['roles_consult']))
              <li class="@if(Request()->is('administracion/roles')) active @endif"><a href="{{route('admin::roles::index')}}"><i class="glyphicon glyphicon-compressed"></i> Roles</a></li></li>
            @endif

            @if( Auth::user()->hasPermissions(['departs_consult']) )
              <li class="@if(Request()->is('administracion/departamentos')) active @endif"><a href="{{route('admin::depar::index')}}"><i class="glyphicon glyphicon-briefcase"></i> Departamentos</a></li>
            @endif

            @if( Auth::user()->hasPermissions(['providers_consult']) )
              <li class="@if(Request()->is('administracion/proveedores')) active @endif"><a href="{{route('admin::prove::index')}}"><i class="glyphicon glyphicon-folder-open"></i> Proveedores</a></li>
            @endif

            @if( Auth::user()->hasPermissions(['items_consult']) )
              <li class="@if(Request()->is('administracion/insumos')) active @endif"><a href="{{route('admin::insum::index')}}"><i class="glyphicon glyphicon-th"></i> Insumos</a></li>
            @endif

          </ul>
        </li>
      @endif
  
    {{-- Menu de inventario --}}
      @if( Auth::user()->hasPermissions(['inventory_stock', 'inventory_movements', 'inventory_alerts']) )
        <li class="treeview @if(Request()->is('inventario/*')) active @endif">
          <a href="#">
            <i class="glyphicon glyphicon-th-list"></i>
            <span>Inventario</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @if( Auth::user()->hasPermissions(['inventory_stock']) )
              <li class="@if(Request()->is('inventario/existencia')) active @endif"><a href="{{route('inven::index')}}"><i class="glyphicon glyphicon-equalizer"></i> Existencia</a></li>
            @endif

            @if( Auth::user()->hasPermissions(['inventory_movements']) )
              <li class="@if(Request()->is('inventario/entradas')) active @endif"><a href="{{route('inven::entr::index')}}"><i class="glyphicon glyphicon-circle-arrow-down"></i> Entradas</a></li>
            @endif

            @if( Auth::user()->hasPermissions(['inventory_movements']) )
              <li class="@if(Request()->is('inventario/salidas')) active @endif"><a href="{{route('inven::sali::index')}}"><i class="glyphicon glyphicon-circle-arrow-up"></i> Salidas</a></li>
            @endif

            @if( Auth::user()->hasPermissions(['inventory_alerts']) )
              <li class="@if(Request()->is('inventario/alertas')) active @endif"><a href="{{route('inven::alerts::index')}}"><i class="glyphicon glyphicon-bell"></i> Alarmas</a></li>
            @endif

            @if( Auth::user()->hasPermissions(['inventory_modifications']) )
              <li class="@if(Request()->is('inventario/modificaciones')) active @endif"><a href="{{route('inven::modif::index')}}"><i class="glyphicon glyphicon-edit"></i> Modificaciones</a></li>
            @endif

            <li class="@if(Request()->is('inventario/estadisticas')) active @endif"><a href="/estadisticas"><i class="glyphicon glyphicon-tasks"></i> 
              Estadisticas</a></li>
          </ul>
        </li>
      @endif

      {{-- Menu de transferencias --}}
      @if( Auth::user()->hasPermissions(['movements_register_entry', 'movements_register_egress']) )
        <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-transfer"></i>
            <span>Tranferencias</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @if( Auth::user()->hasPermissions(['movements_register_entry']) )
              <li><a href="{{route('inven::entr::registrar')}}"><i class="glyphicon glyphicon-circle-arrow-down"></i> Registro de Entrada</a></li>
            @endif

            @if( Auth::user()->hasPermissions(['movements_register_egress']) )
              <li><a href="/registrarSalida"><i class="glyphicon glyphicon-circle-arrow-up"></i> Registro de Salida</a></li>
            @endif 
          </ul>
        </li>
      @endif
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>