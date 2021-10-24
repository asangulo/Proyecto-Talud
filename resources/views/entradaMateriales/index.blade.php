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
                @can('entradaMateriales.create')
                <a href="" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ModalCreate">Añadir Entrada Material</a>
                @endcan

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
                    <th>Cantidad en stock</th>
                    <th>Estado</th>

                  <th class="text-right">Acciones</th>
                </thead>
                <tbody>
                  @forelse ($entradaMateriales as $entradaMaterial )
                  <tr>
                    <td>{{ $entradaMaterial->id }}</td>
                    <td>{{ $entradaMaterial->material->nombre }}</td>
                    <td>{{ $entradaMaterial->entrada_id}}</td>
                    <td><strong>{{ $entradaMaterial->cantidad }}</strong></td>
                    <td>{{ $entradaMaterial->estado }}</td>

                    <td class="text-right" >
                        @can('entradaMateriales.edit')
                        <a href="#"  class="btn btn-gray btn-sm btn-icon" data-toggle="modal" data-target="#ModalEdit{{ $entradaMaterial->id}}" > <i class="now-ui-icons ui-2_settings-90"></i></a>

                        @endcan
                        @can('entradaMateriales.destroy')
                        <form action="{{ route('entradaMateriales.destroy', $entradaMaterial->id) }}" method="post" style="display: inline-block; " onsubmit="return confirm('seguro ?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">
                                <i >Eliminar</i>
                            </button>
                          </form>
                        @endcan


                      </td>
                      @include('entradaMateriales.modal.edit')
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
  @include('entradaMateriales.modal.create')
@endsection
