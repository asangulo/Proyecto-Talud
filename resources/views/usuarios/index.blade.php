@extends('layouts.main', ['page' => __('Usuarios'), 'pageSlug' => 'usuarios'])


@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row align-items-center py-4">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header card-header-primary">
                        <div class="text-right">
                            <a href="{{ route('usuario.create') }}" class="btn btn-sm btn-primary">Nuevo Usuario</a>
                        </div>
                        <h4 class="card-title">Usuarios </h4>
                        {{-- <div>
                            <input type="search" class="form-control" placeholder="Ingresar el nombre o correo correo de un usuario">
                        </div> --}}
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                    <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <th>Roles</th>
                                    <th class="text-right">Acciones</th>
                                </tr>
                                </thead>

                                <tbody class="list">
                                    @foreach ($usuarios as $usuario )


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
                                   @endforeach
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
</div>




@endsection
