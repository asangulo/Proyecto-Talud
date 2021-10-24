@extends('layouts.main', [
    'namePage' => 'proveedores',
    'class' => 'sidebar-mini',
    'activePage' => 'proveedores',
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
                @can('proveedores.create')
                <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ModalCreate"">Añadir proveedor</a>
                @endcan
            </div>
            <h4 class="card-title"> Proveedores </h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Celular</th>
                    <th>Correo</th>
                    <th>Estado</th>
                  <th class="text-right">Acciones</th>
                </thead>
                <tbody>
                  @forelse ($proveedores as $proveedor )
                  <tr>
                    <td>{{ $proveedor->id }}</td>
                    <td>{{ $proveedor->nombre }}</td>
                    <td>{{ $proveedor->apellido }}</td>
                    <td>{{ $proveedor->celular }}</td>
                    <td>{{ $proveedor->correo }}</td>
                    <td>{{ $proveedor->estado }}</td>
                    <td class="text-right" >
                        @can('proveedores.edit')
                        <a href="#"  class="btn btn-gray btn-sm btn-icon" data-toggle="modal" data-target="#ModalEdit{{ $proveedor->id}}" > <i class="now-ui-icons ui-2_settings-90"></i></a>
                        @endcan
                        @can('proveedores.destroy')
                        <form action="{{ route('proveedores.destroy', $proveedor->id) }}" method="post" style="display: inline-block; " class="formulario-eliminar">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">
                                <i class="now-ui-icons ui-1_simple-remove"></i>
                            </button>
                        </form>
                        @endcan
                      </td>
                      @include('proveedores.modal.edit')
                    </tr>
                    @empty
                    No hay registros
                    @endforelse
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer mr-auto">
              {{ $proveedores->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('proveedores.modal.create')
@endsection
{{-- @section('js')

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('success') == 'Proveedor eliminado correctamente')
   <script>
        Swal.fire(
            '¡Eliminado!',
            'Se ha eliminado con éxito.',
            'success'
            )
    </script>

@endif

<script>

    $('.formulario-eliminar').submit(function(e){
        e.preventDefault();

        Swal.fire({
        title: '¿Estas seguro?',
        text: "esta marca se eliminara definitivamente!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '¡Sí, eliminar!'
        cancelButtonText: 'Cancelar'
        }).then((result) => {
        if (result.isConfirmed) {
            // Swal.fire(
            // 'Deleted!',
            // 'Your file has been deleted.',
            // 'success'
            // )

            this.submit();
        }
        })
    });


</script>

@endsection --}}
