@extends('layouts.main', ['page' => __('Marcas'), 'pageSlug' => 'Marcas'])


@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="title">{{ _('Crear TipoMaterial') }}</h5>
    </div>
    <form method="post" action="{{ route('marcas.store') }}" autocomplete="off">
        <div class="card-body">
                @csrf

                @include('alerts.success')

                <div class="form-group{{ $errors->has('nombre') ? ' has-danger' : '' }}">
                    <label>{{ _('nombre') }}</label>
                    <input type="text" name="nombre" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" placeholder="{{ _('Nombre') }}" value="{{ old('nombre') }}" autofocus>
                    @include('alerts.feedback', ['field' => 'name'])
                </div>


        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-fill btn-primary">{{ _('Guardar') }}</button>
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
                            {{-- <a href="{{ route('marca.create') }}" class="btn btn-sm btn-primary">Añadir Marca</a> --}}
                          </div>
                        <h4 class="card-title"> Marca </h4>
                        <p class="card-category"> here </p>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                    <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Created_at</th>
                                    <th class="text-right">Acciones</th>
                                </tr>
                                </thead>

                                <tbody class="list">
                                    @foreach ($marcas as $marca )


                                   <tr>
                                      <td>{{ $marca->id }}</td>
                                      <td>{{ $marca->nombre }}</td>
                                      <td>{{ $marca->created_at }}</td>
                                      <td class="text-right" >

                                          {{-- <a href="{{ route('marcas.show', $usuario->id) }}" class="btn btn-info btn-sm"><i >Detalle</i></a> --}}
                                          <a href="{{ route('marcas.edit', $marca->id) }}" class="btn btn-warning btn-sm"><i >Editar</i></a>
                                          <form action="{{ route('marcas.delete', $marca->id) }}" method="post" style="display: inline-block; " onsubmit="return confirm('seguro ?')">
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
                        {{ $marcas->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
