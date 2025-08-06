@extends('layouts.main', [
    'namePage' => 'usuarios',
    'class' => 'sidebar-mini',
    'activePage' => 'usuarios',
  ])



@section('content')
  <div class="panel-header panel-header-sm">
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        @if (session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
        @endif
        <div class="card">
          <div class="card-header">
            <div class="text-right" id="mensaje">
               <form action="" id="form-usuario">
               @can('usuario.create')
                <a href="{{ route('usuario.create')}}" class="btn btn-sm btn-primary" >Añadir Usario</a>
                @endcan
               </form>
            </div>
            <h4 class="card-title"> usuarios</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover" id="usuarios">
                <thead class=" text-primary">
                  <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Roles</th>
                  <th class="text-right">Acciones</th>
                </thead>
                <tbody>
                   @foreach ($usuarios as $usuario )
                  <tr>
                    <td>{{ $usuario->id }}</td>
                    <td>{{ $usuario->name }}</td>
                    <td><a href="mailto:{{$usuario->email }}"> {{$usuario->email }}</a></td>
                    <td>
                  @forelse ($usuario->roles as $role )
                    <span class="badge badge-info">{{ $role->name }}</span>
                  @empty
                    <span class="badge badge-danger">No roles </span>
                  @endforelse
                  </td>
                  <td class="text-right" >

                      {{-- <a href="#" class="btn btn-info btn-sm"><i >Detalle</i></a> --}}
                      @can('usuarios.edit')
                      <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-gray btn-sm"><i class="now-ui-icons ui-2_settings-90"></i></a>

                      @endcan
                      @can('usuarios.destroy')
                      <form action="{{ route('usuarios.delete', $usuario->id) }}" method="post" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                      <button class="btn btn-danger btn-sm btn-icon" type="submit">
                          <i class="now-ui-icons ui-1_simple-remove"></i>
                      </button>
                    </form>
                      @endcan
                      </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('js')
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>


<script>
    $('#usuarios').DataTable({
        responsive: true,
        autoWidth: false,

        "language": {
            "lengthMenu": "Mostrar " +
                             `<select class="custom-select custom-select-sm form-control form-control-sm">
                                <option value='10'>10</option>
                                <option value='25'>25</option>
                                <option value='50'>50</option>
                                <option value='100'>100</option>
                                <option value='-1'>All</option>
                             </select>` +
                           " registros por página",
            "zeroRecords": "Nada encontrado - disculpa",
            "info": "Mostrando la página _PAGE_ de _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search": "Buscar:",
            "paginate":{
                'next': 'Siguiente',
                'previous': 'Anterior'
            }
        }
    });
</script>

<script>
     $('#form-usuario').submit(function(e){
       e.preventDefault();
       $.ajax({
           url: '/usuarios',
           type: 'POST',
           data: $(this).serialize(),
           headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
           success: function(response){
               $('#mensaje').html('<div class="alert alert-success">'+response.message+'</div>');
               // Actualiza la tabla o la vista aquí sin recargar
           },
           error: function(xhr){
               $('#mensaje').html('<div class="alert alert-danger">Ocurrió un error</div>');
           }
       });
   });
</script>



@endsection

{{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('success') == 'marca eliminado correctamente')
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

