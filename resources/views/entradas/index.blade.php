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
        @if (session('success'))
        <div class="alert alert-primary">
            {{session('success')}}
        </div>
        @endif
        <div class="card">
          <div class="card-header">
            <div class="text-right">
                @can('entradas.create')
                <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ModalCreate" >Añadir entradas</a>
                @endcan
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
                        @can('entradas.edit')
                        <a href="#"  class="btn btn-gray btn-sm btn-icon" data-toggle="modal" data-target="#ModalEdit{{ $entrada->id}}" > <i class="now-ui-icons ui-2_settings-90"></i></a>


                        @endcan
                        @can('entradas.destroy')
                        <form action="{{ route('entradas.destroy', $entrada->id) }}" method="post" style="display: inline-block; " onsubmit="return confirm('seguro ?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">
                                <i >Eliminar</i>
                            </button>
                        </form>
                        @endcan


                      </td>
                      @include('entradas.modal.edit')
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
  @include('entradas.modal.create')
@endsection
