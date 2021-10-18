@extends('layouts.main', [
    'namePage' => 'usuarios',
    'class' => 'sidebar-mini',
    'activePage' => 'usuarios',
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
              <a href="{{ route('usuario.create') }}" class="btn btn-sm btn-primary">Añadir Usario</a>
            </div>
            <h4 class="card-title"> Usuarios </h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Roles</th>
                  <th class="text-right">Acciones</th>
                </thead>
                <tbody>
                  @forelse ($usuarios as $usuario )
                  <tr>
                    <td>{{ $usuario->id }}</td>
                    <td>{{ $usuario->name }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>
                  @forelse ($usuario->roles as $role )
                    <span class="badge badge-info">{{ $role->name }}</span>
                  @empty
                    <span class="badge badge-danger">No roles </span>
                  @endforelse
                  </td>
                    <td class="text-right" >

                      <a href="{{ route('usuarios.show', $usuario->id) }}" class="btn btn-info btn-sm"><i >Detalle</i></a>
                      <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-warning btn-sm"><i >Editar</i></a>
                      <form action="{{ route('usuarios.delete', $usuario->id) }}" method="post" style="display: inline-block; " onsubmit="return confirm('seguro ?')">
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
              {{ $usuarios->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
