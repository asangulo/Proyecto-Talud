@extends('layouts.main', [
    'namePage' => 'salidas',
    'class' => 'sidebar-mini',
    'activePage' => 'salidas',
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
            <h4 class="card-title"> Salida </h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <tr>
                  <th>ID</th>
                  <th>Fecha</th>
                  <th>Obra</th>
                  <th class="text-right">Acciones</th>
                </thead>
                <tbody>
                  @forelse ($salidas as $salida )
                  <tr>
                    <td>{{ $salida->id }}</td>
                    <td>{{ $salida->fecha}}</td>
                    <td>{{ $salida->obra_id }}</td>
                    <td class="text-right" >

                      <a href="{{ route('salidas.edit', $salida->id) }}" class="btn btn-warning btn-sm"><i >Editar</i></a>
                      <form action="{{ route('salidas.delete', $salida->id) }}" method="post" style="display: inline-block; " onsubmit="return confirm('seguro ?')">
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
              {{ $salidas->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
