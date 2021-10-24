@extends('layouts.main', [
    'namePage' => 'proveedores',
    'class' => 'sidebar-mini',
    'activePage' => 'proveedores',
  ])

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="title">{{ _('Crear Usuario') }}</h5>
    </div>
    <div class="modal-body">
        <form action="{{ route('proveedores.store') }}" method="post"   class="form-horizontal">
            @csrf
            <div class="pl-lg-4">
                <div class="form-group{{ $errors->has('nombre') ? ' has-danger' : '' }}">
                    <label class="form-control-label" for="input-name">{{ __('Nombre') }}</label>
                    <input type="text" name="nombre" id="input-name" class="form-control form-control-alternative{{ $errors->has('nombre') ? ' is-invalid' : '' }}" placeholder="{{ __('Ingrese el nombre de la marca ') }}" value="{{ old('nombre') }}" autofocus>

                    @if ($errors->has('nombre'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('nombre') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('celular') ? ' has-danger' : '' }}">
                    <label class="form-control-label" for="input-name">{{ __('celular') }}</label>
                    <input type="text" name="celular" id="input-name" class="form-control form-control-alternative{{ $errors->has('celular') ? ' is-invalid' : '' }}" placeholder="{{ __('Ingrese el celular de la marca ') }}" value="{{ old('celular') }}" autofocus>

                    @if ($errors->has('celular'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('celular') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('correo') ? ' has-danger' : '' }}">
                    <label class="form-control-label" for="input-name">{{ __('correo') }}</label>
                    <input type="text" name="correo" id="input-name" class="form-control form-control-alternative{{ $errors->has('correo') ? ' is-invalid' : '' }}" placeholder="{{ __('Ingrese el correo de la marca ') }}" value="{{ old('correo') }}" autofocus>

                    @if ($errors->has('correo'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('correo') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('estado') ? ' has-danger' : '' }}">
                    <label class="form-control-label" for="input-name">{{ __('estado') }}</label>
                    <input type="text" name="estado" id="input-name" class="form-control form-control-alternative{{ $errors->has('estado') ? ' is-invalid' : '' }}" placeholder="{{ __('Ingrese el estado de la marca ') }}" value="{{ old('estado') }}" autofocus>

                    @if ($errors->has('estado'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('estado') }}</strong>
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
</div>


@endsection
