@extends('layouts.main', ['title' => __('Entrada Materiales')])

@section('content')


<div class="col-xl-8 order-xl-1">
    <div class="card bg-secondary shadow">
        <div class="card-header bg-orange border-1">
            <div class="row align-items-center">
                <h3 class="mb-0">{{ __('Entrada Materiales') }}</h3>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('entradaMateriales.store') }}" method="post"   class="form-horizontal">
                @csrf


                <h6 class="heading-small text-muted mb-4">{{ __(' Formulario Entrada') }}</h6>

                @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif


                <div class="pl-lg-4">


                    <div class="form-group{{ $errors->has('material_id') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="input-name">{{ __('material_id') }}</label>
                        <select name="material_id" id="material_id" class="form-control form-control-alternative{{ $errors->has('material_id') ? ' is-invalid' : '' }}">
                            <option value="">--Escoja  el material --</option>
                            @foreach ($materiales as $material)
                            <option value="{{ $material['id'] }}">{{ $material['nombre'] }}</option>

                            @endforeach
                        </select>
                        @if ($errors->has('material_id'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('material_id') }}</strong>
                            </span>
                        @endif

                    </div>

                    <div class="form-group{{ $errors->has('entrada_id') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="input-name">{{ __('entrada_id') }}</label>
                        <select name="entrada_id" id="entrada_id" class="form-control form-control-alternative{{ $errors->has('entrada_id') ? ' is-invalid' : '' }}">
                            <option value="">--Escoja  el entrada --</option>
                            @foreach ($entradas as $entrada)
                            <option value="{{ $entrada['id'] }}">{{ $entrada['fecha'] }}</option>

                            @endforeach
                        </select>
                        @if ($errors->has('entrada_id'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('entrada_id') }}</strong>
                            </span>
                        @endif

                    </div>

                    <div class="form-group{{ $errors->has('cantidad') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="input-name">{{ __('cantidad') }}</label>
                        <input type="text" name="cantidad" id="input-name" class="form-control form-control-alternative{{ $errors->has('cantidad') ? ' is-invalid' : '' }}" placeholder="{{ __('Ingrese el cantidad de la marca ') }}" value="{{ old('cantidad') }}" autofocus>

                        @if ($errors->has('cantidad'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('cantidad') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success mt-4">{{ __('Guardar') }}</button>
                    </div>
                </div>

            </form>
            <hr class="my-4" />

        </div>
    </div>
</div>


@endsection
