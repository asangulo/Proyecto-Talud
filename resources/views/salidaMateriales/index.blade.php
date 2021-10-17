@extends('layouts.main', ['page' => __('salidaMateriales'), 'pageSlug' => 'salidaMateriales'])


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
                             <a href="{{ route('salidaMateriales.create') }}" class="btn btn-sm btn-primary">Añadir salida Material</a>
                          </div>
                        <h4 class="card-title"> salida Materiales </h4>
                        <p class="card-category"> here </p>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                    <tr>
                                    <th>ID</th>
                                    <th>estado</th>
                                    <th>Cantidad</th>
                                    <th>Material</th>
                                    <th>salida id</th>


                                    <th class="text-right">Acciones</th>
                                </tr>
                                </thead>

                                <tbody class="list">
                                    @foreach ($salidaMateriales as $salidaMaterial )


                                   <tr>
                                    <td>{{ $salidaMaterial->id }}</td>
                                    <td>{{ $salidaMaterial->estado }}</td>
                                    <td>{{ $salidaMaterial->cantidad}}</td>
                                    <td>{{ $salidaMaterial->material->nombre }}</td>
                                    <td>{{ $salidaMaterial->salida->fecha }}</td>

                                      <td class="text-right" >

                                          {{-- <a href="{{ route('salidaMateriales.show', $usuario->id) }}" class="btn btn-info btn-sm"><i >Detalle</i></a> --}}
                                          <a href="{{ route('salidaMateriales.edit', $salidaMaterial->id) }}" class="btn btn-warning btn-sm"><i >Editar</i></a>
                                          <form action="{{ route('salidaMateriales.delete', $salidaMaterial->id) }}" method="post" style="display: inline-block; " onsubmit="return confirm('seguro ?')">
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
                        {{ $salidaMateriales->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
