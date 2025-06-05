@extends('layouts.main', ['page' => __('entradaMateriales'), 'pageSlug' => 'entradaMateriales'])


@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="title">{{ _('Crear entrada') }}</h5>
    </div>
    <form method="post" action="{{ route('entradaMateriales.store') }}" autocomplete="off">
        <div class="card-body">
                @csrf

                @include('alerts.success')

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
            </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-fill btn-primary">{{ _('Guardar') }}</button>
        </div>
    </form>
    <hr class="my-4" />
</div>
@endsection
