@extends('layouts.main', [
    'namePage' => 'entradaMateriales',
    'class' => 'sidebar-mini',
    'activePage' => 'entradaMateriales',
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
              <a href="{{ route('entradaMateriales.create') }}" class="btn btn-sm btn-primary">Añadir Entrada Material</a>
            </div>
            <h4 class="card-title"> Entrada Materiales </h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Entrada id</th>
                    <th>Cantidad</th>
                  <th class="text-right">Acciones</th>
                </thead>
                <tbody>
                  @forelse ($entradaMateriales as $entradaMaterial )
                  <tr>
                    <td>{{ $entradaMaterial->id }}</td>
                    <td>{{ $entradaMaterial->material->nombre }}</td>
                    <td>{{ $entradaMaterial->entrada_id}}</td>
                    <td>{{ $entradaMaterial->cantidad }}</td>
                    <td>{{ $entradaMaterial->created_at}}</td>
                    <td class="text-right" >

                          <a href="{{ route('entradaMateriales.edit', $entradaMaterial->id) }}" class="btn btn-warning btn-sm"><i >Editar</i></a>
                          <form action="{{ route('entradaMateriales.delete', $entradaMaterial->id) }}" method="post" style="display: inline-block; " onsubmit="return confirm('seguro ?')">
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
              {{ $entradaMateriales->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
