@extends('layouts.main', [
    'namePage' => 'salida material',
    'class' => 'sidebar-mini',
    'activePage' => 'salidaMaterial',
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
              <a href="{{ route('salidas.create') }}" class="btn btn-sm btn-primary">Añadir salida</a>
            </div>
            <h4 class="card-title"> Salida Material </h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <tr>
                  <th>ID</th>
                  <th>Estado</th>
                  <th>Cantidad</th>
                  <th>Material</th>
                  <th>ID Salida</th>
                  <th class="text-right">Acciones</th>
                </thead>
                <tbody>
                  @forelse ($salidaMateriales as $salidaMaterial )
                  <tr>
                    <td>{{ $salidaMaterial->id }}</td>
                    <td>{{ $salidaMaterial->estado }}</td>
                    <td>{{ $salidaMaterial->cantidad}}</td>
                    <td>{{ $salidaMaterial->material->nombre }}</td>
                    <td>{{ $salidaMaterial->salida->fecha }}</td>
                    <td class="text-right" >

                      <a href="{{ route('salidaMateriales.edit', $salidaMaterial->id) }}" class="btn btn-warning btn-sm"><i >Editar</i></a>
                      <form action="{{ route('salidaMateriales.destroy', $salidaMaterial->id) }}" method="post" style="display: inline-block; " onsubmit="return confirm('seguro ?')">
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
              {{ $salidaMateriales->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
