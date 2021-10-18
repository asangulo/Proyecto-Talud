@extends('layouts.main', [
    'namePage' => 'materiales',
    'class' => 'sidebar-mini',
    'activePage' => 'materiales',
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
              <a href="{{ route('materiales.create') }}" class="btn btn-sm btn-primary">Añadir materiales</a>
            </div>
            <h4 class="card-title"> Materiales </h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Peso</th>
                    <th>Tamaño</th>
                    <th>Cantidad</th>
                    <th>Tipo</th>
                    <th>Marca</th>
                    <th>Proveedor</th>
                    <th>Estado</th>

                  <th class="text-right">Acciones</th>
                </thead>
                <tbody>
                  @forelse ($materiales as $material )
                  <tr>
                    <td>{{ $material->id }}</td>
                    <td>{{ $material->nombre }}</td>
                    <td>{{ $material->peso }}</td>
                    <td>{{ $material->tamaño }}</td>
                    <td>{{ $material->cantidad }}</td>
                    <td>{{ $material->tipo_id }}</td>
                    <td>{{ $material->marca->nombre}}</td>
                    <td>{{ $material->proveedor->nombre }}</td>
                    <td>{{ $material->estado }}</td>

                    <td class="text-right" >

                        <a href="{{ route('materiales.show', $material->id) }}" class="btn btn-info btn-sm"><i class="ni ni-single-02">Detalle</i></a>
                        <a href="{{ route('materiales.edit', $material->id) }}" class="btn btn-warning btn-sm"><i class="ni ni-single-02">Edit</i></a>
                        <form action="{{ route('materiales.destroy', $material->id) }}" method="post" style="display: inline-block; " onsubmit="return confirm('seguro ?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">
                              <i class="ni ni-fat-remove ">Eliminar</i>
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
              {{ $materiales->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
