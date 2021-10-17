@extends('layouts.main', ['page' => __('salidaMateriales'), 'pageSlug' => 'salidaMateriales'])


@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="title">{{ _('Crear salida material') }}</h5>
    </div>
    <form method="post" action="{{ route('salidaMateriales.store') }}" autocomplete="off">
        <div class="card-body">
                @csrf

                @include('alerts.success')
                <div class="form-group{{ $errors->has('estado') ? ' has-danger' : '' }}">
                    <label class="form-control-label" for="input-name">{{ __('estado') }}</label>
                    <input type="text" name="estado" id="input-name" class="form-control form-control-alternative{{ $errors->has('estado') ? ' is-invalid' : '' }}" placeholder="{{ __('Ingrese el estado de la marca ') }}" value="{{ old('estado') }}" autofocus>

                    @if ($errors->has('estado'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('estado') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('cantidad') ? ' has-danger' : '' }}">
                    <label class="form-control-label" for="input-name">{{ __('cantidad') }}</label>
                    <input type="number" name="cantidad" id="input-name" class="form-control form-control-alternative{{ $errors->has('cantidad') ? ' is-invalid' : '' }}" placeholder="{{ __('Ingrese el cantidad de la marca ') }}" value="{{ old('cantidad') }}" autofocus>

                    @if ($errors->has('cantidad'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('cantidad') }}</strong>
                        </span>
                    @endif
                </div>

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

                <div class="form-group{{ $errors->has('salida_id') ? ' has-danger' : '' }}">
                    <label class="form-control-label" for="input-name">{{ __('salida_id') }}</label>
                    <select name="salida_id" id="salida_id" class="form-control form-control-alternative{{ $errors->has('salida_id') ? ' is-invalid' : '' }}">
                        <option value="">--Escoja  el salida --</option>
                        @foreach ($salidas as $salida)
                        <option value="{{ $salida['id'] }}">{{ $salida['fecha'] }}</option>

                        @endforeach
                    </select>
                    @if ($errors->has('salida_id'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('salida_id') }}</strong>
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
