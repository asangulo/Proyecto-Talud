@extends('layouts.main', [
    'namePage' => 'categorias',
    'class' => 'sidebar-mini',
    'activePage' => 'categorias',
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
              <a href="{{ route('categorias.create') }}" class="btn btn-sm btn-primary">Añadir categoria</a>
            </div>
            <h4 class="card-title"> Categorias </h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                  <th class="text-right">Acciones</th>
                </thead>
                <tbody>
                  @forelse ($categorias as $categoria )
                  <tr>
                    <td>{{ $categoria->id }}</td>
                    <td>{{ $categoria->nombre }}</td>
                    <td class="text-right" >

                          <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-warning btn-sm"><i >Editar</i></a>
                          <form action="{{ route('categorias.delete', $categoria->id) }}" method="post" style="display: inline-block; " onsubmit="return confirm('seguro ?')">
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
              {{ $categorias->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
