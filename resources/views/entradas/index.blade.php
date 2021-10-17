@extends('layouts.main', ['page' => __('entradas'), 'pageSlug' => 'entradas'])


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
                             <a href="{{ route('entrada.create') }}" class="btn btn-sm btn-primary">Añadir entrada</a>
                          </div>
                        <h4 class="card-title"> entradas </h4>
                        <p class="card-category"> here </p>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                    <tr>
                                    <th>ID</th>
                                    <th>Fecha</th>
                                    <th>Proveedor</th>
                                    {{-- <th>Created_at</th> --}}
                                    <th class="text-right">Acciones</th>
                                </tr>
                                </thead>

                                @foreach ($entradas as $entrada )

                                <tr>
                                    <td>{{ $entrada->id }}</td>
                                    <td>{{ $entrada->fecha}}</td>
                                    <td>{{ $entrada->proveedor->nombre }}</td>
                                    {{-- <td>{{ $entrada->created_at }}</td> --}}
                                    <td class="text-right" >

                                          {{-- <a href="{{ route('entradaMateriales.show', $usuario->id) }}" class="btn btn-info btn-sm"><i >Detalle</i></a> --}}
                                          <a href="{{ route('entradas.edit', $entrada->id) }}" class="btn btn-warning btn-sm"><i >Editar</i></a>
                                          <form action="{{ route('entradas.delete', $entrada->id) }}" method="post" style="display: inline-block; " onsubmit="return confirm('seguro ?')">
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
                        {{ $entradas->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
