@extends('layouts.main', ['page' => __('materiales'), 'pageSlug' => 'materiales'])

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
                            <a href="{{ route('material.create') }}" class="btn btn-sm btn-primary">Añadir Material</a>
                          </div>
                        <h4 class="card-title"> Materiales </h4>
                        <p class="card-category"> here </p>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-primary">
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
                                    <th>Created_at</th>
                                    <th class="sort text-right" >Acciones</th>
                                </tr>
                                </thead>

                                <tbody class="list">
                                    @foreach ($materiales as $material )

                                        <tr>
                                            <td>{{ $material->id }}</td>
                                            <td>{{ $material->nombre }}</td>
                                            <td>{{ $material->peso }}</td>
                                            <td>{{ $material->tamaño }}</td>
                                            <td>{{ $material->cantidad }}</td>
                                            <td>{{ $material->tipo_id }}</td>
                                            <td>{{ $material->marca->nombre}}</td>
                                            <td>{{ $material->proveedor->nombre }}</td>
                                            <td>{{ $material->estado }}</td>
                                            <td>{{ $material->created_at }}</td>
                                            <td class="text-right" >

                                                <a href="{{ route('materiales.show', $material->id) }}" class="btn btn-info btn-sm"><i class="ni ni-single-02">Detalle</i></a>
                                                <a href="{{ route('materiales.edit', $material->id) }}" class="btn btn-warning btn-sm"><i class="ni ni-single-02">Edit</i></a>
                                                <form action="{{ route('materiales.delete', $material->id) }}" method="post" style="display: inline-block; " onsubmit="return confirm('seguro ?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm" type="submit">
                                                        <i class="ni ni-fat-remove ">Eliminar</i>
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
                        {{ $materiales->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
