@extends('layouts.main', ['page' => __('salidas'), 'pageSlug' => 'salidas'])


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
                             <a href="{{ route('salida.create') }}" class="btn btn-sm btn-primary">Añadir Salida</a>
                          </div>
                        <h4 class="card-title"> Salidas </h4>
                        <p class="card-category"> here </p>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                    <tr>
                                    <th>ID</th>
                                    <th>Fecha</th>
                                    <th>Obra</th>
                                    {{-- <th>Created_at</th> --}}
                                    <th class="text-right">Acciones</th>
                                </tr>
                                </thead>

                                @foreach ($salidas as $salida )

                                <tr>
                                    <td>{{ $salida->id }}</td>
                                    <td>{{ $salida->fecha}}</td>
                                    <td>{{ $salida->obra_id }}</td>
                                    {{-- <td>{{ $salida->created_at }}</td> --}}
                                    <td class="text-right" >

                                          {{-- <a href="{{ route('salidaMateriales.show', $usuario->id) }}" class="btn btn-info btn-sm"><i >Detalle</i></a> --}}
                                          <a href="{{ route('salidas.edit', $salida->id) }}" class="btn btn-warning btn-sm"><i >Editar</i></a>
                                          <form action="{{ route('salidas.delete', $salida->id) }}" method="post" style="display: inline-block; " onsubmit="return confirm('seguro ?')">
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
                        {{ $salidas->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
