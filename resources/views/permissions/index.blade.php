@extends('layouts.main', ['page' => __('permissions'), 'pageSlug' => 'permissions'])


@section('content')

<div class="card">
    <div class="card-header">
        <h5 class="title">{{ _('Crear permisos') }}</h5>
    </div>
    <form action="{{ route('permissions.store') }}" method="post"   class="form-horizontal">
        @csrf
        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif


        <div class="pl-lg-4">
            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                <label class="form-control-label" for="input-name">{{ __('Nombre del permiso') }}</label>
                <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" autofocus>


            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-fill btn-primary">{{ _('Guardar') }}</button>
            </div>
        </div>

    </form>
    <hr class="my-4" />
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row align-items-center py-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <div>
                            @if (session('success'))
                            <div class="alert alert-warning" role="alert">
                              {{ session('success') }}
                            @endif
                          </div>
                          </div>
                        <div class="col-4 text-right">
                            @can('permission_create')
                            <a href="{{ route('permissions.create') }}" class="btn btn-sm btn-primary">Añadir Permiso</a>

                            @endcan
                             </div>
                        <h4 class="card-title">Permisos </h4>
                        <p class="card-category"> here</p>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                    <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Guard</th>
                                    <th>Created_at</th>
                                    <th class="text-right">Acciones</th>
                                </tr>
                                </thead>

                                <tbody class="list">
                                    @forelse ($permissions as $permission )


                                   <tr>
                                      <td>{{ $permission->id }}</td>
                                      <td>{{ $permission->name }}</td>
                                      <td>{{ $permission->guard_name }}</td>
                                      <td>{{ $permission->created_at }}</td>
                                      <td class="text-right" >
                                          @can('permission_show')
                                          <a href="{{ route('permissions.show', $permission->id) }}" class="btn btn-info btn-sm"><i >Detalle</i></a>

                                          @endcan
                                          @can('permission_edit')
                                          <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-warning btn-sm"><i >Editar</i></a>

                                          @endcan
                                          @can('permission_destroy')



                                          <form action="{{ route('permissions.destroy', $permission->id) }}" method="post" style="display: inline-block; " onsubmit="return confirm('seguro ?')">
                                              @csrf
                                              @method('DELETE')
                                              <button class="btn btn-danger btn-sm" type="submit">
                                                  <i >Eliminar</i>
                                              </button>
                                          </form>
                                          @endcan
                                      </td>
                                   </tr>
                                   @empty
                                   No hay permisos registrados
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
</div>
@endsection
