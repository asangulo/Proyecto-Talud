@extends('layouts.main', ['page' => __('Editar tipoMaterial'), 'pageSlug' => 'tipoMaterials'])


@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card">
                    <div class="card-header">
                        <h5 class="title">Editar Tipo MATERIAL</h5>
                    </div>

                    <form action="{{ route('tipoMateriales.update', $tipoMaterial->id) }}" method="post"   class="form-horizontal">
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
                                <label class="form-control-label" for="input-nombre">{{ __('nombre') }}</label>
                                <input type="text" name="nombre" id="input-nombre" class="form-control form-control-alternative{{ $errors->has('nombre') ? ' is-invalid' : '' }}" value="{{  old('nombre', $tipoMaterial->nombre )}}" autofocus>

                                @if ($errors->has('nombre'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombre') }}</strong>
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

    </div>
@endsection
