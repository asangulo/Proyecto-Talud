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
                @can('salidasMateriales.create')
                <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ModalCreate">Añadir Salida Material</a>
                @endcan
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
                  <th>Cantidad Retirada</th>
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
                        @can('salidasMateriales.edit')
                        <a href="#"  class="btn btn-gray btn-sm btn-icon" data-toggle="modal" data-target="#ModalEdit{{ $salidaMaterial->id}}" > <i class="now-ui-icons ui-2_settings-90"></i></a>

                        @endcan
                        @can('salidasMateriales.destroy')
                        <form action="{{ route('salidaMateriales.destroy', $salidaMaterial->id) }}" method="post" style="display: inline-block; " onsubmit="return confirm('seguro ?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">
                                  <i >Eliminar</i>
                            </button>
                        </form>
                        @endcan

                      </td>
                      @include('SalidaMateriales.modal.edit')
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
  @include('salidaMateriales.modal.create')
@endsection
