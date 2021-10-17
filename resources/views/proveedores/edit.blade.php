@extends('layouts.main', ['page' => __('EditarProveedor'), 'pageSlug' => 'EditarProveedor'])


@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card">
                    <div class="card-header">
                        <h5 class="title">Editar Proveedor</h5>
                    </div>

                    <form action="{{ route('proveedores.update', $proveedor->id) }}" method="post"   class="form-horizontal">
                        @csrf
                        @method('PUT')
                        @include('alerts.success')

                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif


                        <div class="pl-lg-4">
                            <div class="form-group{{ $errors->has('nombre') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">{{ __('Nombre') }}</label>
                                <input type="text" name="nombre" id="input-name" class="form-control form-control-alternative{{ $errors->has('nombre') ? ' is-invalid' : '' }}" placeholder="{{ __('Ingrese el nombre de la marca ') }}" value="{{ old('nombre', $proveedor->nombre )}}" autofocus>

                                @if ($errors->has('nombre'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('celular') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">{{ __('celular') }}</label>
                                <input type="text" name="celular" id="input-name" class="form-control form-control-alternative{{ $errors->has('celular') ? ' is-invalid' : '' }}" placeholder="{{ __('Ingrese el celular de la marca ') }}" value="{{ old('celular', $proveedor->celular) }}" autofocus>

                                @if ($errors->has('celular'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('celular') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('correo') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">{{ __('correo') }}</label>
                                <input type="text" name="correo" id="input-name" class="form-control form-control-alternative{{ $errors->has('correo') ? ' is-invalid' : '' }}" placeholder="{{ __('Ingrese el correo de la marca ') }}" value="{{ old('correo', $proveedor->correo) }}" autofocus>

                                @if ($errors->has('correo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('correo') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('estado') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">{{ __('estado') }}</label>
                                <input type="text" name="estado" id="input-name" class="form-control form-control-alternative{{ $errors->has('estado') ? ' is-invalid' : '' }}" placeholder="{{ __('Ingrese el estado de la marca ') }}" value="{{ old('estado', $proveedor->estado) }}" autofocus>

                                @if ($errors->has('estado'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('estado') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success mt-4">{{ __('Actualizar') }}</button>
                            </div>
                        </div>
                    </form>
                    <hr class="my-4" />
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-user">
                <div class="card-body">
                    <p class="card-text">
                        <div class="author">
                            <div class="block block-one"></div>
                            <div class="block block-two"></div>
                            <div class="block block-three"></div>
                            <div class="block block-four"></div>
                            <a href="#">
                                <img class="avatar" src="{{ asset('/img/emilyz.jpg') }}" alt="">
                                <h3 class="title">{{ $proveedor->nombre }}</h3>
                            </a>
                            <p class="description">
                                {{ _('Ceo/Co-Founder') }}
                            </p>
                        </div>
                    </p>
                    <p class="descripcion">
                        Correo: {{ $proveedor->correo }}   <br>
                        Correo: {{ $proveedor->celular }}   <br>
                        Fecha de creación: {{ $proveedor->created_at }}  <br>

                     </p>
                    <div class="card-description">
                        {{ _('Do not be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...') }}
                    </div>

                </div>
                <div class="card-footer">
                    <div class="button-container">
                        <a href="{{ route('proveedores.index') }}" class="btn btn-sm btn-success mr-3" >Volver</a>
                        {{-- <a href="{{ route('usuarios.edit') }}" class="btn btn-sm btn-success mr-3" >Editar</a> --}}
                              {{-- <button class="btn btn-sm btn-primary">Editar</button> --}}
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
