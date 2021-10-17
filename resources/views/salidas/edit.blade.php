@extends('layouts.main', ['page' => __('salidas'), 'pageSlug' => 'salidas'])


@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card">
                    <div class="card-header">
                        <h5 class="title">Editar Salida</h5>
                    </div>

                    <form action="{{ route('salidas.update', $salida->id) }}" method="post"   class="form-horizontal">
                        @csrf
                        @method('PUT')
                        <h6 class="heading-small text-muted mb-4">{{ __(' information') }}</h6>

                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif


                        <div class="pl-lg-4">
                            <div class="form-group{{ $errors->has('fecha') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">{{ __('Fecha') }}</label>
                                <input type="date" name="fecha" id="input-name" class="form-control form-control-alternative{{ $errors->has('fecha') ? ' is-invalid' : '' }}" value="{{ $salida->fecha }}" required autofocus>

                                @if ($errors->has('fecha'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fecha') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('obra_id') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">{{ __('obra_id') }}</label>
                                <select name="obra_id" id="obra_id" class="form-control form-control-alternative{{ $errors->has('obra_id') ? ' is-invalid' : '' }}">
                                    <option value="">--Escoja  el obra --</option>
                                    @foreach ($obras as $obra)
                                    <option value="{{ $obra['id'] }}">{{ $obra['nombre'] }}</option>

                                    @endforeach
                                </select>
                                @if ($errors->has('obra_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('obra_id') }}</strong>
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
