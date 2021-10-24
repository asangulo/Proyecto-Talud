@extends('layouts.main', [
    'namePage' => 'tipo materiales',
    'class' => 'sidebar-mini',
    'activePage' => 'tipoMateriales',
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
                @can('tipoMateriales.create')
                <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ModalCreate">Añadir Tipo Material</a>
                @endcan
              </div>
            <h4 class="card-title"> Tipo Materiales</h4>
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
                  @forelse ($tipoMateriales as $tipoMaterial)
                  <tr>
                    <td>{{ $tipoMaterial->id }}</td>
                    <td>{{ $tipoMaterial->nombre }}</td>

                    <td class="text-right" >
                        @can('tipoMateriales.edit')
                        <a href="#"  class="btn btn-gray btn-sm btn-icon" data-toggle="modal" data-target="#ModalEdit{{ $tipoMaterial->id}}" > <i class="now-ui-icons ui-2_settings-90"></i></a>
                        @endcan
                        @can('tipoMateriales.destroy')
                        <form action="{{ route('tipoMateriales.destroy', $tipoMaterial->id) }}" method="post" style="display: inline-block; " onsubmit="return confirm('seguro ?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">
                              <i class="now-ui-icons ui-1_simple-remove"></i>
                            </button>
                        </form>
                        @endcan
                      </td>
                      @include('tipoMateriales.modal.edit')
                    </tr>
                    @empty
                    No hay  registrados
                    @endforelse
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer mr-auto">
              {{ $tipoMateriales->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('tipoMateriales.modal.create')
@endsection
