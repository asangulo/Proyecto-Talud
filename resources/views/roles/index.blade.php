@extends('layouts.main', [
    'namePage' => 'roles',
    'class' => 'sidebar-mini',
    'activePage' => 'roles',
  ])

@section('content')
  <div class="panel-header panel-header-sm">
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="text-right">
              <a href="{{ route('roles.create') }}" class="btn btn-sm btn-primary">Añadir Rol</a>
            </div>
            <h4 class="card-title"> Roles </h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Guard</th>
                    <th>Permisos</th>
                  <th class="text-right">Acciones</th>
                </thead>
                <tbody>
                  @forelse ($roles as $role )
                  <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    <td>{{ $role->guard_name }}</td>
                    <td>
                      @forelse ($role->permissions as $permission )
                        <span class="badge badge-info"> {{ $permission->name }} </span>
                      @empty
                        <span class="badge badge-danger"> No permissions added</span>
                      @endforelse
                    </td>
                    <td class="text-right" >

                        <a href="{{ route('roles.show', $role->id) }}" class="btn btn-info btn-sm"><i >Detalle</i></a>
                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning btn-sm"><i >Editar</i></a>
                        <form action="{{ route('roles.destroy', $role->id) }}" method="post" style="display: inline-block; " onsubmit="return confirm('seguro ?')">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger btn-sm" type="submit">
                             <i >Eliminar</i>
                          </button>
                          </form>
                      </td>
                    </tr>
                    @empty
                    No hay registros
                    @endforelse
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer mr-auto">
              {{ $roles->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
