<div class="sidebar" data-color="orange">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
  -->
    <div class="logo">
      {{-- <a href="#" class="simple-text logo-mini">

      </a> --}}
      {{-- <a href="#" class="simple-text logo-normal">
          <img src="{{asset('/img/nuevo.png')}}" alt="">
      </a> --}}
    </div>
    <div class="sidebar-wrapper" id="sidebar-wrapper">
      <ul class="nav">
        <li class="@if ($activePage == 'home') active @endif">
          <a href="{{ route('home') }}">
            <i class="now-ui-icons design_app"></i>
            <p>{{ __('Dashboard') }}</p>
          </a>
        </li>
        <hr>
        @can('roles.index')
        <li class="@if ($activePage == 'roles') active @endif">
          <a href="{{ route('roles.index') }}">
            <i class="now-ui-icons design_app"></i>
            <p>{{ __('Roles') }}</p>
          </a>
        </li>
        @endcan
        @can('permisos.index')
        <li class="@if ($activePage == 'permisos') active @endif">
          <a href="{{ route('permissions.index') }}">
            <i class="now-ui-icons design_app"></i>
            <p>{{ __('Permisos') }}</p>
          </a>
        </li>
        @endcan

          @can('usuarios.index')
        <li class="@if ($activePage == 'usuarios') active @endif">
          <a href="{{ route('usuarios.index') }}">
            <i class="now-ui-icons education_atom"></i>
            <p>{{ __('Usuarios') }}</p>
          </a>
        </li>
        @endcan
        @can('proveedores.index')
        <li class="@if ($activePage == 'proveedores') active @endif">
          <a href="{{ route('proveedores.index') }}">
            <i class="now-ui-icons education_atom"></i>
            <p>{{ __('Proveedores') }}</p>
          </a>
        </li>
        @endcan
        @can('clientes.index')
        <li class="@if ($activePage == 'clientes') active @endif">
          <a href="{{ route('clientes.index') }}">
            <i class="now-ui-icons education_atom"></i>
            <p>{{ __('Clientes') }}</p>
          </a>
        </li>
        @endcan
        <hr>
        <h6 style="color:#fff; text-align:center">Configuración Inicial</h6>
        <hr>
        @can('tipoMateriales.index')
        <li class = "@if ($activePage == 'tipoMateriales') active @endif">
          <a href="{{ route('tipoMateriales.index') }}">
            <i class="now-ui-icons location_map-big"></i>
            <p>{{ __('Tipo Materiales') }}</p>
          </a>
        </li>
        @endcan
        @can('marcas.index')
        <li class = " @if ($activePage == 'marcas') active @endif">
          <a href="{{ route('marcas.index') }}">
            <i class="now-ui-icons design_bullet-list-67"></i>
            <p>{{ __('Marcas') }}</p>
          </a>
        </li>
        @endcan
        @can('categorias.index')
        <li class = " @if ($activePage == 'categorias') active @endif">
          <a href="{{ route('categorias.index') }}">
            <i class="now-ui-icons design_bullet-list-67"></i>
            <p>{{ __('Categorias') }}</p>
          </a>
        </li>
        @endcan
        <hr>
        <h6 style="color:#fff; text-align:center">OPERACIÓN</h6>
        <hr>

        @can('obras.index')
        <li class = " @if ($activePage == 'obras') active @endif">
          <a href="{{ route('obras.index') }}">
            <i class="now-ui-icons design_bullet-list-67"></i>
            <p>{{ __('Obras') }}</p>
          </a>
        </li>
        @endcan
        @can('materiales.index')
        <li class = " @if ($activePage == 'materiales') active @endif">
          <a href="{{ route('materiales.index') }}">
            <i class="now-ui-icons design_bullet-list-67"></i>
            <p>{{ __('Materiales') }}</p>
          </a>
        </li>
        @endcan
        @can('entradas.index')
        <li class = " @if ($activePage == 'entradas') active @endif">
          <a href="{{ route('entradas.index') }}">
            <i class="now-ui-icons design_bullet-list-67"></i>
            <p>{{ __('Entradas') }}</p>
          </a>
        </li>
        @endcan
        @can('entradaMateriales.index')
        <li class = " @if ($activePage == 'entradaMateriales') active @endif">
          <a href="{{ route('entradaMateriales.index') }}">
            <i class="now-ui-icons design_bullet-list-67"></i>
            <p>{{ __('entrada Materiales') }}</p>
          </a>
        </li>
        @endcan

        @can('salidas.index')
        <li class = " @if ($activePage == 'salidas') active @endif">
          <a href="{{ route('salidas.index') }}">
            <i class="now-ui-icons ui-1_bell-53"></i>
            <p>{{ __('Salidas') }}</p>
          </a>
        </li>
        @endcan
        @can('salidasMateriales.index')
        <li class = " @if ($activePage == 'salidaMaterial') active @endif">
          <a href="{{ route('salidaMateriales.index') }}">
            <i class="now-ui-icons ui-1_bell-53"></i>
            <p>{{ __('Salida Material') }}</p>
          </a>
        </li>
        @endcan



        @can('categorias')
        <li class = "@if ($activePage == 'categorias') active @endif">
          <a href="{{ route('categorias.index') }}">
            <i class="now-ui-icons text_caps-small"></i>
            <p>{{ __('Categorias') }}</p>
          </a>
        </li>
        @endcan

      </ul>
    </div>
  </div>
