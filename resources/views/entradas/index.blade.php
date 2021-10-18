@extends('layouts.main', [
    'namePage' => 'entradas',
    'class' => 'sidebar-mini',
    'activePage' => 'entradas',
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
              <a href="{{ route('entradas.create') }}" class="btn btn-sm btn-primary">Añadir entradas</a>
            </div>
            <h4 class="card-title"> Entradas </h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <tr>
                    <th>ID</th>
                    <th>Fecha</th>
                    <th>Proveedor</th>
                  <th class="text-right">Acciones</th>
                </thead>
                <tbody>
                  @forelse ($entradas as $entrada )
                  <tr>
                    <td>{{ $entrada->id }}</td>
                    <td>{{ $entrada->fecha }}</td>
                    <td>{{ $entrada->proveedor->nombre }}</td>
                    <td class="text-right" >

                        <a href="{{ route('entradas.edit', $entrada->id) }}" class="btn btn-warning btn-sm"><i >Editar</i></a>
                        <form action="{{ route('entradas.delete', $entrada->id) }}" method="post" style="display: inline-block; " onsubmit="return confirm('seguro ?')">
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
              {{ $entradas->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
