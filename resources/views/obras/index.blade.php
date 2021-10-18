@extends('layouts.main', [
    'namePage' => 'obras',
    'class' => 'sidebar-mini',
    'activePage' => 'obras',
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
              <a href="{{ route('obras.create') }}" class="btn btn-sm btn-primary">Añadir obra</a>
            </div>
            <h4 class="card-title"> Obras </h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
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
                  <th class="text-right">Acciones</th>
                </thead>
                <tbody>
                  @forelse ($obras as $obra )
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
                    <td class="text-right" >

                        <a href="{{ route('obras.edit', $obra->id) }}" class="btn btn-warning btn-sm"><i >Editar</i></a>
                        <form action="{{ route('obras.delete', $obra->id) }}" method="post" style="display: inline-block; " onsubmit="return confirm('seguro ?')">
                            @csrf
                            method('DELETE')
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
              {{ $obras->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
