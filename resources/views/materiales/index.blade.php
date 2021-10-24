@extends('layouts.main', [
    'namePage' => 'materiales',
    'class' => 'sidebar-mini',
    'activePage' => 'materiales',
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
                @can('materiales.create')
                <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ModalCreate" >Añadir materiales</a>
                @endcan

            </div>
            <h4 class="card-title"> Materiales </h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table" id="materiales">
                <thead class=" text-primary">
                  <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Peso</th>
                    <th>Tamaño</th>
                    <th>Cantidad</th>
                    <th>Tipo</th>
                    <th>Marca</th>
                    <th>Proveedor</th>
                    <th>Estado</th>

                  <th class="text-right">Acciones</th>
                </thead>
                <tbody>
                </tbody>

              </table>
            </div>
          </div>
          <div class="card-footer mr-auto">
              {{ $materiales->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('materiales.modal.create')
@endsection

@section('js')
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>


<script>
    $('#materiales').DataTable({
                "language": {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Entradas",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
                "order": [[ 0, "asc" ]],
                "processing": true,
                "responsive": true,
                "serverSide": true,
                "ajax": "{{ route('ajax.request.materiales')}}",
                "columns":[
                {"data":"id"},
                {"data":"nombre"},
                {"data":"peso"},
                {"data":"tamaño"},
                {"data":"cantidad"},
                {"data":"tipo"},
                {"data":"marca"},
                {"data":"proveedor"},
                {"data":"estado"},
                { "data": "opciones",orderable:false, searchable:false },
                ],

    });
</script>



@endsection
