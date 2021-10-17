@extends('layouts.main', ['page' => __('Obras'), 'pageSlug' => 'Obras'])

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row align-items-center py-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <div>
                            @if (session('success'))
                            <div class="alert alert-warning" role="alert">
                              {{ session('success') }}
                            @endif
                          </div>
                          </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('obra.create') }}" class="btn btn-sm btn-primary">Añadir Obra</a>
                          </div>
                        <h4 class="card-title"> obras </h4>
                        <p class="card-category"> here </p>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Fecha Inicio</th>
                                    <th>Fecha Entrega</th>
                                    <th>Estado</th>
                                    <th>Descripcion</th>
                                    <th>Cantidad</th>
                                    <th>Cliente</th>
                                    <th>Categoria</th>
                                    <th>Usuario</th>
                                    <th>Created_at</th>
                                    <th class="text-right">Acciones</th>
                                </tr>
                                </thead>

                                <tbody class="list">
                                    @foreach ($obras as $obra )

                                   <tr>
                                    <td>{{ $obra->id }}</td>
                                    <td>{{ $obra->nombre }}</td>
                                    <td>{{ $obra->fechaInicio }}</td>
                                    <td>{{ $obra->fechaInicio }}</td>
                                    <td>{{ $obra->estado }}</td>
                                    <td>{{ $obra->descripcion }}</td>
                                    <td>{{ $obra->cantidad }}</td>
                                    <td>{{ $obra->cliente->nombre }}</td>
                                    <td>{{ $obra->categoria->nombre}}</td>
                                    <td>{{ $obra->usuario_id }}</td>
                                    <td>{{ $obra->created_at }}</td>
                                    <td class="text-right" >

                                          {{-- <a href="{{ route('obras.show', $usuario->id) }}" class="btn btn-info btn-sm"><i >Detalle</i></a> --}}
                                          <a href="{{ route('obras.edit', $obra->id) }}" class="btn btn-warning btn-sm"><i >Editar</i></a>
                                          <form action="{{ route('obras.delete', $obra->id) }}" method="post" style="display: inline-block; " onsubmit="return confirm('seguro ?')">
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
                        {{ $obras->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
