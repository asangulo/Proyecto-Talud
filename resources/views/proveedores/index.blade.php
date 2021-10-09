@extends('layouts.main', ['page' => __('proveedores'), 'pageSlug' => 'proveedores'])


@section('content')
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
                            <a href="{{ route('proveedor.create') }}" class="btn btn-sm btn-primary">Añadir proveedor</a>
                          </div>
                        <h4 class="card-title">Proveedores </h4>
                        <p class="card-category"> here </p>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                    <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Celular</th>
                                    <th>Correo</th>
                                    <th>Estado</th>
                                    <th>Created_at</th>
                                    <th class="text-right">Acciones</th>
                                </tr>
                                </thead>

                                <tbody class="list">
                                    @foreach ($proveedores as $proveedor )


                                   <tr>
                                      <td>{{ $proveedor->id }}</td>
                                      <td>{{ $proveedor->nombre }}</td>
                                      <td>{{ $proveedor->celular }}</td>
                                      <td>{{ $proveedor->correo }}</td>
                                      <td>{{ $proveedor->estado }}</td>
                                      <td>{{ $proveedor->created_at }}</td>
                                      <td class="text-right" >

                                          {{-- <a href="{{ route('proveedores.show', $usuario->id) }}" class="btn btn-info btn-sm"><i >Detalle</i></a> --}}
                                          <a href="{{ route('proveedores.edit', $proveedor->id) }}" class="btn btn-warning btn-sm"><i >Editar</i></a>
                                          <form action="{{ route('proveedores.delete', $proveedor->id) }}" method="post" style="display: inline-block; " onsubmit="return confirm('seguro ?')">
                                              @csrf
                                              @method('DELETE')
                                              <button class="btn btn-danger btn-sm" type="submit">
                                                  <i >Eliminar</i>
                                              </button>
                                          </form>
                                      </td>
                                   </tr>
                                   @endforeach
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
</div>

@endsection
