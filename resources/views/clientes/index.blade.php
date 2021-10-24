@extends('layouts.main', [
    'namePage' => 'clientes',
    'class' => 'sidebar-mini',
    'activePage' => 'clientes',
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
                @can('clientes.create')
                <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ModalCreate" >Añadir cliente</a>

                @endcan

            </div>
            <h4 class="card-title"> clientes </h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Correo</th>
                    <th>Celular</th>
                    <th>Direccion</th>

                  <th class="text-right">Acciones</th>
                </thead>
                <tbody>
                  @forelse ($clientes as $cliente)
                  <tr>
                    <td>{{ $cliente->id }}</td>
                    <td>{{ $cliente->nombre }}</td>
                    <td>{{ $cliente->apellido }}</td>
                    <td>{{ $cliente->correo }}</td>
                    <td>{{ $cliente->celular }}</td>
                    <td>{{ $cliente->direcccion }}</td>

                    <td class="text-right" >
                        @can('clientes.edit')
                        <a href="#"  class="btn btn-gray btn-sm btn-icon" data-toggle="modal" data-target="#ModalEdit{{ $cliente->id}}" > <i class="now-ui-icons ui-2_settings-90"></i></a>

                        @endcan
                        @can('clientes.destroy')
                        <form action="{{ route('clientes.destroy', $cliente->id) }}" method="post" style="display: inline-block; " onsubmit="return confirm('seguro ?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">
                                <i class="now-ui-icons ui-1_simple-remove"></i>
                            </button>
                          </form>

                        @endcan
                        {{-- <a href="{{ route('clientes.show', $cliente->id) }}" class="btn btn-info btn-sm"><i class="ni ni-single-02">Detalle</i></a> --}}

                      </td>
                      @include('clientes.modal.edit')
                    </tr>
                    @empty
                    No hay registros
                    @endforelse
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer mr-auto">
              {{ $clientes->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('clientes.modal.create')
@endsection
