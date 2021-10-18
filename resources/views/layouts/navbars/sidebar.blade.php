<div class="sidebar" data-color="orange">
  <!--
    Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
-->
  <div class="logo">
    <a href="http://www.creative-tim.com" class="simple-text logo-mini">
      {{ __('CT') }}
    </a>
    <a href="http://www.creative-tim.com" class="simple-text logo-normal">
      {{ __('Creative Tim') }}
    </a>
  </div>
  <div class="sidebar-wrapper" id="sidebar-wrapper">
    <ul class="nav">
      <li class="@if ($activePage == 'home') active @endif">
        <a href="{{ route('home') }}">
          <i class="now-ui-icons design_app"></i>
          <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
      <li class="@if ($activePage == 'roles') active @endif">
        <a href="{{ route('roles.index') }}">
          <i class="now-ui-icons design_app"></i>
          <p>{{ __('Roles') }}</p>
        </a>
      </li>
      <li class="@if ($activePage == 'permisos') active @endif">
        <a href="{{ route('permissions.index') }}">
          <i class="now-ui-icons design_app"></i>
          <p>{{ __('Permisos') }}</p>
        </a>
      </li>
      <li>
        <a data-toggle="collapse" href="#laravelExamples">
            <i class="fab fa-laravel"></i>
          <p>
            {{ __("Laravel Examples") }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="laravelExamples">
          <ul class="nav">
            <li class="@if ($activePage == 'profile') active @endif">
              <a href="#">
                <i class="now-ui-icons users_single-02"></i>
                <p> {{ __("User Profile") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'users') active @endif">
              <a href="#">
                <i class="now-ui-icons design_bullet-list-67"></i>
                <p> {{ __("User Management") }} </p>
              </a>
            </li>
          </ul>
        </div>
      <li class="@if ($activePage == 'usuarios') active @endif">
        <a href="{{ route('usuarios.index') }}">
          <i class="now-ui-icons education_atom"></i>
          <p>{{ __('Usuarios') }}</p>
        </a>
      </li>
      <li class="@if ($activePage == 'proveedores') active @endif">
        <a href="{{ route('proveedores.index') }}">
          <i class="now-ui-icons education_atom"></i>
          <p>{{ __('Proveedores') }}</p>
        </a>
      </li>
      <li class="@if ($activePage == 'clientes') active @endif">
        <a href="{{ route('clientes.index') }}">
          <i class="now-ui-icons education_atom"></i>
          <p>{{ __('Clientes') }}</p>
        </a>
      </li>
      <li class = "@if ($activePage == 'tipoMateriales') active @endif">
        <a href="{{ route('tipoMateriales.index') }}">
          <i class="now-ui-icons location_map-big"></i>
          <p>{{ __('Tipo Materiales') }}</p>
        </a>
      </li>
      <li class = " @if ($activePage == 'salidas') active @endif">
        <a href="{{ route('salidas.index') }}">
          <i class="now-ui-icons ui-1_bell-53"></i>
          <p>{{ __('Salidas') }}</p>
        </a>
      </li>
      <li class = " @if ($activePage == 'salidaMaterial') active @endif">
        <a href="{{ route('salidaMateriales.index') }}">
          <i class="now-ui-icons ui-1_bell-53"></i>
          <p>{{ __('Salida Material') }}</p>
        </a>
      </li>
      <li class = " @if ($activePage == 'obras') active @endif">
        <a href="{{ route('obras.index') }}">
          <i class="now-ui-icons design_bullet-list-67"></i>
          <p>{{ __('Obras') }}</p>
        </a>
      </li>
      <li class = " @if ($activePage == 'materiales') active @endif">
        <a href="{{ route('materiales.index') }}">
          <i class="now-ui-icons design_bullet-list-67"></i>
          <p>{{ __('Materiales') }}</p>
        </a>
      </li>
      <li class = " @if ($activePage == 'marcas') active @endif">
        <a href="{{ route('marcas.index') }}">
          <i class="now-ui-icons design_bullet-list-67"></i>
          <p>{{ __('Marcas') }}</p>
        </a>
      </li>
      <li class = " @if ($activePage == 'entradas') active @endif">
        <a href="{{ route('entradas.index') }}">
          <i class="now-ui-icons design_bullet-list-67"></i>
          <p>{{ __('Entradas') }}</p>
        </a>
      </li>
      <li class = " @if ($activePage == 'entradaMateriales') active @endif">
        <a href="{{ route('entradaMateriales.index') }}">
          <i class="now-ui-icons design_bullet-list-67"></i>
          <p>{{ __('entrada Materiales') }}</p>
        </a>
      </li>
      <li class = "@if ($activePage == 'categorias') active @endif">
        <a href="{{ route('categorias.index') }}">
          <i class="now-ui-icons text_caps-small"></i>
          <p>{{ __('Categorias') }}</p>
        </a>
      </li>
      <li class = "">
        <a href="#" class="bg-info">
          <i class="now-ui-icons arrows-1_cloud-download-93"></i>
          <p>{{ __('Upgrade to PRO') }}</p>
        </a>
      </li>
    </ul>
  </div>
</div>
