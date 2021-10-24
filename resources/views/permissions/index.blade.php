@extends('layouts.main', [
    'namePage' => 'permisos',
    'class' => 'sidebar-mini',
    'activePage' => 'permisos',
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
              <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ModalCreate">Añadir permisos</a>
            </div>
            <h4 class="card-title"> Permisos </h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Guard</th>
                    <th>Created_at</th>
                  <th class="text-right">Acciones</th>
                </thead>
                <tbody>
                  @forelse ($permissions as $permission )
                  <tr>
                    <td>{{ $permission->id }}</td>
                    <td>{{ $permission->name }}</td>
                    <td>{{ $permission->guard_name }}</td>
                    <td>{{ $permission->created_at }}</td>
                    <td class="text-right" >

                        <a href="#" class="btn btn-info btn-sm"><i >Detalle</i></a>
                        <a href="#"  class="btn btn-gray btn-sm btn-icon" data-toggle="modal" data-target="#ModalEdit{{ $permission->id}}" > <i class="now-ui-icons ui-2_settings-90"></i></a>
                         <form action="{{ route('permissions.destroy', $permission->id) }}" method="post" style="display: inline-block; " onsubmit="return confirm('seguro ?')">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger btn-sm" type="submit">
                              <i >Eliminar</i>
                          </button>
                          </form>
                      </td>
                      @include('permissions.modal.edit')
                    </tr>
                    @empty
                    No hay registros
                    @endforelse
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer mr-auto">
              {{ $permissions->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('permissions.modal.create')
@endsection
