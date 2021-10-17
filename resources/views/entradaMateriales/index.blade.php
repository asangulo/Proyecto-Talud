@extends('layouts.main', ['page' => __('entradaMateriales'), 'pageSlug' => 'entradaMateriales'])


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
                             <a href="{{ route('entradaMaterial.create') }}" class="btn btn-sm btn-primary">Añadir Entrada Material</a>
                          </div>
                        <h4 class="card-title"> Entrada Materiales </h4>
                        <p class="card-category"> here </p>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                    <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Entrada id</th>
                                    <th>Cantidad</th>
                                    <th>Created_at</th>
                                    <th class="text-right">Acciones</th>
                                </tr>
                                </thead>

                                <tbody class="list">
                                    @foreach ($entradaMateriales as $entradaMaterial )


                                   <tr>
                                    <td>{{ $entradaMaterial->id }}</td>
                                    <td>{{ $entradaMaterial->material->nombre }}</td>
                                    <td>{{ $entradaMaterial->entrada_id}}</td>
                                    <td>{{ $entradaMaterial->cantidad }}</td>
                                    <td>{{ $entradaMaterial->created_at}}</td>
                                      <td class="text-right" >

                                          {{-- <a href="{{ route('entradaMateriales.show', $usuario->id) }}" class="btn btn-info btn-sm"><i >Detalle</i></a> --}}
                                          <a href="{{ route('entradaMateriales.edit', $entradaMaterial->id) }}" class="btn btn-warning btn-sm"><i >Editar</i></a>
                                          <form action="{{ route('entradaMateriales.delete', $entradaMaterial->id) }}" method="post" style="display: inline-block; " onsubmit="return confirm('seguro ?')">
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
                        {{ $entradaMateriales->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
