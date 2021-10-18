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
        <div class="card">
          <div class="card-header">
            <div class="text-right">
              <a href="{{ route('proveedores.create') }}" class="btn btn-sm btn-primary">Añadir proveedor</a>
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
                    <td>{{ $proveedor->celular }}</td>
                    <td>{{ $proveedor->correo }}</td>
                    <td>{{ $proveedor->estado }}</td>
                    <td class="text-right" >

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
@endsection
